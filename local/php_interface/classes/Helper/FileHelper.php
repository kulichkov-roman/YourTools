<?php

namespace MLTK\Helper;

/**
 * Хелпер для работы с датами
 *
 * Class DateHelper
 *
 * @package Your\Helpers
 *
 * @author Kulichkov Roman <roman@kulichkov.pro>
 */
class FileHelper
{
    /**
     * DateHelper constructor.
     */
    public function __construct()
    {}

    /**
     * Конвертирование даты
     *
     * @param $date
     *
     * @return bool
     */
    public static function removeFileByPath($path)
    {
        return unlink($path);
    }
}
?>
