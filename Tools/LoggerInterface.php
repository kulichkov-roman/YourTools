<?php

namespace Your\Tools;

/**
 * Интерфейс логгера
 *
 * Interface LoggerInterface
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Tools
 */
interface LoggerInterface
{
	/**
	 * @param $message
	 */
	public function log($message);
}
