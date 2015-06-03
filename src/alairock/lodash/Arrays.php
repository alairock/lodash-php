<?php namespace alairock\lodash;

use Closure;

/**
 * Arrays
 */
class Arrays
{

	public $array = [];

	public $original = [];

	/**
	 * @param array $array
	 */
	public function __construct(Array $array = [])
	{
		$this->array = $array;
		$this->original = $array;
	}

	/**
	 * @param array $array
	 * @return $this
	 */
	public function from(Array $array)
	{
		$this->array = $array;
		$this->original = $array;
		return $this;
	}

	/**
	 * @return array
	 */
	public function get()
	{
		return $this->array;
	}

	/**
	 * @return string
	 */
	public function toJson()
	{
		return json_encode($this->array);
	}

	/**
	 * each
	 * @param callable $callback
	 * @return $this
	 */
	public function each(Closure $callback)
	{
		$updatedArray = [];
		foreach ($this->array as $key => $value) {
			$updatedArray[$key] = $callback($value, $key);
		}
		$this->array = $updatedArray;
		return $this;
	}

	/**
	 * changeKeyCase
	 * @param int $case
	 * @return $this
	 */
	public function changeKeyCase($case = CASE_LOWER)
	{
		$this->array = array_change_key_case($this->array, $case);
		return $this;
	}

	/**
	 * chunk
	 * @param $size
	 * @param bool $preserveKeys
	 * @return $this
	 */
	public function chunk($size, $preserveKeys = false)
	{
		$this->array = array_chunk($this->array, $size, $preserveKeys);
		return $this;
	}

	/**
	 * column
	 * @param $columnKey
	 * @param null $indexKey
	 * @return $this
	 */
	public function column($columnKey, $indexKey = null)
	{
		$this->array = array_column($this->array, $columnKey, $indexKey);
		return $this;
	}

	/**
	 * arrayCombine
	 */
	public function combine(Array $keys, Array $values)
	{
		$this->array = array_combine($keys, $values);
		return $this;
	}

	/**
	 * countValues
	 */
	public function countValues()
	{
		$this->array = array_count_values($this->array);
		return $this;
	}

	/**
	 * diffAssoc
	 */
	public function diffAssoc(...$arrays)
	{
		$this->array = call_user_func_array("array_diff_assoc", $arrays);
		return $this;
	}

	/**
	 * diffKey
	 */
	public function diffKey(...$arrays)
	{
		$this->array = call_user_func_array("array_diff_key", $arrays);
		return $this;
	}

	/**
	 * array_map
	 */
	public function array_map(Closure $callback)
	{
		array_map($callback, $this->array);
		return $this;
	}
}
