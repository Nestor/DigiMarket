<?php
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/projects/ElectricMarket");
require(ROOT . "/library/modules/creation/create.php");
require(ROOT . "/core/init.php");

$create = new Create;

$create->create_script(1,1,1,1,1);
?>
