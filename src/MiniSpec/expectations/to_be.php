<?php

class ToBeExpectation
{
  public static $matcherName = "toBe";

  public function matcher($subject, $args)
  {
    $predicate = $args[0];
    if($subject !== $predicate)
    {
      throw new Exception("Expected '".$subject."' to be '".$predicate."'.");
    }
  }
}

class NotToBeExpectation
{
  public static $matcherName = "notToBe";

  public function matcher($subject, $args)
  {
    $predicate = $args[0];
    if($subject === $predicate)
    {
      throw new Exception("Expected '".$subject."' not to be '".$predicate."'.");
    }
  }
}