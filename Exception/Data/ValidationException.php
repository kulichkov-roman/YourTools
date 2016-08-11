<?php

namespace YT\Exception\Data;

use YT\Common\Exception;
use YT\Data\Common\Model;

/**
 * Класс исключений валидации моделей
 *
 * Class ValidationException
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Exception\Data
 */
class ValidationException extends Exception
{
	/**
	 * Объект, который не является валидным
	 *
	 * @var Model
	 */
	protected $entity;

	/**
	 * @param Model $entity
	 * @param string $message
	 * @param int $code
	 * @param \Exception $previous
	 */
	public function __construct(Model $entity, $message = '', $code = 0, \Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);

		$this->entity = $entity;
	}

	/**
	 * Возвращает объект, который не является валидным
	 *
	 * @return Model
	 */
	public function getEntity()
	{
		return $this->entity;
	}
}
