<?php

namespace Your\Environment\Configuration;

/**
 * Конфигурация для конкретного сайта
 *
 * Class SiteConfiguration
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package Your\Environment
 */
class SiteConfiguration extends CommonConfiguration
{
	/**
	 * id сайта, для которого эта конфигурация
	 *
	 * @var string
	 */
	protected $site;

	/**
	 * @param string $siteId
	 * @param array $config
	 */
	public function __construct($siteId, array $config = array())
	{
		parent::__construct($config);

		$this->site = $siteId;
	}

	/**
	 * @return string
	 */
	public function getSiteId()
	{
		return $this->site;
	}
} 