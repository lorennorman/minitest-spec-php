<?php

class SpecSuite
{
  public $label;
  public function SpecSuite($newLabel="Top Level")
  {
    $this->label = $newLabel;
  }

  public $describes = array();
  public function addDescribe($newDescribe)
  {
    array_push($this->describes, $newDescribe);
  }

  private $specs = array();
  public function addSpec($newSpec)
  {
    array_push($this->specs, $newSpec);
  }

  public function execute()
  {
    # _($describes).each(&execute);
    array_map(function($e) { $e->execute(); }, $this->describes);
  }

  public function __toString()
  {
    return $this->label;
  }
}

?>