<?php

interface CacheInterface
{
	/**
	 * Save value in to memory
	 *
	 * @param string $key Name of the key
	 * @param mixed $var Value to save
	 * @param int $ttl Time to store value in seconds
	 * @return bool            Return TRUE if saved, else FALSE
	 */
	public function add($key, $var, $ttl);

	/**
	 * Delete key from memory
	 *
	 * @param string $key Name of the key
	 * @return bool                Return TRUE on success, else FALSE
	 */
	public function delete($key);

	/**
	 * Fetch stored variable
	 *
	 * @param string $key Name of key
	 * @return mixed 		False is returned if the $key doesn't exist
	 */
	public function fetch($key);
}