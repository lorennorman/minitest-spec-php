<?php

class ToRaiseExpectation
{
  public static $matcherName = 'toRaise';

  public function matcher($subject, $args)
  {
    $exceptionToMatch = $args[0];
    $failing = true;

    try { call_user_func($subject); }
    catch(Exception $e) {
      if($e->getMessage() != $exceptionToMatch) {
        throw new Exception("Expected to raise \"".$exceptionToMatch."\" but instead raised \"".$e."\"");
      } else {
        $failing = false;
      }
    }

    if($failing)
    {
      throw new Exception("Expected to raise \"".$exceptionToMatch."\" but instead raised nothing.");
    }
  }
}
