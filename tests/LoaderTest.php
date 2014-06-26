<?php

require_once __DIR__ . '/../Loader.php';

class LoaderTest extends PHPUnit_Framework_TestCase
{
	public function testGetCacheInstanceReturnsMemcacheInstance()
	{
		$adapter = Loader::getCacheInstance('Memcache');
		$this->assertInstanceOf('MemcacheAdapter', $adapter);
	}

	public function testGetCacheInstanceReturnsApcInstance()
	{
		$adapter = Loader::getCacheInstance('Apc');
		$this->assertInstanceOf('ApcAdapter', $adapter);
	}

	/**
	 * @expectedException Exception
	 */
	public function testExcteptionIfAdapterIsMissing()
	{
		Loader::getCacheInstance('Foo');
	}


	/**
	 * @expectedException Exception
	 */
	public function testExceptionIfClassIsNotImplementingCacheInterface()
	{
		Loader::getCacheInstance('test');
	}
}

/*$adapter = Loader::getCacheInstance('Test');*/

