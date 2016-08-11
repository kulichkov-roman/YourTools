<?php

namespace YT\Exception\Token;

/**
 * Исключение прерывающее выполнение действия токена с сохранением токена в хранилище
 *
 * Class BreakingException
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Exception\Token
 */
class BreakingException extends TokenException
{
	/**
	 * @param string $message
	 * @param int $code
	 */
	public function __construct($message = '', $code = 0)
	{
		parent::__construct($message, $code);
	}
}
