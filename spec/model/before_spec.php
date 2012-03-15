<?php

require "spec/spec_helper.php";

describe("Before", function() {
  function subject() {
    return new Describe("blah");
  }
  
  it("executes before specs", function() {
    $desc = subject();
    
    $beforeRan = false;
    $specRanAfterBefore = false;
    
    $before = new Before(function() use(&$beforeRan) { $beforeRan = true; });
    
    $spec = new Spec("Spec", function() use(&$beforeRan, &$specRanAfterBefore) {
      if( $beforeRan ) {
        $specRanAfterBefore = true;
      }
    });
    
    $desc->addBefore($before);
    
    $desc->addSpec($spec);
    
    $desc->execute();
    
    expect($beforeRan)->toBe(true);
    expect($specRanAfterBefore)->toBe(true);
    
  });
  
});
?>