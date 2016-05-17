<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>

<ul class="area-gallery__list">
	<?foreach($arResult["ITEMS"] as $arItem){?>
		<li class="area-gallery__item">
			<a href="<?=$arItem['DETAIL_PICTURE']['SRC']?>" class="area-gallery__link fancybox" rel="gallery-2">
				<span class="area-gallery__link-inner">
					<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>">
				</span>
			</a>
		</li>
	<?}?>
</ul>

