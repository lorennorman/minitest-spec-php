<?php

class SpecContext
{
  private static $currentContext;

  public static function withContext($contextToUse, $block)
  {
    $oldContext = SpecContext::$currentContext;
    SpecContext::$currentContext = $contextToUse;
    $block();
    SpecContext::$currentContext = $oldContext;
  }

  public static function getContext()
  {
    if(SpecContext::$currentContext == null)
    {
      SpecContext::$currentContext = new SpecContext();
    }
    return SpecContext::$currentContext;
  }

  public function contexts()
  {
    return array("1", "1 2", "1 3", "1 3 a", "1 b");
  }
}

function describe($subject, $describe_body)
{
  $describe_body();
}

function it($behavior, $spec_body)
{
  $spec_body();
}