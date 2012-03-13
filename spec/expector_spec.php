<?php

require_once('spec_helper.php');

describe("Expector Dsl", function()
{
  describe("expect() method", function()
  {
    it("has to work", function()
    {
      expect(true)->toBe(true);

      expect(function() {
        expect("false")->toBe("true");
      })->toRaise("Expected 'false' to be 'true'.");
    });
  });
});