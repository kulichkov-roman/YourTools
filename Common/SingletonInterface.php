<?php

namespace Your\Common;

/**
 * Интерфейс паттерна «Одиночка»
 *
 * Interface SingletonInterface
 *
 * @package Your\Common
 */
interface SingletonInterface
{
	/**
	 * @return self
	 */
	public static function getInstance();
}
