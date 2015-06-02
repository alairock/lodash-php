<?php namespace alairock\lodash;

/**
 * Arrays
 */
class Arrays
{

  public $workingArray = [];

  public function __construct(Array $array)
  {
    $this->workingArray = $array;
  }

  public function for(Array $array)
  {
    $this->workingArray = $array;
    return $this;
  }

  public function get() {
    return $this->workingArray;
  }

  public function toJson()
  {
    return json_encode($this->workingArray);
  }

  public function each(Closure $callback)
  {
    foreach ($this->workingArray as $key => $value) {
      callback($value, $key);
    }
    return $this;
  }
}
