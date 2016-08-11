<?
namespace YT\Tools\Import\CSV;

use YT\Common\SingletonInterface;
use YT\Exception\Data\Import\CSV\ImporterException;
use YT\Tools\Logger\FileLogger;

use YT\Helper;

/**
 * Импорт СSV
 *
 * Class Importer
 *
 * @package YT\Tools\Import\CSV
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 */
class Importer implements SingletonInterface
{
    protected static $instance = null;

    private $csvManager;
    private $arCsv = array();

    public static function getInstance()
    {
        if (is_null(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Importer constructor.
     */
    protected function __construct()
    {
        $this->dateHelper   = new \KKB\Helper\DateHelper;
        $this->stringHelper = new \KKB\Helper\StringHelper;
        $this->csvManager   = new \CCSVData('R', false);
    }

    private function __clone()
    {
    }

    public function loadFile($path)
    {
        $this->csvManager->LoadFile($path);
    }

    public function setDelimiter($separate)
    {
        $this->csvManager->SetDelimiter($separate);
    }

    public function readToArray()
    {
        $this->arCsv = array();
        while($arItem = $this->csvManager->Fetch())
        {
            $this->arCsv[] = $arItem;
        }

        if($this->arCsv)
        {
            return $this->arCsv;
        }
        else
        {
            throw new \Exception('Не удалось загрузить CSV файл');
        }
    }

    public function closeFile()
    {
        $this->csvManager->CloseFile();
    }
}
