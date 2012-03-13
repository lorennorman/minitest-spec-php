<?php

class Expector
{
  private $subject;
  private $expectations = array("toBe"      => "ToBeExpectation",
                                "notToBe"   => "NotToBeExpectation",
                                "toContain" => "ToContainExpectation",
                                "toRaise"   => "ToRaiseExpectation");

  function Expector($sbj)
  {
    $this->subject = $sbj;
  }

  public function __call($name, $arguments)
  {
    if( array_key_exists($name, $this->expectations) ) {
      $matcher = new $this->expectations[$name];
      $matcher->matcher($this->subject, $arguments);
    } else {
      throw new Exception("No expectation named ".$name);
    }
  }
}

function expect($subject)
{
  return new Expector($subject);
}
