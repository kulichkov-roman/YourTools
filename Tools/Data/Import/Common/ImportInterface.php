<?php

namespace Your\Tools\Data\Import\Common;

/**
 * Интерфейс импорта
 *
 * Interface ImportInterface
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Tools\Data\Import\Common
 */
interface ImportInterface
{
    /**
     * Применяет импорт
     */
    public function up();
}
