<?php
/**
 * @author Dmitriy Lukin <lukin.d87@gmail.com>
 */

namespace XrTools;

/**
 * Config array getter/setter
 */
class Config {

	private $config = [];
	
	function get(string $key){
		$value = $this->config[$key] ?? null;
		return $value;
	}

	function getMulti(array $keys){
		$result = [];

		foreach ($keys as $key) {
			$result[$key] = $this->config[$key] ?? null;
		}

		return $result;
	}

	function getAll(){
		return $this->config;
	}

	function set(string $key, $value){
		$this->config[$key] = $value;
	}

	function setMulti(array $keys_values){
		foreach ($keys_values as $key => $value) {
			$this->config[$key] = $value;
		}
	}
}
