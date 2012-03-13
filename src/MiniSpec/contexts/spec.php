<?php

class Spec
{
  public $label;
  private $block;
  public function Spec($label, $block)
  {
    $this->label = $label;
    $this->block = $block;
  }

  public function execute()
  {
    $block = $this->block;
    return $block();
  }

  public function __toString() {
    return "Spec: ".$this->label;
  }
}

?>