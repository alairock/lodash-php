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

	public function tearDown()
	{
		parent::tearDown();
		Mockery::close();
	}
}
