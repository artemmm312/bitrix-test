<?php

Bitrix\Main\Loader::registerNamespace(
	"Local\\Lib",
	Bitrix\Main\Loader::getDocumentRoot()."/local/lib"
);

/*use Local\Lib\Label;

$label = new Label();
$labels = $label->getLabels();

$file = $_SERVER["DOCUMENT_ROOT"] . "/test.log";
file_put_contents($file, print_r($labels, true) . "\n");*/