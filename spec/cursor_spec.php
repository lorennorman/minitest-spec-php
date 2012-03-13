<?php

require "spec/spec_helper.php";

describe("Cursor", function() {
  it("takes a starting context", function() {
    $context = "just a string";
    $cursor = new Cursor($context);

    expect($cursor->getContext())->toBe($context);
  });

  it("can push contexts", function() {
    $startCtx = "start";
    $cursor   = new Cursor($startCtx);

    $ctx1 = "context 1";
    $ctx2 = "context 2";
    $ctx3 = "context 3";
    $ctx4 = "context 4";

    $cursor->pushContext($ctx1);
    expect($cursor->getContext())->toBe($ctx1);
    $cursor->pushContext($ctx2);
    expect($cursor->getContext())->toBe($ctx2);
    $cursor->pushContext($ctx3);
    expect($cursor->getContext())->toBe($ctx3);
    $cursor->pushContext($ctx4);
    expect($cursor->getContext())->toBe($ctx4);

    $cursor->popContext();
    expect($cursor->getContext())->toBe($ctx3);
    $cursor->popContext();
    expect($cursor->getContext())->toBe($ctx2);
    $cursor->popContext();
    expect($cursor->getContext())->toBe($ctx1);
    $cursor->popContext();
    expect($cursor->getContext())->toBe($startCtx);
  });
});

?>