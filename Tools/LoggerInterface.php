<?php

namespace YT\Tools;

/**
 * Интерфейс логгера
 *
 * Interface LoggerInterface
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Tools
 */
interface LoggerInterface
{
	/**
	 * @param $message
	 */
	public function log($message);
}
