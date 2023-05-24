<?php

Bitrix\Main\Loader::registerNamespace(
	"Local\\Lib",
	Bitrix\Main\Loader::getDocumentRoot()."/local/lib"
);


use Local\Lib\ElementDeactivateHandler;

ElementDeactivateHandler::handleEvent();
