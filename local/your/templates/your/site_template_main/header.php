<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html>
	<head>
		<?$APPLICATION->ShowHead();?>
		<title>
            <?echo 'Рыбный день — доставка рыбы и морепродуктов на дом';?>
		</title>
		<?
		$APPLICATION->AddHeadString('
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=960">
			<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        ');
		$APPLICATION->AddHeadString("
			<link href='http://fonts.googleapis.com/css?family=Roboto:500,400italic,700italic,700,500italic,400&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
        ");
		$APPLICATION->SetAdditionalCSS("/js/jquery-ui-1.11.3.custom/jquery-ui.structure.min.css");
		$APPLICATION->SetAdditionalCSS("/js/slick-1.4.1/slick.css");
		$APPLICATION->SetAdditionalCSS("/js/fancybox-2.1.5/jquery.fancybox.css");
		$APPLICATION->SetAdditionalCSS("/css/style.css");
		$APPLICATION->SetAdditionalCSS("/css/developers.css");

		$APPLICATION->AddHeadScript("/js/jquery-1.11.2.min.js");
		$APPLICATION->AddHeadScript("/js/jquery-validation-1.13.1/jquery.validate.js");
		$APPLICATION->AddHeadScript("/js/jquery-validation-1.13.1/server-validation-helper.js");
		$APPLICATION->AddHeadScript("/js/jquery-validation-1.13.1/config.js");
		$APPLICATION->AddHeadScript("/js/handlebars-v3.0.0.js");
		$APPLICATION->AddHeadScript("/js/slimscroll-1.3.0/jquery.slimscroll.min.js");
		$APPLICATION->AddHeadScript("/js/jquery-ui-1.11.3.custom/jquery-ui.min.js");
		$APPLICATION->AddHeadScript("/js/fancybox-2.1.5/jquery.fancybox.pack.js");
		$APPLICATION->AddHeadScript("/js/jquery.numeric.min.js");
		$APPLICATION->AddHeadScript("/js/slick-1.4.1/slick.min.js");
		$APPLICATION->AddHeadScript("/js/framework.js");
		$APPLICATION->AddHeadScript("/js/utils.js");
		$APPLICATION->AddHeadScript("/js/blocks.js");
		$APPLICATION->AddHeadScript("/js/pages.js");
		$APPLICATION->AddHeadScript("/js/init.js");
		$APPLICATION->AddHeadString('
			<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
        ');
		$APPLICATION->AddHeadScript("/js/developers.js");

		//для установки og-тегов через $APPLICATION->SetPageProperty() в component_epilog.php
		$APPLICATION->AddBufferContent('showOpenGraphContent');
		?>
	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<div class="main-menu">
			<div class="main-menu__inner">
				<div class="main-menu__head">
					<div class="main-menu__prelogo"></div>
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => "/include/site_templates/hd_logo.php",
							"EDIT_TEMPLATE" => ""
						),
						false
					);
					?>
				</div>
				<div class="main-menu__holder">
                    <?
                    $APPLICATION->IncludeComponent("bitrix:main.include", "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/site_templates/hd_main_menu_name.php",
                            "EDIT_TEMPLATE" => ""
                        ),
                        false
                    );?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include", "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/site_templates/hd_main_menu_list.php"
                        ),
                        false//,
                        //array(
                        //    "HIDE_ICONS" => "Y"
                        //)
                    );?>
					<div class="main-menu__tail"></div>
				</div>
			</div>
		</div>
		<div class="page-wrapper">
			<div class="header">
				<div class="header__top">
					<div class="header__main">
						<h1 class="header__name"><span class="header__name-big"><?
							$APPLICATION->IncludeComponent("bitrix:main.include", "",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => "/include/site_templates/hd_name.php",
									"EDIT_TEMPLATE" => ""
								),
								false
							);?></span>
							<span class="header__name-small"><?
								$APPLICATION->IncludeComponent("bitrix:main.include", "",
									Array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => "/include/site_templates/hd_slogan.php",
										"EDIT_TEMPLATE" => ""
									),
									false
								);?>
							</span>
						</h1>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include", "",
							Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/site_templates/hd_auth_form_fancybox.php"
							),
							false,
							array(
								"HIDE_ICONS" => "Y"
							)
						);?>
						<div class="header__phone">
							<div class="header__number"><?
								$APPLICATION->IncludeComponent("bitrix:main.include", "",
									Array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => "/include/site_templates/hd_phone_number.php",
										"EDIT_TEMPLATE" => ""
									),
									false
								);?>
                            </div>
                            <?$APPLICATION->IncludeComponent("bitrix:main.include", "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/site_templates/hd_recall.php",
                                    "EDIT_TEMPLATE" => ""
                                ),
                                false
                            );?>
						</div>
					</div>
				</div>
				<div class="header__separator"></div>
				<div class="header__bottom-holder">
					<div class="header__bottom-wrapper">
						<div class="header__bottom">
							<div class="header__menu">
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include", "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_DIR."include/site_templates/hd_top_menu.php"
                                    ),
                                    false,
                                    array(
                                        "HIDE_ICONS" => "Y"
                                    )
                                );?>
							</div>
							<div class="header__order">
								<?$APPLICATION->IncludeComponent(
									"bitrix:main.include", "",
									Array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => SITE_DIR."include/site_templates/hd_top_order.php"
									),
									false//,
									//array(
									//	"HIDE_ICONS" => "Y"
									//)
								);?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="index-page">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include", "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR."include/site_templates/hd_slider_main.php"
                        ),
                        false,
                        array(
                            "HIDE_ICONS" => "Y"
                        )
                    );
	                $APPLICATION->IncludeComponent(
						"bitrix:main.include", "",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR."include/page_templates/payment_features.php"
						),
						false,
						array(
                            "HIDE_ICONS" => "Y"
                        )
                    );
	                $APPLICATION->IncludeComponent(
                        "bitrix:main.include", "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR."include/site_templates/hd_catalog_sections.php"
                        ),
                        false,
                        array(
                            "HIDE_ICONS" => "Y"
                        )
                    );
	                $APPLICATION->IncludeComponent(
		                "bitrix:main.include", "",
		                Array(
			                "AREA_FILE_SHOW" => "file",
			                "PATH" => SITE_DIR."include/site_templates/hd_recommended.php"
		                ),
		                false,
		                array(
			                "HIDE_ICONS" => "Y"
		                )
	                );
                    ?>
				</div>
