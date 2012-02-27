<?php

require_once('spec/spec_helper.php');

describe("toBe", function()
{
  it("checks that the subject === the predicate", function()
  {
    try {
      $passing = false;
      expect(true)->toBe(false);
    } catch(Exception $e) {
      $passing = true;
    }

    if(!$passing)
    {
      throw new Exception("true should not === false");
    }
  });
});