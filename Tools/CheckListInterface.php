<?php

namespace YT\Tools;

/**
 * Интерфейс прохождения чек листов
 *
 * Interface ImportInterface
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Tools\Data\CheckList\Common
 */
interface CheckListInterface
{
    /**
     * Пройти все тесты
     */
    public function check();
}
