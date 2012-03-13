<?php

require "spec/spec_helper.php";

describe("Spec", function() {
  function subject() {
    return new Spec("i return 5", function() {
      return 5;
    });
  }

  it("has a label", function() {
    expect(subject()->label)->toBe("i return 5");
  });

  it("is executable", function() {
    expect(subject()->execute())->toBe(5);
  });

  it("has a toString", function() {
    "coerce toString call".subject();
  });
});

?>