<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html class="no-js" lang="<?=LANGUAGE_ID?>">
<head>
	<meta name="viewport" content="width=1200">
	<meta name="ktoprodvinul" content="f23be9b2b6271327">
	<meta name="cmsmagazine" content="38d2170328e981e4d60ee986faaa509f">
	<title><?$APPLICATION->ShowTitle()?></title>
	<?
	CJSCore::Init();

	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/fancybox/jquery.fancybox.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/fancybox/helpers/jquery.fancybox-buttons.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/style.css');

	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery-1.11.3.min.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.validate-1.14.0.min.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.maskedinput.1.4.0.min.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.fancybox.pack.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/css/fancybox/helpers/jquery.fancybox-buttons.js');

	$APPLICATION->AddHeadString('
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	');

	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/script.js');
	?>
	<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
	<![endif]-->
	<?$APPLICATION->ShowHead()?>
	<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
		Array(
			'AREA_FILE_SHOW' => 'file',
			'PATH' => '/local/include/site_templates/hd_ga.php',
			'EDIT_TEMPLATE' => ''
		),
		false
	);?>
</head>
<body>
	<?$APPLICATION->ShowPanel();?>
	<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
		Array(
			'AREA_FILE_SHOW' => 'file',
			'PATH' => '/local/include/site_templates/hd_ya.php',
			'EDIT_TEMPLATE' => ''
		),
		false
	);?>
	<div class="wrapper">
		<header class="page-header">
			<div class="container">
				<div class="header-text">
					<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
						Array(
							'AREA_FILE_SHOW' => 'file',
							'PATH' => '/local/include/site_templates/hd_header_text.php',
							'EDIT_TEMPLATE' => ''
						),
						false
					);?>
				</div>
				<div class="header-contacts">
					<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
						Array(
							'AREA_FILE_SHOW' => 'file',
							'PATH' => '/local/include/site_templates/hd_header_phone.php',
							'EDIT_TEMPLATE' => ''
						),
						false
					);?>
				</div>
				<div class="header-logo">
					<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
						Array(
							'AREA_FILE_SHOW' => 'file',
							'PATH' => '/local/include/site_templates/hd_header_logo.php',
							'EDIT_TEMPLATE' => ''
						),
						false
					);?>
				</div>
			</div>
		</header>
		<section class="content">
			<section class="section section-promo">
				<div class="container">
					<div class="promo">
						<div class="promo__wrap">
							<div class="promo__inner">
								<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/hd_section_promo_h1.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
								<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/hd_section_promo_text.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
								<div class="promo__action">
									<a href="#call-request" class="btn btn_yellow btn_lg js__popUp">Записаться на просмотр</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!-- section about-->

			<section class="section section-advantages">
				<div class="container">
					<div class="advantages">
						<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/hd_section_advantages_h2.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
						<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/hd_section_advantages_list.php',
								'EDIT_TEMPLATE' => ''
							),
							false,
							Array('HIDE_ICONS' => 'Y')
						);?>
					</div>
				</div>
			</section> <!-- section-advantages -->
			<section class="section section-offer">
				<div class="container">
					<div class="offer">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/hd_offer_info_h2.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
						<div class="offer-info">
							<div class="offer-info__left">
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.include',
									'',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/hd_offer_info_left.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
							</div>
							<div class="offer-info__right">
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.include',
									'',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/hd_offer_info_right.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
							</div>
						</div>
						<div class="offer__action">
							<a href="#call-request" class="btn btn_yellow btn_lg js__popUp">Записаться на просмотр</a>
						</div>
						<div class="offer-gallery">
							<?$APPLICATION->IncludeComponent(
								'bitrix:main.include',
								'',
								Array(
									'AREA_FILE_SHOW' => 'file',
									'PATH' => '/local/include/site_templates/hd_offer_gallery.php',
									'EDIT_TEMPLATE' => ''
								),
								false,
								Array('HIDE_ICONS' => 'Y')
							);?>
						</div>
					</div>
				</div>
			</section> <!-- section-offer -->
			<section class="section section-about">
				<div class="container">
					<div class="about">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/hd_about_h2.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
						<div class="about-place">
							<?$APPLICATION->IncludeComponent(
								'bitrix:main.include',
								'',
								Array(
									'AREA_FILE_SHOW' => 'file',
									'PATH' => '/local/include/site_templates/hd_about_place_list.php',
									'EDIT_TEMPLATE' => ''
								),
								false,
								Array('HIDE_ICONS' => 'Y')
							);?>
						</div>
					</div>
					<div class="section-request section-request_dark">
						<div class="call-request-form">
							<div class="call-request-form__wrap">
								<div class="call-request-form__inner">
									<div class="form-request">
										<?$APPLICATION->IncludeComponent(
											'bitrix:main.include',
											'',
											Array(
												'AREA_FILE_SHOW' => 'file',
												'PATH' => '/local/include/site_templates/hd_section_request_form_1.php',
												'EDIT_TEMPLATE' => ''
											),
											false,
											Array('HIDE_ICONS' => 'Y')
										);?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="about-landscape">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/hd_about_landscape_h2.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/hd_about_landscape_figure.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
						<div class="about-landscape__content">
							<div class="about-landscape__descr">
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.include',
									'',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/hd_about_landscape_descr.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
							</div>
							<div class="about-landscape-text">
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.include',
									'',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/hd_about_landscape_text.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
							</div>
						</div>
					</div>
				</div>
			</section> <!-- section-about -->
			<section class="section section-area">
				<div class="container">
					<div class="area">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/hd_section_area_h2.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
						<div class="area__wrap">
							<div class="area-gallery">
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.include',
									'',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/hd_section_area_gallery_list.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
							</div>
							<div class="area__text">
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.include',
									'',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/hd_section_area_text_h3.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
								<?$APPLICATION->IncludeComponent(
									'bitrix:main.include',
									'',
									Array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => '/local/include/site_templates/hd_section_area_text_ul.php',
										'EDIT_TEMPLATE' => ''
									),
									false
								);?>
							</div>
						</div>

					</div>
				</div>
			</section> <!-- section-area -->
			<section class="section section-infrastructure">
				<div class="container">
					<div class="infrastructure">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/hd_section_infrastructure_h2.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/hd_section_infrastructure_list.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
					</div>
					<div class="section-request">
						<div class="call-request-form">
							<div class="call-request-form__wrap">
								<div class="call-request-form__inner">
									<?$APPLICATION->IncludeComponent(
										'bitrix:main.include',
										'',
										Array(
											'AREA_FILE_SHOW' => 'file',
											'PATH' => '/local/include/site_templates/hd_section_request_form_2.php',
											'EDIT_TEMPLATE' => ''
										),
										false,
										Array('HIDE_ICONS' => 'Y')
									);?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> <!-- section-infrastructure -->
			<div class="section-map">
				<div class="section-map__inner" id="map_canvas"></div>
			</div>
		</section> <!-- content -->
	</div> <!-- wrapper -->
