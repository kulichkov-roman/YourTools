<?php

namespace Your\Environment\Configuration;

/**
 * Класс общей конфигурации для всех сайтов
 *
 * Class CommonConfiguration
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Environment
 */
class CommonConfiguration implements ConfigurationInterface
{
	/**
	 * Хранимые параметры конфигурации
	 *
	 * @var array
	 */
	protected $params = array();

	/**
	 * @param array $config Набор конфигурационных параметров
	 */
	public function __construct(array $config = array())
	{
		$this->params = $config;
	}

	/**
	 * Получает значение хранимого в конфигурации параметра
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function get($key)
	{
		return isset($this->params[$key]) ? $this->params[$key] : null;
	}

	/**
	 * Сохраняет значение параметра конфигурации
	 *
	 * @param mixed $key
	 * @param mixed $value
	 */
	public function set($key, $value)
	{
		$this->params[$key] = $value;
	}

	/**
	 * Получает всю хранимую конфигурацию
	 *
	 * @return array
	 */
	public function all()
	{
		return $this->params;
	}
}
