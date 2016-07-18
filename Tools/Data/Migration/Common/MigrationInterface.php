<?php

namespace Your\Tools\Data\Migration\Common;

/**
 * Интерфейс миграций
 *
 * Interface MigrationInterface
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Tools\Data\Migration\Common
 */
interface MigrationInterface
{
	/**
	 * Применяет миграцию
	 */
	public function up();

	/**
	 * Отменяет миграцию
	 */
	public function down();
}
