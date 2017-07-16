<?php

/* 
 * Copyright Jeremy Leach
 * Pegas Corp and Associates
 * 
 */
require_once getcwd()."/Src/Test/InvokeTests.php";

$testSuite = new \Capuchin\Test\InvokeTests();

$testSuite->assert();

//$testSuite->renderLogStdOut();