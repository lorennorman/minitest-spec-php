<?php

require_once('spec_helper.php');

describe("Dsl", function() {
  it("can get a new instance of itself", function() {
    $oldDsl = Dsl::getDsl();

    $newDsl = new Dsl(new SpecSuite());
    Dsl::setDsl($newDsl);

    expect(Dsl::getDsl())->notToBe($oldDsl);
    expect(Dsl::getDsl())->toBe($newDsl);

    Dsl::setDsl($oldDsl);
  });

  describe("the cursor", function() {
    it("initializes pointing at the top-level context", function() {
      $suite = new SpecSuite();
      $dsl   = new Dsl($suite);

      expect($dsl->cursor->getContext())->toBe($suite);
    });
  });

  describe("the describe dsl method", function() {
    it("adds a new Describe to the Suite", function() {
      $suite = new SpecSuite();
      $dsl   = new Dsl($suite);

      $dsl->describe("a new describe", function() { });
      expect(count($suite->describes))->toBe(1);

      $dsl->describe("a new describe", function() { });
      $dsl->describe("a new describe", function() { });
      expect(count($suite->describes))->toBe(3);
    });

    it("executes the describe block in the Describe context", function() {
      $suite    = new SpecSuite();
      $dsl      = new Dsl($suite);
      $executed = false;

      $dsl->describe("a new describe", function() use($suite, $dsl, &$executed)
      {
        $executed = true;
        expect($dsl->cursor)->notToBe($suite);
      });

      expect($executed)->toBe(true);
    });
  });
});

?>
