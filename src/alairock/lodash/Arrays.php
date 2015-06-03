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
	 * diffUassoc
	 */
	public function diffUassoc($key_compare_func, ...$arrays)
	{
		$arrays[] = $key_compare_func;
		$this->array = call_user_func_array("array_diff_uassoc", $arrays);
		return $this;
	}

	/**
	 * diffUkey
	 */
	public function diffUkey($key_compare_func, ...$arrays)
	{
		$arrays[] = $key_compare_func;
		$this->array = call_user_func_array("array_diff_ukey", $arrays);
		return $this;
	}

	/**
	 * diff
	 */
	public function diff(...$arrays)
	{
		$this->array = call_user_func_array("array_diff", $arrays);
		return $this;
	}

	/**
	 * fillKeys
	 */
	public function fillKeys($value)
	{
		$this->array = array_fill_keys($this->array, $value);
		return $this;
	}

	/**
	 * fill
	 */
	public function fill($startIndex, $num, $value)
	{
		$this->array = array_fill($startIndex, $num, $value);
		return $this;
	}

	/**
	 * filter
	 */
	public function filter($callback, $flag = 0)
	{
		$this->array = array_filter($this->array, $callback, $flag);
		return $this;
	}
	
	/**
	 * flip
	 */
	public function flip()
	{
		$this->array = array_flip($this->array);
		return $this;
	}

	/**
	 * intersectAssoc
	 */
	public function intersectAssoc(...$arrays)
	{
		$this->array = call_user_func_array("array_intersect_assoc", $arrays);
		return $this;
	}

	/**
	 * intersectKey
	 */
	public function intersectKey(...$arrays)
	{
		$this->array = call_user_func_array("array_intersect_key", $arrays);
		return $this;
	}

	/**
	 * intersectUassoc
	 */
	public function intersectUassoc($key_compare_func, ...$arrays)
	{
		$arrays[] = $key_compare_func;
		$this->array = call_user_func_array("array_intersect_uassoc", $arrays);
		return $this;
	}

	/**
	 * intersectUassoc
	 */
	public function intersectUkey($key_compare_func, ...$arrays)
	{
		$arrays[] = $key_compare_func;
		$this->array = call_user_func_array("array_intersect_ukey", $arrays);
		return $this;
	}

	/**
	 * intersect
	 */
	public function intersect(...$arrays)
	{
		$this->array = call_user_func_array("array_intersect", $arrays);
		return $this;
	}

	/**
	 * keyExists
	 */
	public function keyExists($key)
	{
		return array_key_exists($key, $this->array);
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
