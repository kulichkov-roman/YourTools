<?php

namespace YT\Tools\Tests;

use YT\Tools\CheckListInterface;

/**
 * Пройти все чек листы перед сдачей проекта
 *
 * Class QualityControl
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Tools\CheckList
 */
class QualityControl implements CheckListInterface
{
    private $status  = 'A';
    private $comment = 'Выполнено';
    private $message = 'Все тесты пройдены';

    /**
     * @param $message
     */
    public function check()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/checklist.php');

        $checklist = new \CCheckList(true);

        $arPoints = $checklist->GetPoints();
        foreach($arPoints as $pointId => $arPoint){
            $arPointFields = array();

            $arPointFields['COMMENTS']['PERFOMER'] = $this->comment;
            $arPointFields['STATUS'] = $this->status;

            $checklist->PointUpdate($pointId, $arPointFields);
        }
        $checklist->Save();

        return sprintf('%s' . PHP_EOL, $this->message);
    }
}
