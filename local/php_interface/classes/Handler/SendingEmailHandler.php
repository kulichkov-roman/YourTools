<?php

/**
 * Class SendingEmailHandler
 */
class SendingEmailHandler
{
    public static function SendFeedbackForm(&$arFields)
    {
        $environment = \Your\Environment\EnvironmentManager::getInstance();

        if($arFields["IBLOCK_ID"]== $environment->get('feedbackIBlockId'))
        {
            $arEventFields = array(
                'NAME' => $arFields['NAME'],
                'PHONE' => $arFields['PROPERTY_VALUES'][$environment->get('feedbackPropPhoneId')] <> '' ? $arFields['PROPERTY_VALUES'][$environment->get('feedbackPropPhoneId')] : '-',
            );
            \CEvent::Send('FEEDBACK_SENT', SITE_ID, $arEventFields);
        }
    }
}
?>