<?php

require_once('spec_helper.php');

describe("Describe blocks", function()
{
  it("create context frames", function()
  {
    $example = <<<EX_SPEC
describe('1', function() {
  describe('2', function() { });
  describe('3', function() {
    it('a', function() { });
  });

  it('b', function() { });
});
EX_SPEC;

    $testContext = new SpecContext();
    SpecContext::withContext($testContext, function() use ($example)
    {
      eval($example);
    });

    expect($testContext->contexts())->toContain("1");
    expect($testContext->contexts())->toContain("1 2");
    expect($testContext->contexts())->toContain("1 3");
    expect($testContext->contexts())->toContain("1 3 a");
    expect($testContext->contexts())->toContain("1 b");
  });
});