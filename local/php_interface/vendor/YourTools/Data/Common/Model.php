<?php

namespace Your\Data\Common;

/**
 * Абстрактный класс модели
 *
 * Class Model
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Data
 */
abstract class Model
{
	/**
	 * @return mixed
	 */
	abstract public function getId();
}
