<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
* 
* @author dev2fun (darkfriend)
* @copyright darkfriend
* @version 0.2.1
* 
*/
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
$this->setFrameMode(true);
$GLOBALS['arParams'] = $arParams;
?>
<section class="products-section">
	<div id="products" class="wrap">
		<h2>Продукция</h2>
		<div class="tabs">
			<?=$component->render($arResult,$arParams,$templateFile);?>
		</div>
	</div>
</section>
