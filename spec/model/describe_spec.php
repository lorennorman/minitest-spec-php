<?php

require "spec/spec_helper.php";

describe("Describe", function() {
  function subject() {
    return new Describe("blah");
  };

  it("exposes its label", function() {
    expect(subject()->label)->toBe("blah");
  });

  describe("adding describes", function() {
    it("can add describes", function() {
      $desc = subject();

      $describe1 = new Describe("describe 1");
      $describe2 = new Describe("describe 2");
      $describe3 = new Describe("describe 3");

      $desc->addDescribe($describe1);
      $desc->addDescribe($describe2);
      $desc->addDescribe($describe3);

      expect($desc->describes)->toContain($describe1);
      expect($desc->describes)->toContain($describe2);
      expect($desc->describes)->toContain($describe3);
    });

    it("executes a nested describe's specs", function() {
      $desc = subject();
      $nestedSpecRan = false;

      $nestedDescribe = new Describe("nested describe");
      $nestedSpec     = new Spec("i'm nested!", function() use(&$nestedSpecRan)
      {
        $nestedSpecRan = true;
      });

      $nestedDescribe->addSpec($nestedSpec);
      $desc->addDescribe($nestedDescribe);

      $desc->execute();

      expect($nestedSpecRan)->toBe(true);
    });
  });

  describe("adding specs", function() {
    it("can add specs", function() {
      $desc = subject();

      $spec1 = new Spec("Spec1", function() {});
      $spec2 = new Spec("Spec2", function() {});
      $spec3 = new Spec("Spec3", function() {});

      $desc->addSpec($spec1);
      $desc->addSpec($spec2);
      $desc->addSpec($spec3);

      expect($desc->specs)->toContain($spec1);
      expect($desc->specs)->toContain($spec2);
      expect($desc->specs)->toContain($spec3);
    });

    it("executes them all", function() {
      $desc = subject();

      $spec1Ran = false;
      $spec2Ran = false;
      $spec3Ran = false;

      $spec1 = new Spec("Spec1", function() use(&$spec1Ran) { $spec1Ran = true; });
      $spec2 = new Spec("Spec2", function() use(&$spec2Ran) { $spec2Ran = true; });
      $spec3 = new Spec("Spec3", function() use(&$spec3Ran) { $spec3Ran = true; });

      $desc->addSpec($spec1);
      $desc->addSpec($spec2);
      $desc->addSpec($spec3);

      $desc->execute();

      expect($spec1Ran)->toBe(true);
      expect($spec2Ran)->toBe(true);
      expect($spec3Ran)->toBe(true);
    });
  });

  describe("adding befores", function() {
    it("can add befores", function() {
      $desc = subject();
      
      $before1Ran = false;
      $before2Ran = false;
      $before3Ran = false;

      $before1 = new Before(function() use(&$before1Ran) { $before1Ran = true; });
      $before2 = new Before(function() use(&$before2Ran) { $before2Ran = true; });
      $before3 = new Before(function() use(&$before3Ran) { $before3Ran = true; });

      $desc->addBefore($before1);
      $desc->addBefore($before2);
      $desc->addBefore($before3);

      $desc->execute();

      expect($desc->befores)->toContain($before1);
      expect($desc->befores)->toContain($before2);
      expect($desc->befores)->toContain($before3);
    });
    
    it("executes them all", function() {
      $desc = subject();

      $before1Ran = false;
      $before2Ran = false;
      $before3Ran = false;

      $before1 = new Before(function() use(&$before1Ran) { $before1Ran = true; });
      $before2 = new Before(function() use(&$before2Ran) { $before2Ran = true; });
      $before3 = new Before(function() use(&$before3Ran) { $before3Ran = true; });

      $desc->addBefore($before1);
      $desc->addBefore($before2);
      $desc->addBefore($before3);

      $desc->execute();

      expect($before1Ran)->toBe(true);
      expect($before2Ran)->toBe(true);
      expect($before3Ran)->toBe(true);
    });
  });

  describe("adding afters", function() {
    it("can add afters", function() {});
  });

  describe("adding lets", function() {
    it("can add lets", function() {});
  });
});

?>