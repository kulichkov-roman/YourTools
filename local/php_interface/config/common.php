<?php
/**
 * Общая конфигурация для всех сайтов и окружений
 */
\Your\Environment\EnvironmentManager::getInstance()->addConfig(
	new \Your\Environment\Configuration\CommonConfiguration(
		array(
			'interiorIBlockId' => 1,
			'exteriorIBlockId' => 2,
			'feedbackIBlockId' => 3,
			'feedbackPropPhoneId' => 1,
		)
	)
);

if(\Bitrix\Main\Loader::includeModule('itconstruct.resizer'))
{
    itc\Resizer::addPreset('interiorDetail', array(
            'mode' => 'width',
            'width' => '1200',
            'height' => null,
            'type' => 'jpg'
        )
    );
    itc\Resizer::addPreset('interiorPreview', array(
            'mode' => 'crop',
            'width' => '200',
            'height' => '168',
            'type' => 'jpg'
        )
    );
	itc\Resizer::addPreset('exteriorDetail', array(
			'mode' => 'width',
			'width' => '1024',
			'height' => null,
			'type' => 'jpg'
		)
	);
	itc\Resizer::addPreset('exteriorPreview', array(
			'mode' => 'crop',
			'width' => '207',
			'height' => '151',
			'type' => 'jpg'
		)
	);
}

