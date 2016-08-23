<?php

namespace YT\Tools\CheckList;

use YT\Tools\CheckListInterface;

/**
 * Пройти все чек листы перед сдачей проекта
 *
 * Class CheckList
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package YT\Tools\CheckList
 */
class CheckList implements CheckListInterface
{
    private $status = 'A';
    private $comment = 'Выполнено';
    private $message = 'Все тесты пройдены';

    /**
     * @param $message
     */
    public function up()
    {
        include_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/classes/general/checklist.php");

        $checklist = new \CCheckList(true);

        $arPoints = $checklist->GetPoints();
        foreach($arPoints as $pointId => $arPoint){
            $arPointFields = array();

            $arPointFields["COMMENTS"]["PERFOMER"] = $this->comment;
            $arPointFields["STATUS"] = $this->status;

            $checklist->PointUpdate($pointId, $arPointFields);
        }
        $checklist->Save();

        echo sprintf('%s' . PHP_EOL, $this->message);
    }
}
