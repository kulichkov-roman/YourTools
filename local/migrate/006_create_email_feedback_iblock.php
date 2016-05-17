<?php
/**
 * Создает почтовое событие и шаблон для отправки обратной связи
 * из формы обратной связи
 */
ignore_user_abort(true);
set_time_limit(0);

define('BX_BUFFER_USED', true);
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
define('NO_AGENT_STATISTIC', true);
define('STOP_STATISTICS', true);

if (!defined('SITE_ID')) {
    define('SITE_ID', 's1');
}

if (empty($_SERVER['DOCUMENT_ROOT'])) {
    $_SERVER['HTTP_HOST'] = 'kbr.cv24440.tmweb.ru';
    $_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../../');
}

error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
ini_set('display_errors', 1);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

$logger = new \Your\Tools\Logger\EchoLogger();

$eventType = new CEventType;
$eventId = $eventType->Add(
    array(
        'LID'         => 'ru',
        'EVENT_NAME'  => 'FEEDBACK_SENT',
        'NAME'        => 'Вам пришел запрос обратной связи',
        'DESCRIPTION' => '
			#NAME# - Имя
			#PHONE# - Телефон
		'
    )
);

if ($eventId) {
    $logger->log('Event has been created');

    $eventMessage = new CEventMessage;

    $messageId = $eventMessage->Add(
        array(
            'ACTIVE'     => 'Y',
            'EVENT_NAME' => 'FEEDBACK_SENT',
            'LID'        => 's1',
            'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
            'EMAIL_TO'   => '#EMAIL#',
            'SUBJECT'    => 'Вам пришел запрос обратной связи',
            'BODY_TYPE'  => 'html',
            'MESSAGE'    => '
                Вам пришел запрос обратной связи<br>
                <br>
                Имя: #NAME#<br>
                Телефон: #PHONE#<br>
            '
        )
    );

    if ($messageId) {
        $logger->log('Message has been created');
    } else {
        $logger->log('Unable to create message');
    }
} else {
    $logger->log('Unable to create event');
}
