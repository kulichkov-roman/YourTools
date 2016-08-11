<?php

namespace YT\Tools\Data\Migration\Common;

/**
 * Интерфейс миграций
 *
 * Interface MigrationInterface
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Tools\Data\Migration\Common
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
