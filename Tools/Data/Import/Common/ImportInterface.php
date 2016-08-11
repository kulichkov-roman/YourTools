<?php

namespace YT\Tools\Data\Import\Common;

/**
 * Интерфейс импорта
 *
 * Interface ImportInterface
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Tools\Data\Import\Common
 */
interface ImportInterface
{
    /**
     * Применяет импорт
     */
    public function up();
}
