<?php
require_once 'vendor/YourTools/bootstrap.php';
require_once 'classes/AutoLoader.php';

\spl_autoload_register('\MLTK\AutoLoader::autoLoad');

$environment = \Your\Environment\EnvironmentManager::getInstance();

foreach ($environment->getConfigFileNames() as $fileName) {
	$fileName = sprintf('%s/config/%s.php', __DIR__, $fileName);

	if (file_exists($fileName)) {
		include_once $fileName;
	}
}

AddEventHandler('main', 'OnEpilog', array('RequestHandler', 'Show404IfNeeded'));
AddEventHandler('iblock', 'OnAfterIBlockElementAdd', array('SendingEmailHandler', 'SendFeedbackForm'));