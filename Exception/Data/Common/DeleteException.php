<?php

namespace Your\Exception\Data\Common;

use Your\Common\Exception;

/**
 * Исключение процесса удаления объекта
 *
 * Class DeleteException
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Exception\Data\Common
 */
class DeleteException extends Exception
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @param string $message
	 * @param int $id
	 * @param int $code
	 * @param Exception $previous
	 */
	public function __construct($message, $id, $code = 0, Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);

		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
} 