<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);

$environment = \Your\Environment\EnvironmentManager::getInstance();

if (!empty($arResult["ERRORS"])) {
	ShowError(implode("<br />", $arResult["ERRORS"]));
}
if (strlen($arResult["MESSAGE"]) > 0) {
	?>
	<div>
		Спасибо за заявку! С Вами свяжется наш менеджер в ближайшее время!
	</div>
	<?
} else {
	?>
	<div class="form__header">
		Приезжайте и лично оцените<br>
		ваш новый роскошный дом
	</div>
	<form name="iblock_add" class="form-call-request js__call-request" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
		<?=bitrix_sessid_post()?>
		<?if ($arParams["MAX_FILE_SIZE"] > 0){?>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" />
		<?}?>
		<ul class="form__list">
			<li class="form__item">
				<label for="formName" class="form__label">Ваше имя</label>
				<input type="text" name="PROPERTY[NAME][0]" class="form__input_text" id="formName" required="">
			</li>
			<li class="form__item">
				<label for="formPhone" class="form__label">Телефон</label>
				<input type="tel" name="PROPERTY[<?=$environment->get('feedbackPropPhoneId')?>][0]" class="form__input_text phone-field" placeholder="+7 (___) ___-__-__" id="formPhone" required="">
			</li>
			<li class="form__item form__item_btn">
				<input type="submit" name="<?=$arParams['PREFIX_FORM']?>_iblock_submit" class="btn btn_yellow form__submit" value="Записаться на просмотр">
			</li>
		</ul>
	</form>
	<?
}
?>
