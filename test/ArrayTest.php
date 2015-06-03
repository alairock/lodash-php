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


	public function tearDown()
	{
		parent::tearDown();
		Mockery::close();
	}
}
