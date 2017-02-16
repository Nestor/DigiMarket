<?php 
ob_start();
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
require(ROOT . "/library/modules/user/auth/auth.php");
require(ROOT . "/core/init.php");
$enabled = 0;
?>
<!-- 
	Files made up of HTML wont be commented because I cant be bothered to.
-->
<head>
	<title><?php echo MARKET_NAME; ?> | Home</title>
</head>

<form action="register.php" method="post">
<label>Register</label><br><br>
<input type="email" id="email" name="email" placeholder="Email" required />&nbsp
<input type="text" id="username" name="username" placeholder="Username" required />&nbsp
<input type="text" id="verify" name="verify" value=1 style="display:none;" />&nbsp
<input type="password" id="password" name="password" placeholder="Password" required /><br><br>
<input type="submit" />
</form>

<?php
if ($enabled == 1) {
    if (isset($_POST['verify'])) {
        if ($_POST['verify'] == 1) {
            echo "<br><br><br>";
            $auth = new Auth;

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $auth->userRegister($username, $email, $password, $init);

        }
    }
} else {
    echo "This function has been disabled<br>If you have downloaded this and I (the developer, Exus) have forgotten to
          re-enable the files, then to enable this, open the file public/thisfilename.php and on the 6th line there
          should be this: $enabled = 0; please change that to $enabled = 1; and then the file should work like normal";
}
ob_end_flush();
?>