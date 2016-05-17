<?
global $arSectionsChild, $arParams;
?>
<?$first = true;?>
<ul class="tabs-caption">
	<?foreach ($arSectionsChild as $arSectionChild) {?>
		<?
		$this->AddEditAction($arSectionChild['ID'], $arSectionChild['EDIT_LINK'], CIBlock::GetArrayByID($arSectionChild["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSectionChild['ID'], $arSectionChild['DELETE_LINK'], CIBlock::GetArrayByID($arSectionChild["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		?>
		<li id="<?=$this->GetEditAreaId($arSectionChild['ID']);?>" <?=$first ? 'class="active"' : ''?>>
			<?=$arSectionChild["NAME"]?>
		</li>
		<?if($first) $first = false;?>
	<?}?>
</ul>
<?$first = true;?>
<?foreach ($arSectionsChild as $arSectionChild) {?>
	<div class="tabs-content <?=$first ? 'active' : ''?>">
		<div class="products-block">
			<div class="arrow-left"><</div>
			<div class="products-list">
				<?foreach ($arSectionChild["ITEMS"] as $kSubItems => $vSubItems) {
					$GLOBALS['resItems'] = $vSubItems;
					include(__DIR__.'/'.$arParams['TEMP_OUTPUT_ELEMETS']);
					unset($GLOBALS['resItems']);
				}
				if($arSectionChild["SECTION_CHILD"]) {
					$GLOBALS['arSectionsChild'] = $arSectionChild["SECTION_CHILD"];
					include(__DIR__.'/'.$arParams['TEMP_OUTPUT_SECTIONS']);
				}
				?>
			</div>
			<div class="arrow-right">></div>
			<div class="pager"></div>
		</div>
	</div>
	<?if($first) $first = false;?>
<?}?>
