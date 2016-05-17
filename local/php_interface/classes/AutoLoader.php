<?php

namespace KBR;

/**
 * Автозагрузчик для пространства KBR
 *
 * Class AutoLoader
 *
 * @author Roman Kulichkov <roman@kulichkov.pro>
 *
 * @package MLTK
 */
class AutoLoader
{
	const DEBUG_MODE = false;

	const PROJECT_NAMESPACE = 'KBR';

	static private $recursiveSearch = true;

	public function __construct()
	{}

	/**
	 * @return string
	 */
	protected static function getBasePath()
	{
		return __DIR__;
	}

	/**
	 * @param string $path
	 * @param string $file
	 *
	 * @return string
	 */
	protected static function generateFilePath($path, $file)
	{
		return str_replace(
			sprintf('/%s/', self::PROJECT_NAMESPACE),
			'/',
			sprintf('%s/%s.php', $path, str_replace('\\', '/', $file))
		);
	}

	/**
	 * @param string $file
	 */
	public static function autoLoad($file)
	{
		$path = self::getBasePath();
		$filePath = self::generateFilePath($path, $file);

		if (file_exists($filePath)) {

			if (self::DEBUG_MODE) {
				self::logToFile('Load ' . $filePath);
			}

			require_once($filePath);
		} else {
			self::$recursiveSearch = true;

			if (self::DEBUG_MODE) {
				self::logToFile(('начинаем рекурсивный поиск'));
			}

			self::recursiveLoad($file, $path);
		}
	}

	/**
	 * @param string $file
	 * @param string $path
	 */
	public static function recursiveLoad($file, $path)
	{
		if (false !== ($handle = opendir($path)) && self::$recursiveSearch) {
			while (false !== ($dir = readdir($handle)) && self::$recursiveSearch) {
				if (strpos($dir, '.') === false) {
					$path2 = $path . '/' . $dir;
					$filePath = $path2 . '/' . $file . '.php';

					if (self::DEBUG_MODE)
					{
						self::logToFile('Search ' . $file . ' in ' . $filePath);
					}

					if (file_exists($filePath)) {

						if (self::DEBUG_MODE) {
							self::logToFile('Load ' . $filePath);
						}

						self::$recursiveSearch = false;

						require_once($filePath);

						break;
					}

					self::recursiveLoad($file, $path2, self::$recursiveSearch);
				}
			}

			closedir($handle);
		}
	}

	/**
	 * @param string $data
	 */
	private static function logToFile($data)
	{
		$file = fopen(self::getBasePath() . '/MLTKAutoLoad.log', 'a');

		flock($file, LOCK_EX);
		fwrite($file, date('d.m.Y H:i:s') . ': ' . $data . PHP_EOL);
		flock($file, LOCK_UN);
		fclose($file);
	}
}
