<?php
require_once 'PEAR/ErrorStack.php';
set_include_path(get_include_path().PATH_SEPARATOR.getcwd()); // allows chdir
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'phpt_test.php.inc';
$phpunit = new PEAR_PHPTest(true);
$stack = &PEAR_ErrorStack::singleton('test');
?>