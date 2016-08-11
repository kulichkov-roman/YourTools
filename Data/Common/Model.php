<?php

namespace YT\Data\Common;

/**
 * Абстрактный класс модели
 *
 * Class Model
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Data
 */
abstract class Model
{
	/**
	 * @return mixed
	 */
	abstract public function getId();
}
