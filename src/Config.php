<?php

/**
 * @author Dmitriy Lukin <lukin.d87@gmail.com>
 */

namespace XrTools;

/**
 * Config array getter/setter
 */
class Config
{
	/**
	 * @var array
	 */
	private $config = [];

	/**
	 * @param string $key
	 * @return mixed|null
	 */
	function get(string $key)
	{
		return $this->config[ $key ] ?? null;
	}

	/**
	 * @param array $keys
	 * @return array
	 */
	function getMulti(array $keys): array
	{
		$result = [];

		foreach ($keys as $key) {
			$result[ $key ] = $this->config[ $key ] ?? null;
		}

		return $result;
	}

	/**
	 * @return array
	 */
	function getAll(): array
	{
		return $this->config;
	}

	/**
	 * @param string $key
	 * @param $value
	 */
	function set(string $key, $value)
	{
		$this->config[ $key ] = $value;
	}

	/**
	 * @param array $params
	 */
	function setMulti(array $params)
	{
		$this->config = array_merge($this->config, $params);
	}

	/**
	 * @param string $path
	 * @param string $key_to
	 * @return bool
	 */
	function loadFromIni(string $path, string $key_to = ''): bool
	{
		if (! is_file($path)) {
			return false;
		}

		$data = parse_ini_file($path);

		if ($data === false) {
			return false;
		}

		if (! empty($key_to)) {
			$this->config[ $key_to ] = $data;
		} else {
			$this->config = array_merge($this->config, $data);
		}

		return true;
	}
}
