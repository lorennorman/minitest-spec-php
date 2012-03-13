<?php

require "spec/spec_helper.php";

describe("SpecSuite", function() {
  it("pretty prints", function() {
    $suite = new SpecSuite("My Pretty Spec");

    expect("Coerce: ".$suite)->toBe("Coerce: My Pretty Spec");
  });
});

?>