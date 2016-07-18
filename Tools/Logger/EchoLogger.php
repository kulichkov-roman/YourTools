<?php

namespace Your\Tools\Logger;

use Your\Tools\LoggerInterface;

/**
 * Простой логгер, выводящий сообщения на стандартный вывод
 *
 * Class EchoLogger
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Tools\Logger
 */
class EchoLogger implements LoggerInterface
{
	/**
	 * @param $message
	 */
	public function log($message)
	{
		echo sprintf('%s %s' . PHP_EOL, date('Y-m-d H:i:s'), $message);
	}
}
