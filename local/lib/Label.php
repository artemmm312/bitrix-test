<?php

namespace Local\Lib;

use Bitrix\Main\Loader;
use Bitrix\Main\Data\Cache;
use Bitrix\Highloadblock\HighloadBlockTable;

class Label
{
	private string $hlBlockId = '7';
	private array $labels;
	
	public function __construct()
	{
		$this->labels = $this->getLabels();
	}
	
	public function getLabels(): array
	{
		$cacheId = 'labels';
		$cacheTime = 3600;
		$cachePath = '/labels/';
		$labels = [];
		$cache = Cache::createInstance();
		if ($cache->initCache($cacheTime, $cacheId, $cachePath)) {
			$labels = $cache->getVars();
		} elseif ($cache->startDataCache()) {
			if (Loader::includeModule('highloadblock')) {
				$hlblock = HighloadBlockTable::getById($this->hlBlockId)->fetch();
				$entity = HighloadBlockTable::compileEntity($hlblock);
				$entityDataClass = $entity->getDataClass();
				
				$result = $entityDataClass::getList(['select' => ['ID', 'UF_NAME', 'UF_COLOR', 'UF_LINK', 'UF_XML_ID']]);
				while ($label = $result->fetch()) {
					$labels[] = [
						'ID' => $label['ID'],
						'NAME' => $label['UF_NAME'],
						'COLOR' => $label['UF_COLOR'],
						'LINK' => $label['UF_LINK'],
						'XML_ID' => $label['UF_XML_ID']
					];
				}
				$cache->endDataCache($labels);
			}
		}
		return $labels;
	}
	
	public function showLabels(array|false $values): void
	{
		if ($values) {
			$labels = $this->labels;
		} else {
			return;
		}
		$result = '';
		foreach ($values as $value) {
			foreach ($labels as $label) {
				if ($value === $label['XML_ID']) {
					$result .=
						'<a
							class="hlblok-label"
							href="' . $label['LINK'] . '"
							style="
							 margin: 3px;
							 padding: 5px;
							 white-space: nowrap;
							 font-weight: 800;
							 font-size: 10px;
							 text-decoration: none;
							 font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
							 color: #3f3f3f;
							 border-radius: 5px;
							 background-color: ' . $label['COLOR'] .
						'">' .
						$label['NAME'] .
						'</a>';
				}
			}
		}
		echo $result;
	}
}

