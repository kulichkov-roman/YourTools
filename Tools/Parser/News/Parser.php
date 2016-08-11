<?
namespace YT\Tools\Parser\News;

use YT\Common\SingletonInterface;
use YT\Exception\Data\Parsing\ParsingException;
use YT\Tools\Logger\FileLogger;

use YT\Helper;

/**
 * Импорт новостей
 *
 * Class Parser
 *
 * @package YT\Tools\Parser\News
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 */
class Parser implements SingletonInterface
{
    const USER_AGENT    = 'Opera/10.00 (Windows NT 5.1; U; ru) Presto/2.2.0';
    const FORMAT_DATE = 'd.m.Y';
    const UPLOAD_DIR_PICTURE = '/home/c/cv24440/mltk/public_html/upload/parser_news_tmp/';

    protected static $instance = null;

    protected $htmlPage;
    protected $count;

    protected $dateHelper;
    protected $stringHelper;

    public static function getInstance()
    {
        if (is_null(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Parser constructor.
     */
    protected function __construct()
    {
        $this->dateHelper = new \MLTK\Helper\DateHelper;
        $this->stringHelper = new \MLTK\Helper\StringHelper;
    }

    private function __clone()
    {
    }

    /**
     * Получить страницу по URL
     *
     * @param $url
     *
     * @return bool
     * @throws \Exception
     */
    public function getPageByUrl($url)
    {
        if($url)
        {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_USERAGENT, self::USER_AGENT);
            curl_setopt($ch, CURLOPT_FAILONERROR, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

            ob_start();

            $rs = curl_exec($ch);
            if($rs)
            {
                curl_close($ch);
                $this->htmlPage = ob_get_contents();
                ob_end_clean();

                return true;
            }
            else
            {
                throw new \Exception(curl_error($ch));
            }
        }
        throw new \Exception('Параметр url для получения страницы не может быть пустым.');
    }

    /**
     * Получить картинку по URL
     *
     * @param      $url
     * @param null $path
     *
     * @return bool|string
     * @throws \Exception
     */
    public function getImageByUrl($url, $path = self::UPLOAD_DIR_PICTURE)
    {
        if($url)
        {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);

            $rs = curl_exec($ch);
            if($rs)
            {
                if (
                    curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200 &&
                    strpos(curl_getinfo($ch, CURLINFO_CONTENT_TYPE), 'image') !== false
                )
                {
                    $name = substr($url, strrpos($url, '/') + 1);

                    if ($path)
                    {
                        if (is_writeable($path))
                        {
                            file_put_contents(rtrim($path, '/') . '/' . $name, $rs);
                        }
                        else
                        {
                            throw new \Exception(sprintf('Недостаточно прав для записи в папку : %s', $path));
                        }
                    }
                    return $path.$name;
                }
                curl_close($ch);
                return false;
            }
            else
            {
                throw new \Exception('Не удалось получить картинку по cURL.');
            }
        }
        return false;
    }

    /**
     * Получить количество элеметов по тегу
     *
     * @param $pattern
     *
     * @throws \Exception
     */
    public function getLengthElemByTag($pattern)
    {
        if($pattern)
        {
            $objHtmlPage = \phpQuery::newDocument($this->htmlPage);

            if(is_object($objHtmlPage))
            {
                $this->count = sizeof($objHtmlPage->find($pattern));

                if($this->count)
                {
                    return $this->count;
                }
            }
            return false;
        }
        throw new \Exception('Не удалось получить количество элементов по паттерну.');
    }

    /**
     * Получить детальную страницу
     *
     * @param $urlSite
     * @param $urlDetail
     * @param $patternDetail
     * @param $patternDetailImages
     * @param $arExceptionPattern
     *
     * @return array|bool
     */
    public function getElementDetail(
        $urlSite,
        $urlDetail,
        $patternDetail,
        $patternDetailImages = null,
        $arPatternsException = array()
    )
    {
        if(
            $urlDetail &&
            $patternDetail
        )
        {
            $urlPage = $urlSite.$urlDetail;
            $arDetail = array();

            if($this->getPageByUrl($urlPage))
            {
                $objHtmlDetailPage = \phpQuery::newDocument($this->htmlPage);

                if($patternDetailImages)
                {
                    $detailImages = $objHtmlDetailPage->find($patternDetailImages);
                    $src = trim(pq($detailImages)->attr('src'));

                    $arDetail['DETAIL_PICTURE'] = \CFile::MakeFileArray($this->getImageByUrl($src));
                }

                if(
                    is_array($arPatternsException) &&
                    sizeof($arPatternsException)
                )
                {
                    foreach ($arPatternsException as $arExceptionPattern)
                    {
                        $objHtmlDetailPage->find($arExceptionPattern)->remove();
                    }
                }

                $detailObj = $objHtmlDetailPage->find($patternDetail);
                $arDetail['DETAIL_TEXT'] = $this->stringHelper->removeHtmlComments(
                    trim(pq($detailObj)->html())
                );
                return $arDetail;
            }
            else
            {
                return false;
            }
        }
        return false;
    }



    /**
     * Упаковка html в массив объектов для списка
     *
     * @param $patternDate
     * @param $patternDetailPageUrl
     * @param $patternPreviewText
     *
     * @return bool|mixed
     */
    public function getElementList(
        $patternDate,
        $patternDetailPageUrl,
        $patternPreviewText
    )
    {
        if(
            $patternDate &&
            $patternDetailPageUrl &&
            $patternPreviewText
        )
        {
            $arResult = array();
            $arItems  = array();

            $objHtmlPage = \phpQuery::newDocument($this->htmlPage);

            foreach ($objHtmlPage->find($patternDate) as $date)
            {
                $strDate = trim(pq($date)->html());

                $arItems['DATE'][] = $this->dateHelper->convertDate(
                    $strDate,
                    'DD/MM/YYYY'
                );
            }

            if(sizeof($arItems['DATE']) > 0)
            {
                foreach ($objHtmlPage->find($patternDetailPageUrl) as $detailPageUrl)
                {
                    $arItems['DETAIL_PAGE_URL'][] = trim(pq($detailPageUrl)->attr('href'));
                    $arItems['NAME'][] = trim(pq($detailPageUrl)->text());
                }

                foreach ($objHtmlPage->find($patternPreviewText) as $previewText)
                {
                    $arItems['PREVIEW_TEXT'][] = trim(pq($previewText)->html());
                }

                foreach ($arItems['DATE'] as $key => $value)
                {
                    if($value == date(self::FORMAT_DATE))
                    {
                        $arResult['ITEMS'][] = array(
                            'DATE'              => $value,
                            'NAME'              => $arItems['NAME'][$key],
                            'DETAIL_PAGE_URL'   => $arItems['DETAIL_PAGE_URL'][$key],
                            'PREVIEW_TEXT'      => $arItems['PREVIEW_TEXT'][$key],
                        );
                    }
                }

                if(sizeof($arResult['ITEMS']))
                {
                    return $arResult['ITEMS'];
                }
                else
                {
                    return false;
                }
            }
            else
            {
                throw new \Exception('Не удалось получить список дат для списка новостей.');
            }
        }
        else
        {
            throw new \Exception('Не заполненны параметры для получения списка новостей.');
        }
    }
}
?>
