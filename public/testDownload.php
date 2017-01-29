<?php
session_start();
ob_start();
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
require(ROOT . "/core/init.php");
require(ROOT . "/library/modules/download/download.php");
$download = new Download;
$enabled = 1;

$grabFiles = $conn->prepare("SELECT * FROM `items`");
$grabFiles->execute();

while ($gf = $grabFiles->fetch(PDO::FETCH_ASSOC)) {
    if ($enabled == 1) {
        $download->downloadFile($gf['file']);
    } else {
        echo "<h1>This page has been disabled by the project developer</h1>";
    }
}

ob_end_flush();
?>