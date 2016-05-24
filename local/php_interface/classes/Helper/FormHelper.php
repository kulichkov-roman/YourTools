<?
namespace MLTK\Helper;
/**
 * Хелпер для работы с данными форм
 *
 * Class FormHelper
 *
 * @package MLTK\Helper
 */
class FormHelper
{
    /**
     * Проверяет, является ли строка правильным номером мобильного телефона
     *
     * @param string $phone
     *
     * @return bool
     */
    public static function isMobilePhoneCorrect($phone)
    {
        return preg_match("/^\+7\d{10}$/", preg_replace('/\s/', '', $phone)) == 1;
    }
    /**
     * Проверяет, что в данных формы заполнены все обязательные поля
     *
     * @param array $data Данные формы в виде ассоциативного массива
     * @param array $requiredFields Список ключей обязательных полей
     *
     * @return bool
     */
    public static function isRequiredFieldsFilled(array $data, array $requiredFields)
    {
        foreach ($requiredFields as $field)
        {
            if (empty($data[$field]))
            {
                return false;
            }
        }
        return true;
    }
}
?>