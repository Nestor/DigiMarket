<?php
session_start();
ob_start();
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
require(ROOT . "/core/init.php");
require(ROOT . "/library/modules/download/download.php");
$download = new Download;
$enabled = 0;

$grabFiles = $conn->prepare("SELECT * FROM `items`");
$grabFiles->execute();

while ($gf = $grabFiles->fetch(PDO::FETCH_ASSOC)) {
    if ($enabled == 1) {
        $download->downloadFile($gf['file']);
    } else {
        echo "This function has been disabled<br>If you have downloaded this and I (the developer, Exus) have forgotten to
          re-enable the files, then to enable this, open the file public/thisfilename.php and on the 6th line there
          should be this: $enabled = 0; please change that to $enabled = 1; and then the file should work like normal<br>
          <h1>I <b>DO NOT</b> recommend that you enable this page, it is a very bad idea unless you are debugging.</h1>";
    }
}

ob_end_flush();
?>