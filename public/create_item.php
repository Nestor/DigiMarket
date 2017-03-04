<?php
$fileBack = "../";
session_start();
ob_start();
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
require(ROOT . "/library/modules/creation/create.php");
require(ROOT . "/library/modules/uploads/upload.php");
require(ROOT . "/core/init.php");
require(ROOT . "/core/theme.php");
$init->loadTheme($project_theme, $fileBack);
$enabled = 1; // Enables / Disables the page ( Boolean - 1/0 | 1 = true (yes its enabled) || 0 = false (no its not enabled) )
require(ROOT . "/library/modules/user/ranks/ranks.php");
$ranks = new Ranks;
$ranks->checkPriv($_COOKIE['username'], $_SESSION['password'], "sDG");
if ($ranks->authed == 1) {
    ?>

    <!--
    Files made up of HTML wont be commented in detail.
    -->
<?= $init->loadTemplate("header") ?>
    
<?= $init->loadTemplate("createItemForm") ?>

    <?php
    if (!empty($_COOKIE['username']) and !empty($_SESSION['password'])) {
     //   echo "<hr>Authentication: Success<hr>";
    }
    if ($enabled == 1) {
        if (isset($_POST['submitted'])) {
            if ($_POST['submitted'] == 1) {
                $upload = new Upload;
                $upload->fileUpload(basename($_FILES['userUpload']['name']), $_FILES['userUpload']['tmp_name']);
                $directPathToItem = UPLOAD_DIR . basename($_FILES['userUpload']['name']);
                $create = new Create;
                $create->create_script($_POST['title'], $_POST['description'], $_POST['summary'], $_POST['price'], $directPathToItem);
            }
        }
    } else {
        echo "This function has been disabled<br>If you have downloaded this and I (the developer, Exus) have forgotten to
          re-enable the files, then to enable this, open the file public/thisfilename.php and on the 6th line there
          should be this: $enabled = 0; please change that to $enabled = 1; and then the file should work like normal";
    }

} else { // echo "<hr>Authentication: Failed<hr>"; 
}
ob_end_flush();
?>
