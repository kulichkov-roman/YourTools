<?php

namespace YT\Exception\Common;

use YT\Common\Exception;

/**
 * Class NotImplementedException
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Exception\Common
 */
class NotImplementedException extends Exception
{
	/**
	 * @param string $message
	 * @param int $code
	 * @param \Exception $previous
	 */
	public function __construct($message = '', $code = 0, \Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}
