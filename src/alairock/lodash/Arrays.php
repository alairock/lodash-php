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
	 * vivisect
	 * @param callable $callback
	 * @return $this
	 */
	public function vivisect($secondArray)
	{
		$results[0] = array_diff($this->array, $secondArray);
		$results[1] = array_intersect($this->array, $secondArray);
		$results[2] = array_diff($secondArray, $this->array);
		$this->array = $results;
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
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		$this->array = call_user_func_array("array_diff_assoc", $arrays);
		return $this;
	}

	/**
	 * diffKey
	 */
	public function diffKey(...$arrays)
	{
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		$this->array = call_user_func_array("array_diff_key", $arrays);
		return $this;
	}

	/**
	 * diffUassoc
	 */
	public function diffUassoc($key_compare_func, ...$arrays)
	{
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		$arrays[] = $key_compare_func;
		$this->array = call_user_func_array("array_diff_uassoc", $arrays);
		return $this;
	}

	/**
	 * diffUkey
	 */
	public function diffUkey($key_compare_func, ...$arrays)
	{
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		$arrays[] = $key_compare_func;
		$this->array = call_user_func_array("array_diff_ukey", $arrays);
		return $this;
	}

	/**
	 * diff
	 */
	public function diff(...$arrays)
	{
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
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
	public function filter($callback)
	{
		$this->array = array_filter($this->array, $callback);
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
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		$this->array = call_user_func_array("array_intersect_assoc", $arrays);
		return $this;
	}

	/**
	 * intersectKey
	 */
	public function intersectKey(...$arrays)
	{
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		$this->array = call_user_func_array("array_intersect_key", $arrays);
		return $this;
	}

	/**
	 * intersectUassoc
	 */
	public function intersectUassoc($key_compare_func, ...$arrays)
	{
		$arrays[] = $key_compare_func;
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		$this->array = call_user_func_array("array_intersect_uassoc", $arrays);
		return $this;
	}

	/**
	 * intersectUassoc
	 */
	public function intersectUkey($key_compare_func, ...$arrays)
	{
		$arrays[] = $key_compare_func;
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		$this->array = call_user_func_array("array_intersect_ukey", $arrays);
		return $this;
	}

	/**
	 * intersect
	 */
	public function intersect(...$arrays)
	{
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
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
	 * keys
	 */
	public function keys()
	{
		$this->array = array_keys($this->array);
		return $this;
	}
	/**
	 * map
	 */
	public function map(Closure $callback, ...$arrays)
	{
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		array_unshift($arrays, $callback);
		$this->array = call_user_func_array("array_map", $arrays);
		return $this;
	}

	/**
	 * mergeRecursive
	 */
	public function mergeRecursive(...$arrays)
	{
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		$this->array = call_user_func_array("array_merge_recursive", $arrays);
		return $this;
	}

	/**
	 * merge
	 */
	public function merge(...$arrays)
	{
		if (!empty($this->array))
		{
			array_unshift($arrays, $this->array);
		}
		$this->array = call_user_func_array("array_merge", $arrays);
		return $this;
	}

	/**
	 * merge
	 * @todo implement this method
	 */
	public function multisort($sortOrder = SORT_ASC, $sortFlags = SORT_REGULAR, ...$arrays)
	{
//		if (!empty($this->array))
//		{
//			array_unshift($arrays, $this->array);
//		}
//		$this->array = array_multisort($this->array, $sortOrder, $sortFlags);
//		return $this;
	}

	/**
	 * pad
	 */
	public function pad($size, $value)
	{
		$this->array = array_pad($this->array, $size, $value);
		return $this;
	}

	/**
	 * pop
	 */
	public function pop()
	{
		array_pop($this->array);
		return $this;
	}

	/**
	 * last
	 */
	public function last()
	{
		return array_pop($this->array);
	}

	/**
	 * product
	 */
	public function product()
	{
		return array_product($this->array);
	}

	/**
	 * push
	 */
	public function push(...$values)
	{
		foreach ($values as $value) {
			array_push($this->array, $value);
		}
		return $this;
	}
}
