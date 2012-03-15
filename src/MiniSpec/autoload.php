<?php

### Pull in the various testing tools ###

# DSL parser
require_once('dsl.php');
require_once('cursor.php');

# Expectations
require_once('expectations/to_be.php');
require_once('expectations/to_raise.php');
require_once('expectations/to_contain.php');
require_once('expector.php');

# Nested Spec Contexts
require_once('contexts/spec_suite.php');
require_once('contexts/describe.php');
require_once('contexts/spec.php');
require_once('contexts/before.php');

# ...and run whatever behaviors have been specified at the end!
register_shutdown_function(function() {
  Dsl::getDsl()->suite->execute();
});

?>