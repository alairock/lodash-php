<?php namespace alairock\lodash\test;

use alairock\lodash\Arrays;
use Mockery;

class ArrayTest extends \PHPUnit_Framework_TestCase
{
	/* @var Arrays $array */
	public $array;

	public function setup()
	{
		parent::setUp();
		$this->array = new Arrays();
	}

	/*
	 * @test
	 */
	public function test_each_function()
	{
		$response = $this->array->from([1, 2, 3, 4])->each(function ($value) {
			return $value * 3;
		});
		$this->assertSame([3, 6, 9, 12], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_vivisect()
	{
		$response = $this->array->from(["color" => "red", "flavor" => "cherry", "product" => "pepsi", "delivery" => "Stevenson"])->vivisect(["color" => "purple", "flavor" => "grape", "product" => "pepsi", "delivery" => "Stevenson"]);
		$this->assertSame([['color' => 'red', 'flavor' => 'cherry'], ['product' => 'pepsi', 'delivery' => 'Stevenson'], ['color' => 'purple', 'flavor' => 'grape']], $response->get(), 'Something is not going well');
	}

	/*
	 * @test
	 */
	public function test_array_change_key_case()
	{
		$response = $this->array->from(["FirSt" => 1, "SecOnd" => 4])->changeKeyCase(CASE_UPPER);
		$this->assertSame(["FIRST" => 1, "SECOND" => 4], $response->get(), 'Something is not going well');
	}

	/*
	 * @test
	 */
	public function test_array_chunk()
	{
		$response = $this->array->from(['a', 'b', 'c', 'd', 'e'])->chunk(2);
		$this->assertSame([['a', 'b'], ['c', 'd'], ['e']], $response->get(), 'Something is not going well');
	}

	/*
    * @test
    */
	public function test_array_column()
	{
		$records = [
			[
				'id' => 2135,
				'first_name' => 'John',
				'last_name' => 'Doe',
			],
			[
				'id' => 3245,
				'first_name' => 'Sally',
				'last_name' => 'Smith',
			],
		];
		$response = $this->array->from($records)->column('first_name');
		$this->assertSame(['John', 'Sally'], $response->get(), 'Something is not going well');
	}

	/*
    * @test
    */
	public function test_array_combine()
	{
		$response = $this->array->combine(['green', 'red', 'yellow'], ['avocado', 'apple', 'banana']);
		$this->assertSame(['green' => 'avocado', 'red' => 'apple', 'yellow' => 'banana'], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_count_values()
	{
		$response = $this->array->from([1, "hello", 1, "world", "hello"])->countValues();
		$this->assertSame([1 => 2, "hello" => 2, "world" => 1], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_diff_assoc()
	{
		$response = $this->array->diffAssoc(["a" => "green", "b" => "brown", "c" => "blue", "red"], ["a" => "green", "yellow", "red"]);
		$this->assertSame(['b' => 'brown', 'c' => 'blue', 0 => 'red'], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_diff_key()
	{
		$response = $this->array->diffKey(['blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4], ['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8]);
		$this->assertSame(['red' => 2, 'purple' => 4], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_diff_uassoc()
	{
		$callback = function($a, $b) {
			if ($a === $b) {
				return 0;
			}
			return ($a > $b)? 1:-1;
		};
		$response = $this->array->diffUassoc($callback, ["a" => "green", "b" => "brown", "c" => "blue", "red"], ["a" => "green", "yellow", "red"]);
		$this->assertSame(['b' => 'brown', 'c' => 'blue', 0 => 'red'], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_diff_ukey()
	{
		$callback = function($a, $b) {
			if ($a == $b)
				return 0;
			else if ($a > $b)
				return 1;
			else
				return -1;
		};
		$response = $this->array->diffUkey($callback, ['blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4], ['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8]);
		$this->assertSame(['red' => 2, 'purple' => 4], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_diff()
	{
		$response = $this->array->diff(["a" => "green", "red", "blue", "red"], ["b" => "green", "yellow", "red"]);
		$this->assertSame([1 => "blue"], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_fill_keys()
	{
		$response = $this->array->from([1, 'asdf', 234])->fillKeys('banana');
		$this->assertSame([1 => 'banana', 'asdf' => 'banana', 234 => 'banana'], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_fill()
	{
		$response = $this->array->fill(5, 4, 'banana');
		$this->assertSame([5 => 'banana', 6 => 'banana', 7 => 'banana', 8 => 'banana'], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_filter()
	{
		$response = $this->array->from([6, 7, 8, 9, 10, 11, 12])->filter(function($var) {
			return(!($var & 1));
		});
		$this->assertSame([0 => 6, 2 => 8, 4 => 10, 6 => 12], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_flip()
	{
		$response = $this->array->from([0 => 6, 2 => 8, 4 => 10, 6 => 12])->flip();
		$this->assertSame([6 => 0, 8 => 2, 10 => 4, 12 => 6], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_intersect_assoc()
	{
		$response = $this->array->intersectAssoc(["a" => "green", "b" => "brown", "c" => "blue", "red"], ["a" => "green", "b" => "yellow", "blue", "red"]);
		$this->assertSame(["a" => "green"], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_intersect_key()
	{
		$response = $this->array->intersectKey(['blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4], ['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8]);
		$this->assertSame(["blue" => 1, "green" => 3], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_intersect_uassoc()
	{
		$response = $this->array->intersectUassoc("strcasecmp", ["a" => "green", "b" => "brown", "c" => "blue", "red"], ["a" => "GREEN", "B" => "brown", "yellow", "red"]);
		$this->assertSame(['b' => 'brown'], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_intersect_ukey()
	{
		$response = $this->array->intersectUkey(function($key1, $key2)
		{
			if ($key1 == $key2)
				return 0;
			else if ($key1 > $key2)
				return 1;
			else
				return -1;
		}, ['blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4], ['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8]);
		$this->assertSame(['blue' => 1, 'green' => 3], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_intersect()
	{
		$response = $this->array->intersect(["a" => "green", "red", "blue"], ["b" => "green", "yellow", "red"]);
		$this->assertSame(['a' => 'green', 0 => 'red'], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_key_exists()
	{
		$response = $this->array->from(['brown' => 'green', 'horray'])->keyExists('brown');
		$this->assertTrue($response);
	}

	/**
	 * @test
	 */
	public function test_array_keys()
	{
		$response = $this->array->from(['brown' => 'green', 'horray'])->keys();
		$this->assertSame(['brown', 0], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_map()
	{
		$response = $this->array->from([1, 2, 3])->map(function($arr1, $arr2) {
			return $arr1 . ' is ' . $arr2;
		}, ['pink', 'red', 'orange']);
		$this->assertSame(['1 is pink', '2 is red', '3 is orange'], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_merge_recursive()
	{
		$response = $this->array->from(["color" => ["favorite" => "red"], 5])->mergeRecursive([10, "color" => ["favorite" => "green", "blue"]]);
		$this->assertSame(['color' => ['favorite' => ['red', 'green'], 'blue'], 5, 10], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_merge()
	{
		$response = $this->array->from([1, 2, 3])->merge([3, 4, 'pink']);
		$this->assertSame([1, 2, 3, 3, 4, 'pink'], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_multisort()
	{
//		$response = $this->array->from([1, 2, 3])->multisort([3, 4, 'pink']);
//		$this->assertSame([1, 2, 3, 3, 4, 'pink'], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_pad()
	{
		$response = $this->array->from([12, 10, 9])->pad(5, 0);
		$this->assertSame([12, 10, 9, 0, 0], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_pop()
	{
		$response = $this->array->from(["orange", "banana", "apple", "raspberry"])->pop();
		$this->assertSame(["orange", "banana", "apple"], $response->get(), 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_last()
	{
		$response = $this->array->from(["orange", "banana", "apple", "raspberry"])->last();
		$this->assertSame("raspberry", $response, 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_product()
	{
		$response = $this->array->from([2, 4, 6, 8])->product();
		$this->assertSame(384, $response, 'Something is not going well');
	}

	/**
	 * @test
	 */
	public function test_array_push()
	{
		$response = $this->array->from([2, 4, 6, 8])->push(10, 12, 14);
		$this->assertSame([2, 4, 6, 8, 10, 12, 14], $response->get(), 'Something is not going well');
	}

	public function tearDown()
	{
		parent::tearDown();
		Mockery::close();
	}
}
