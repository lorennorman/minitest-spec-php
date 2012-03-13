<?php

class Cursor
{
  private $stack = array();

  public function Cursor($initialContext)
  {
    if($initialContext === null)
    {
      throw new Exception("Cursor requires a starting point.");
    }
    $this->pushContext($initialContext);
  }

  public function getContext()
  {
    return end($this->stack);
  }

  public function pushContext($newContext)
  {
    array_push($this->stack, $newContext);
  }

  public function popContext()
  {
    array_pop($this->stack);
  }
}

?>