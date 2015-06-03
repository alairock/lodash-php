<?php namespace alairock\lodash;

use Closure;

/**
 * Arrays
 */
class Arrays
{

	public $container = [];

	public $propertyTwo = [
		'asdf', 'asdff'
	];

	public function __construct(Array $array = [])
	{
		$this->container = $array;
	}

	public function from(Array $array)
	{
		$this->container = $array;
		return $this;
	}

	public function get()
	{
		return $this->container;
	}

	public function toJson()
	{
		return json_encode($this->container);
	}

	public function each(Closure $callback)
	{
		$updatedArray = [];
		foreach ($this->container as $key => $value) {
			$updatedArray[$key] = $callback($value, $key);
		}
		$this->container = $updatedArray;
		return $this;
	}
}
