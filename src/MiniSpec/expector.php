<?php

class Expector
{
  private $subject;
  private $expectations = array("toBe"      => "ToBeExpectation",
                                "toContain" => "ToContainExpectation",
                                "toRaise"   => "ToRaiseExpectation");

  function Expector($sbj)
  {
    $this->subject = $sbj;
  }

  public function __call($name, $arguments)
  {
    // try {
    //   $expectation = new $this->expectations[$name];
    //   $expectation->matcher($this->subject, $arguments);
    // } catch(Exception $e) {
    //   throw new Exception("No expectation named ".$name);
    // }

	if( array_key_exists($name, $expectations) ) {
	    $expectations[$name]::matcher($this->subject, $arguments);
	} else {
        throw new Exception("No expectation named ".$name);
    }
  }
}

function expect($subject)
{
  return new Expector($subject);
}
