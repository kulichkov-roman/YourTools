<?php

namespace YT\Common;

/**
 * Интерфейс паттерна «Одиночка»
 *
 * Interface SingletonInterface
 *
 * @package YT\Common
 */
interface SingletonInterface
{
	/**
	 * @return self
	 */
	public static function getInstance();
}
