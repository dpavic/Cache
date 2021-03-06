<?php

require_once __DIR__ . '/../ApcAdapter.php';

class ApcAdapterTest //extends PHPUnit_Framework_TestCase
{
	public function testAddReturnsTrueWhenSavedInMemory()
	{
		$adapter = new ApcAdapter();
		$key = 'somekey' . microtime();
		$result = $adapter->add($key, 'someValue', 500);
		$this->assertTrue($result);
	}

	public function testDeleteReturnsTrueOnSuccess()
	{
		$adapter = new ApcAdapter();
		$adapter->add('someKey', 'someValue', 500);
		$result = $adapter->delete('someKey');
		$this->assertTrue($result);
	}

	public function testDeleteReturnsFalseIfNoKey()
	{
		$adapter = new ApcAdapter();
		$result = $adapter->delete('NonExistingKey');
		$this->assertFalse($result);
	}

	public function testFetchReturnsStoredValue()
	{
		$adapter = new ApcAdapter();
		$adapter->add('someKey', 'someValue', 500);
		$result = $adapter->fetch('someKey');
		$this->assertEquals('someValue', $result);
	}
}
