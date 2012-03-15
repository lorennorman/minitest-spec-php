<?php

class Before
{
  private $block;
  public function Before($block)
  {
    $this->block = $block;
  }

  public function execute()
  {
    $block = $this->block;
    return $block();
  }
}

?>