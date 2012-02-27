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

    switch ($name) {
      case 'toBe':
        ToBeExpectation::matcher($this->subject, $arguments);
        break;
      case 'toRaise':
        ToRaiseExpectation::matcher($this->subject, $arguments);
        break;
      case 'toContain':
        ToContainExpectation::matcher($this->subject, $arguments);
        break;
      default:
        throw new Exception("No expectation named ".$name);
    }
  }
}

function expect($subject)
{
  return new Expector($subject);
}
