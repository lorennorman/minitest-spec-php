<?php

class Describe
{
  public $label;
  public $befores = array();
  public $specs = array();
  public $describes = array();

  public function Describe($newLabel)
  {
    $this->label = $newLabel;
  }
  
  public function addBefore($before)
  {
    array_push($this->befores, $before);
  }

  public function addSpec($spec)
  {
    array_push($this->specs, $spec);
  }

  public function addDescribe($describe)
  {
    array_push($this->describes, $describe);
  }

  public function execute()
  {
    array_map(function($e) { $e->execute(); }, $this->befores);
    array_map(function($e) { $e->execute(); }, $this->specs);
    array_map(function($e) { $e->execute(); }, $this->describes);
  }
}

?>