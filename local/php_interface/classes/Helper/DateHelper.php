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
class DateHelper
{
    const FORMAT_DATE = 'DD.MM.YYYY';
    const FORMAT_DATE_1 = 'd.m.Y';

    /**
     * DateHelper constructor.
     */
    public function __construct()
    {}

    /**
     * Конвертирование даты
     *
     * @todo не универсальное решение
     *
     * @param $date
     *
     * @return bool
     */
    public static function convertDate($strDate, $dateFormat = 'DD.MM.YYYY')
    {
        if($strDate)
        {
            $arMonth = array(
                'января',
                'февраля',
                'марта',
                'апреля',
                'мая',
                'июня',
                'июля',
                'августа',
                'сентября',
                'октября',
                'ноября',
                'декабря',
            );

            if(mb_stripos($strDate, ',') !== false)
            {
                $strDate = mb_stristr($strDate, ', ', true);
                $arDate  = ParseDateTime($strDate, $dateFormat);
                $num     = intval(array_search($arDate['MM'], $arMonth)) + 1;
                $arDate['MM'] = str_pad($num, 2, '0', STR_PAD_LEFT);
                $strDate = implode('.', $arDate);

                return $strDate;
            }
            elseif(mb_stripos($strDate, ':') !== false)
            {
                return date(self::FORMAT_DATE_1);
            }
            elseif(mb_stripos($strDate, '/') !== false)
            {
                return implode('.', ParseDateTime($strDate, $dateFormat));
            }
            else
            {
                return $strDate;
            }
        }
        else
        {
            throw new \Exception('Дата не может быть пустой.');
        }
    }
}
?>
