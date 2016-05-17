<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}
?>
		<footer class="page-footer">
			<div class="container">
				<div class="footer-copyright">
					<?$APPLICATION->IncludeComponent(
						'bitrix:main.include',
						'',
						Array(
							'AREA_FILE_SHOW' => 'file',
							'PATH' => '/local/include/site_templates/ft_footer_copyright.php',
							'EDIT_TEMPLATE' => ''
						),
						false
					);?>
				</div>
				<div class="footer-developer">
					<?$APPLICATION->IncludeComponent(
						'bitrix:main.include',
						'',
						Array(
							'AREA_FILE_SHOW' => 'file',
							'PATH' => '/local/include/site_templates/ft_footer_developer.php',
							'EDIT_TEMPLATE' => ''
						),
						false,
						Array('HIDE_ICONS' => 'Y')
					);?>
				</div>
			</div>
		</footer>
		<div class="hidden">
			<div class="call-request-form" id="call-request">
				<div class="call-request-form__wrap">
					<div class="call-request-form__inner">
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => '/local/include/site_templates/ft_call_request_form_3.php',
								'EDIT_TEMPLATE' => ''
							),
							false
						);?>
					</div>
				</div>
			</div>
			<div class="form-answer" id="form-answer">
				<div class="form-answer__wrap">
					<div class="form-answer__inner">
						<div class="form-answer__title">Спасибо за заявку</div>
						<div class="form-answer__text">
							В самое ближайшее время с вами свяжется наш<br>
							специалист и договорится с вами о просмотре.
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
