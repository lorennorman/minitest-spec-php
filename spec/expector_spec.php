<?php

require_once('spec_helper.php');

describe("Expector DSL", function()
{
  describe("expect() method", function()
  {
    it("has to work", function()
    {
      expect(true)->toBe(true);

      expect(function() {
        expect("false")->toBe("true");
      })->toRaise("false should be true");
    });
  });
});