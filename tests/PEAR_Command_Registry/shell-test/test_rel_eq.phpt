--TEST--
shell-test command, rel eq
--SKIPIF--
<?php
if (!getenv('PHP_PEAR_RUNTESTS')) {
    echo 'skip';
}
?>
--FILE--
<?php

require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$reg = &$config->getRegistry();
$pkg = new PEAR_PackageFile($config);
$info = $pkg->fromPackageFile(dirname(__FILE__) . DIRECTORY_SEPARATOR .
    DIRECTORY_SEPARATOR . 'packagefiles' . DIRECTORY_SEPARATOR . 'package2.xml',
    PEAR_VALIDATE_NORMAL);
$reg->addPackage2($info);
require_once 'PEAR/ChannelFile.php';
$ch = new PEAR_ChannelFile;
$ch->setName('gronk');
$ch->setServer('gronk');
$ch->setSummary('gronk');
$reg->addChannel($ch);
$info = $pkg->fromPackageFile(dirname(__FILE__) . DIRECTORY_SEPARATOR .
    DIRECTORY_SEPARATOR . 'packagefiles' . DIRECTORY_SEPARATOR . 'packagegronk.xml',
    PEAR_VALIDATE_NORMAL);
$reg->addPackage2($info);
$e = $command->run('shell-test', array(), array('PEAR', 'eq', '1.4.0a1'));
$phpunit->assertNoErrors('ok');
$e = $command->run('shell-test', array(), array('gronk/PEAR', 'eq', '1.4.0a1'));
$phpunit->assertNoErrors('ok');
echo 'tests done';
?>
--CLEAN--
<?php
require_once dirname(dirname(__FILE__)) . '/teardown.php.inc';
?>
--RETURNS--
0
--EXPECT--
tests done
