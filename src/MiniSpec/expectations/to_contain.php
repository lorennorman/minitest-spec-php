<?php

class ToContainExpectation
{
  public static $matcherName = 'toContain';

  public function matcher($subject, $args)
  {
    $item = $args[0];
    if(!in_array($item, $subject))
    {
      throw new Exception("Expected ".$subject." to contain ".$item);
    }
  }
}