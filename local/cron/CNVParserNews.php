<?
use Your\Tools\Data\Parsing\Common\ParsingInterface;
use MLTK\Helper;

define('BX_BUFFER_USED', true);
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
define('NO_AGENT_STATISTIC', true);
define('STOP_STATISTICS', true);
define('SITE_ID', 's1');

if (empty($_SERVER['DOCUMENT_ROOT'])) {
    $_SERVER['HTTP_HOST'] = 'mltk.cv24440.tmweb.ru';
    $_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../../');
}

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

while (ob_get_level()) {
    ob_end_flush();
}

if (!\CModule::IncludeModule('iblock'))
{
    die('Unable to include "iblock" module');
}

class CNVParsingNews implements ParsingInterface
{
    const TEXT_TYPE = 'html';
    const SITE_ID   = 's1';
    const FORMAT_DATE_1 = 'd.m.Y';

    protected $arUrls;
    protected $domain;
    protected $iBlockId;

    protected $fileHelper;
    protected $stringHelper;

    private $source;
    private $logger;

    /**
     * CBParsingNews constructor.
     */
    public function __construct()
    {
        $this->source = \Your\Tools\Parser\News\Parser::getInstance();
        $this->logger = new \Your\Tools\Logger\FileLogger('parserNV.log');
        $this->iBlockId = \Your\Environment\EnvironmentManager::getInstance()->get('newsIBlockId');
        $this->stringHelper = new \MLTK\Helper\StringHelper;
        $this->fileHelper = new \MLTK\Helper\FileHelper;

        $this->arUrls = array(
            'http://novostienergetiki.ru/?cat=20',
            'http://novostienergetiki.ru/category/%D0%B0%D1%82%D0%BE%D0%BC%D0%BD%D0%B0%D1%8F-%D1%8D%D0%BD%D0%B5%D1%80%D0%B3%D0%B5%D1%82%D0%B8%D0%BA%D0%B0/',
            'http://novostienergetiki.ru/category/lyudi-v-energetike/',
            'http://novostienergetiki.ru/category/%D1%8D%D0%BD%D0%B5%D1%80%D0%B3%D0%BE%D1%81%D0%B1%D0%B5%D1%80%D0%B5%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5/',
            'http://novostienergetiki.ru/category/stati-po-energetike/',
            'http://novostienergetiki.ru/category/energosnabzhenie-2/'
        );
        $this->domain = 'http://novostienergetiki.ru/';
    }

    /**
     * Применить парсинг
     */
    public function up()
    {
        $manager = \Your\Data\Bitrix\IBlockElementManager::getInstance();

        foreach($this->arUrls as $url)
        {
            $htmlPage = $this->source->getPageByUrl($url);

            if($htmlPage)
            {
                $countSumList = $this->source->getLengthElemByTag('h2.archiveTitle');
                if($countSumList > 0)
                {
                    $this->logger->log(sprintf('Новостей на странице: %s', $countSumList));

                    $arResult = array(
                        'ITEMS' => $this->source->getElementList(
                            'span.postinfo span.date',
                            'h2.archiveTitle a',
                            'div.post p'
                        )
                    );

                    $countCurDate = is_array($arResult['ITEMS']) && sizeof($arResult['ITEMS']);
                    if($countCurDate)
                    {
                        $this->logger->log(sprintf('Новостей за сегодня: %s', $countCurDate));

                        foreach($arResult['ITEMS'] as &$arItem)
                        {
                            $arDetailPage = $this->source->getElementDetail(
                                '',
                                $arItem['DETAIL_PAGE_URL'],
                                'div.post',
                                'div.wp-caption a img'
                            );

                            if(
                                is_array($arDetailPage) &&
                                sizeof($arDetailPage)
                            )
                            {
                                $arItem['DETAIL_TEXT'] = $arDetailPage['DETAIL_TEXT'];
                            }

                            if($arDetailPage['DETAIL_PICTURE'])
                            {
                                $arItem['DETAIL_PICTURE'] = $arDetailPage['DETAIL_PICTURE'];
                            }

                            $arTranslitParams = array(
                                'max_len' => 100,
                                'replace_space' => '_',
                                'replace_other' => '_',
                                'pattern' => '~[^-a-z0-9_]+~u',
                                'change_case' => 'L'
                            );

                            $code = $this->stringHelper->getTranslitStr(
                                $arItem['NAME'],
                                $arTranslitParams
                            );

                            $arElement = array(
                                'SITE_ID'          => self::SITE_ID,
                                'CODE'             => $code,
                                'IBLOCK_ID'        => $this->iBlockId,
                                'DATE_ACTIVE_FROM' => $arItem['DATE'],
                                'NAME'             => $arItem['NAME'],
                                'DETAIL_PAGE_URL'  => $arItem['DETAIL_PAGE_URL'],
                                'PREVIEW_TEXT'     => $arItem['PREVIEW_TEXT'],
                                'PREVIEW_TEXT_TYPE' => self::TEXT_TYPE,
                                'DETAIL_TEXT'      => $arItem['DETAIL_TEXT'] ? $arItem['DETAIL_TEXT'] : '',
                                'DETAIL_TEXT_TYPE' => self::TEXT_TYPE,
                                'DETAIL_PICTURE'   => is_array($arItem['DETAIL_PICTURE']) ? $arItem['DETAIL_PICTURE'] : '',
                                'PREVIEW_PICTURE'  => is_array($arItem['DETAIL_PICTURE']) ? $arItem['DETAIL_PICTURE'] : ''
                            );

                            if ($id = $manager->add($arElement))
                            {
                                $this->logger->log(sprintf('Новость добавленна: "%s" (%s) ', $arItem['NAME'], $id));
                                $this->fileHelper->removeFileByPath($arItem['DETAIL_PICTURE']['tmp_name']);

                            }
                            else
                            {
                                $this->logger->log(sprintf('Новость не добавленна: "%s" ', $arItem['NAME']));
                            }
                        }
                        unset($arItem);
                    }
                    else
                    {
                        $this->logger->log(sprintf('Новостей за "%s" - нет.', date(self::FORMAT_DATE_1)));
                    }
                }
                unset($htmlPage);
            }
        }
    }
}

$parser = new CNVParsingNews();

try
{
    $parser->up();
}
catch (\Your\Exception\Data\Parsing\ParsingException $e)
{
    echo sprintf('Ошибка парсинга: "%s"', $e->getMessage()) . PHP_EOL;
}
?>
