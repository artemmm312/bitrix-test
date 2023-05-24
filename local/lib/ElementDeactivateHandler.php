<?php

namespace Local\Lib;

use Bitrix\Main\EventManager;

class ElementDeactivateHandler
{
	private const COUNT = 2;
	
	public static function handleEvent(): void
	{
		EventManager::getInstance()
			->addEventHandler('iblock', 'OnBeforeIBlockElementUpdate', [__CLASS__, 'testEvent']);
	}
	
	public static function testEvent(&$arFields): bool
	{
		global $APPLICATION;
		if ($arFields['ACTIVE'] === 'N') {
			$iblokElementID = (int)$arFields['ID'];
			$showCounter = \CIBlockElement::GetByID($iblokElementID)->Fetch()['SHOW_COUNTER'];
			if ((int)$showCounter > self::COUNT) {
				$APPLICATION->throwException("Товар невозможно деактивировать, у него $showCounter просмотров");
				return false;
			}
		}
		return true;
	}
}
