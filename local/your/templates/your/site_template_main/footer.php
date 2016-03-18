<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
			</div><!--content-->
			<div class="index-page__review">
				<div class="index-page__review-inner">
					<div class="index-page__review-head"><span class="index-page__review-title">отзывы</span><span class="index-page__review-all"><a href="<?=REVIEWS_ALL_URL?>" class="index-page__review-link">Все отзывы</a></span></div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include", "",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => "/include/site_templates/ft_reviews_list_main.php"
						),
						false,
						array(
							"HIDE_ICONS" => "Y"
						)
					);?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include", "",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => "/include/site_templates/ft_reviews_form_main.php"
						),
						false,
						array(
							"HIDE_ICONS" => "Y"
						)
					);?>
				</div>
			</div>
		</div><!--page-wrapper-->
		<div class="footer">
			<div class="footer__separator"></div>
			<div class="footer__main">
				<div class="footer__wrapper">
					<div class="footer__leftside">
						<div class="footer__phone">
							<div class="footer__phone-pic"></div><?
							$APPLICATION->IncludeComponent("bitrix:main.include", "",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => "/include/site_templates/ft_phone_number.php",
									"EDIT_TEMPLATE" => ""
								),
								false
							);?>
							<div class="footer__phone-text"><?
								$APPLICATION->IncludeComponent("bitrix:main.include", "",
									Array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => "/include/site_templates/ft_phone_text.php",
										"EDIT_TEMPLATE" => ""
									),
									false
								);?>
							</div>
							<div class="footer__autors"><?
								$APPLICATION->IncludeComponent("bitrix:main.include", "",
									Array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => "/include/site_templates/ft_developers.php",
										"EDIT_TEMPLATE" => ""
									),
									false
								);?>
                            </div>
						</div>
					</div>
					<div class="footer__center">
						<div class="footer__menu">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include", "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR."include/site_templates/ft_menu_col_left.php"
                                ),
                                false,
                                array(
                                    "HIDE_ICONS" => "Y"
                            ));?>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include", "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR."include/site_templates/ft_menu_col_right.php"
                                ),
                                false,
                                array(
                                    "HIDE_ICONS" => "Y"
                            ));
                            ?>
						</div>
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "",
							Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/site_templates/ft_info_line_1.php",
								"EDIT_TEMPLATE" => ""
							),
							false
						);?>
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "",
							Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/site_templates/ft_info_line_2.php",
								"EDIT_TEMPLATE" => ""
							),
							false
						);?>
						<?
						// убрал возможность редактирования, потому что там стоит скрипт для дат
						$APPLICATION->IncludeComponent("bitrix:main.include", "",
							Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/site_templates/ft_info_line_3.php",
								"EDIT_TEMPLATE" => ""
							),
							false,
							Array('HIDE_ICONS' => 'Y')
						);?>
					</div>
					<div class="footer__rightside">
						<?
						/**
						 * Форма поиска
						 */
						?>
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "",
							Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/site_templates/ft_info_line_0.php",
								"EDIT_TEMPLATE" => ""
							),
							false,
							array(
								"HIDE_ICONS" => "Y"
							)
						);?>
						<p class="footer__social-text">Мы в соцсетях:</p>
						<div class="footer__social-pics"><?
							$APPLICATION->IncludeComponent("bitrix:main.include", "",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => "/include/site_templates/ft_social_pics.php",
									"EDIT_TEMPLATE" => ""
								),
								false
							);?>
						</div>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include", "",
							Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."include/site_templates/ft_subscribe.php"
							),
							false,
							array(
							    "HIDE_ICONS" => "Y"
							)
						);?>
					</div>
				</div>
			</div>
		</div>
		<div class="tothetop"><a href="#" class="tothetop__button"></a></div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include", "",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => "/include/site_templates/ft_callback_form.php"
			),
			false,
			array(
			    "HIDE_ICONS" => "Y"
		));?>
		<script id="cart-modal" type="text/x-handlebars-template">
			<div class="cart _in-modal">
				<form action="/" class="cart__form">
					<ul class="cart__list">{{#each list}}
						<li class="cart__item">
							<input type="hidden" name="item[{{@index}}]id" value="{{id}}"><span class="cart__item-delete"></span>
							<div class="cart__item-pic-wrap"><img src="{{img}}" alt="" class="cart__item-pic"></div>
							<div class="cart__item-info">
								<p class="cart__item-name">{{name}}</p>
								<p class="cart__item-price"><span class="cart__item-main-price">{{price_base}}</span><span class="cart__item-tenth">{{price_after_dec}}</span><span>руб./кг</span></p>
							</div>
							<div class="cart__item-form"><span class="cart__item-less"></span>
								<input type="text" value="{{weight}}" name="item[{{@index}}]weight" maxlength="5" class="cart__item-field"><span class="cart__item-form-text">г</span><span class="cart__item-more"></span>
							</div>
							<div class="cart__item-summ"><span class="cart__item-main-price"></span><span class="cart__item-tenth"></span></div>
						</li>{{/each}}
					</ul>
					<div class="cart__list-separator"></div>
					<div class="cart__total-text">итого:</div>
					<div class="cart__total"><span class="cart__item-main-price">634</span><span class="cart__item-tenth">00</span></div>
					<button type="submit" class="cart__order">оформить заказ</button>
				</form>
			</div>
		</script>
	</body>
</html>