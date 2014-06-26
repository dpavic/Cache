<?php


class Loader
{
	/**
	 * @var  array    holds already created instances
	 */
	static private $instances;

	/**
	 * Get cache instance. Returns same instance if already exists.
	 *
	 * @param string $adapter name of cache adapter
	 * @return object   return cache instance of $adapter
	 */
	static function getCacheInstance($adapter)
	{

		//Return only one instance $adapter
		if (isset (self::$instances[$adapter]) && self::$instances[$adapter] instanceof CacheInterface) {
			return self::$instances[$adapter];
		}

		$instance = ucfirst($adapter) . 'Adapter';
		$file = __DIR__ . '/'. $instance . '.php';

		try {
			if (!file_exists($file)) {
				throw new Exception('Missing file <b>' . $file . '</b>');
			}

			require_once $file;

			self::$instances[$adapter] = new $instance;

			if (!self::$instances[$adapter] instanceof CacheInterface) {
				throw new Exception('class ' . get_class(self::$instances[$adapter]) . ' must implement CacheInterface <br />');
			}

		} catch (Exception $e) {
			echo 'Caught exception: ' . $e->getMessage() . '<br />';
		}

		return self::$instances[$adapter];
	}
}