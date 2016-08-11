<?php

namespace Your\Exception\Token;

/**
 * Исключения, которые могут быть выброшены в случае неудачного выполнения TokenAction
 *
 * Class TokenException
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Exception\Token
 */
abstract class TokenException extends \RuntimeException
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
