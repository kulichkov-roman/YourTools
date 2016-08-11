<?php

namespace YT\Tools\Logger;

use YT\Tools\LoggerInterface;

/**
 * Простой логгер, выводящий сообщения на стандартный вывод
 *
 * Class EchoLogger
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Tools\Logger
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
