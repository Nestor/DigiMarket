<?php
session_start();
ob_start();
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
require(ROOT . "/library/modules/creation/create.php");
require(ROOT . "/library/modules/uploads/upload.php");
require(ROOT . "/core/init.php");
$enabled = 0; // Enables / Disables the page ( Boolean - 1/0 | 1 = true (yes its enabled) || 0 = false (no its not enabled) )
?>

<!--
Files made up of HTML wont be commented in detail.
-->
<head>
	<title><?php echo MARKET_NAME; ?> | Home</title>
</head>

<form enctype="multipart/form-data" action="create_item.php" method="post">
    <label>Create Item</label><br><br>
    <input type="text" id="title" name="title" placeholder="Title" required /><br><br>
    <input type="text" id="description" name="description" placeholder="Description" required /><br><br>
    <input type="text" id="summary" name="summary" placeholder="Summary" required /><br><br>
    $ <input type="text" id="price" name="price" placeholder="5" required /><br><br>
    <input type="text" id ="text" name="submitted" value=1 style="display:none;" />
    File: <input name="userUpload" type="file" /><br><br>
    <input type="submit" />
</form>
<?php
if (!empty($_COOKIE['username']) and !empty($_SESSION['password'])) {
    echo "<hr>Authentication: Success<hr>";
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
}
else {
        echo "This function has been disabled<br>If you have downloaded this and I (the developer, Exus) have forgotten to
          re-enable the files, then to enable this, open the file public/thisfilename.php and on the 6th line there
          should be this: $enabled = 0; please change that to $enabled = 1; and then the file should work like normal";
}


ob_end_flush();
?>
