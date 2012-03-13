<?php

class Dsl
{
  public $cursor;
  public $suite;
  public function Dsl($newSuite)
  {
    if($newSuite === null)
    {
      throw new Exception("DSL requires a suite to work on.");
    }
    $this->suite  = $newSuite;
    $this->cursor = new Cursor($newSuite);
  }

  private static $activeDsl;
  public static function getDsl()
  {
    if(!self::$activeDsl) # initialize a new dsl if needed
    {
      $newActiveSpec   = new SpecSuite();
      self::$activeDsl = new Dsl($newActiveSpec);
    }

    return self::$activeDsl;
  }

  public static function setDsl($newDsl)
  {
    self::$activeDsl = $newDsl;
  }

  public function describe($description, $describeBlock)
  {
    $describe = new Describe($description);
    $this->cursor->getContext()->addDescribe($describe);
    $this->cursor->pushContext($describe);
    $describeBlock();
    $this->cursor->popContext();
  }

  public function it($behavior, $expectBlock)
  {
    $spec = new Spec($behavior, $expectBlock);
    $this->cursor->getContext()->addSpec($spec);
  }
}

function describe($subject, $describeBlock)
{
  echo $subject."\n";
  // $describeBlock();
  Dsl::getDsl()->describe($subject, $describeBlock);
}

function it($behavior, $expectBlock)
{
  echo "   ".$behavior."\n";
  // $expectBlock();
  Dsl::getDsl()->it($behavior, $expectBlock);
}

function before($beforeFilter)
{
  // Dsl::pushBefore(new Before($beforeFilter));
}

function after($afterFilter)
{
  // Dsl::pushAfter(new After($afterFilter));
}

?>
