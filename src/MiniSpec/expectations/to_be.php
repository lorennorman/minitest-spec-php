<?php

class ToBeExpectation
{
  public static $matcherName = "toBe";

  public function matcher($subject, $args)
  {
    $predicate = $args[0];
    if($subject !== $predicate)
    {
      throw new Exception($subject." should be ".$predicate);
    }
  }
}