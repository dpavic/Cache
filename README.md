Cache Component
===============

`Cache` component give you ability to store different information into memory for limited time. 

## Supported drivers 

The cache component supports following cache drivers:
* `APC` (http://php.net/manual/en/book.apc.php)
* `Memcache` (http://php.net/manual/en/book.memcache.php)

Based on the selected driver, you'll have to pass different options to the constructor

For example:

```php
	// APC
	$cache = Loader::getCacheInstance('Apc');

	// Memcache 
	$cache = Loader::getCacheInstance('Memcache');

```

## Common operations 
Once you have created your `Cache` instance, you can start using your cache. 
The cache methods are the same, no matter which driver you use:

```php
	//write to cache 
	$cache->add('my-key', 'some value', 600);

	//read from cache
	$cache->fetch('my-key');

	//delete from cache
	$cache->delete('my-key');

```

