<?php

require_once('src/MiniSpec/autoload.php');

// If you wanted to be explicit about suites and what to execute:

// $suite = new SpecSuite();
// $dsl   = new Dsl($suite);
// 
// Dsl::setDsl($dsl);
//
// register_shutdown_function(function() {
//   $suite->execute();
// });

?>