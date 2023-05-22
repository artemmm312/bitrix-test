<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

/** @global CMain $APPLICATION */

if (isset($arResult['SPECIALDATE'])) {
	$APPLICATION->SetPageProperty("specialdate", $arResult['SPECIALDATE']);
}
