<?php

namespace Your\Exception\Token;

/**
 * Исключение прерывающее выполнение действия токена с удалением токена из хранилища
 *
 * Class ExpiredException
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Exception\Token
 */
class ExpiredException extends TokenException
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
