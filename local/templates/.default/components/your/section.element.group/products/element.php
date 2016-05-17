<?
global $arParams, $resItems;
global $arParams, $resItems;
$arResult = $GLOBALS['resItems'];
$this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
<div class="products-item" id="<?=$this->GetEditAreaId($arResult['ID']);?>">
	<div class="products-item-img">
		<img
			src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>"
			alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
			title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
		>
	</div>
	<div class="products-item-body">
		<div class="products-item-title"><?=$arResult["NAME"]?></div>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["PREVIEW_TEXT"]){?>
			<?=$arResult["PREVIEW_TEXT"];?>
		<?}?>
		<?if($arResult['PROPERTIES']['SUBTEXT']['VALUE']){?>
			<div class="products-item-footer">
				<?=$arResult['PROPERTIES']['SUBTEXT']['VALUE']?>
			</div>
		<?}?>
	</div>
</div>
