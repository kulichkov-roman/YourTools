<?php

namespace Your\Data\Common\Import;

/**
 * Интерфейс для различных импортеров сущностей
 *
 * Interface ImporterInterface
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Data\Common\Import
 */
interface ImporterInterface
{
	/**
	 * Импортирует одну сущность
	 *
	 * @param mixed $item
	 *
	 * @return bool
	 */
	public function import($item);
}
