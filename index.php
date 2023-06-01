<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Интернет-магазин \"Одежда\"");
?>
<?if (IsModuleInstalled("advertising")):?>
	<div class="mb-5">
		<?$APPLICATION->IncludeComponent(
			"bitrix:advertising.banner",
			"bootstrap_v4",
			array(
				"COMPONENT_TEMPLATE" => "bootstrap_v4",
				"TYPE" => "MAIN",
				"NOINDEX" => "Y",
				"QUANTITY" => "3",
				"BS_EFFECT" => "fade",
				"BS_CYCLING" => "N",
				"BS_WRAP" => "Y",
				"BS_PAUSE" => "Y",
				"BS_KEYBOARD" => "Y",
				"BS_ARROW_NAV" => "Y",
				"BS_BULLET_NAV" => "Y",
				"BS_HIDE_FOR_TABLETS" => "N",
				"BS_HIDE_FOR_PHONES" => "Y",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
			),
			false
		);?>
	</div>
<?endif?>

<?
global $trendFilter;
$trendFilter = array('PROPERTY_TREND' => '4');
?>
<h2>Тренды сезона</h2>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "bootstrap_v4_copy", Array(
	"IBLOCK_TYPE_ID" => "catalog",
		"IBLOCK_ID" => "2",	// Инфоблок
		"BASKET_URL" => "/personal/cart/",	// URL, ведущий на страницу с корзиной покупателя
		"COMPONENT_TEMPLATE" => "",
		"IBLOCK_TYPE" => "catalog",	// Тип инфоблока
		"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_USER_FIELDS" => array(	// Свойства раздела
			0 => "",
			1 => "",
		),
		"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
		"ELEMENT_SORT_ORDER" => "desc",	// Порядок сортировки элементов
		"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
		"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
		"FILTER_NAME" => "trendFilter",	// Имя массива со значениями фильтра для фильтрации элементов
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"SHOW_ALL_WO_SECTION" => "Y",	// Показывать все элементы, если не указан раздел
		"HIDE_NOT_AVAILABLE" => "N",	// Недоступные товары
		"PAGE_ELEMENT_COUNT" => "12",	// Количество элементов на странице
		"LINE_ELEMENT_COUNT" => "3",	// Количество элементов выводимых в одной строке таблицы
		"PROPERTY_CODE" => array(
			0 => "NEWPRODUCT",
			1 => "",
		),
		"OFFERS_FIELD_CODE" => array(	// Поля предложений
			0 => "",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
			3 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",	// По какому полю сортируем предложения товара
		"OFFERS_SORT_ORDER" => "desc",	// Порядок сортировки предложений товара
		"OFFERS_SORT_FIELD2" => "id",	// Поле для второй сортировки предложений товара
		"OFFERS_SORT_ORDER2" => "desc",	// Порядок второй сортировки предложений товара
		"TEMPLATE_THEME" => "site",	// Цветовая тема
		"PRODUCT_DISPLAY_MODE" => "Y",	// Схема отображения
		"ADD_PICT_PROP" => "MORE_PHOTO",	// Дополнительная картинка основного товара
		"LABEL_PROP" => array(	// Свойства меток товара
			0 => "NEWPRODUCT",
		),
		"OFFER_ADD_PICT_PROP" => "-",	// Дополнительные картинки предложения
		"OFFER_TREE_PROPS" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
		),
		"PRODUCT_SUBSCRIPTION" => "N",	// Разрешить оповещения для отсутствующих товаров
		"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
		"SHOW_OLD_PRICE" => "Y",	// Показывать старую цену
		"SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
		"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
		"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
		"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
		"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
		"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
		"PRICE_CODE" => array(	// Тип цены
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
		"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
		"PRODUCT_QUANTITY_VARIABLE" => "",	// Название переменной, в которой передается количество товара
		"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
		"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
		"PRODUCT_PROPERTIES" => "",
		"OFFERS_CART_PROPERTIES" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
		),
		"ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
		"PAGER_TEMPLATE" => "round",	// Шаблон постраничной навигации
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"PAGER_TITLE" => "Товары",	// Название категорий
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SHOW_404" => "N",	// Показ специальной страницы
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"COMPATIBLE_MODE" => "N",	// Включить режим совместимости
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>