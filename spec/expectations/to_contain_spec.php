<?php

require_once('spec/spec_helper.php');

describe("toContain expectation", function()
{
  it("exists", function()
  {
    expect(array("whatever"))->toContain("whatever");
  });
});