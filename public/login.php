<?php
session_start();
ob_start();
$fileBack = "../";
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
require(ROOT . "/core/init.php");
require(ROOT . "/library/modules/user/auth/auth.php");
require(ROOT . "/core/theme.php");
$auth = new Auth;
$init->loadTheme($project_theme, $fileBack);

?>
<!-- 
	Files made up of HTML wont be commented in detail.
-->

<?= $init->loadTemplate("header"); ?>


<?= $init->loadTemplate("loginForm"); ?>



<?php
if (!empty($_COOKIE['username']) and !empty($_COOKIE['password'])) {
	echo "User Logged in... \n You don't need to login.";
}

if ( isset( $_POST['submitted'] ) ) {
	if ( $_POST['submitted'] == 1 ) {        
		$auth->doLogin($_POST['email'], $_POST['password']);
        if ($auth->authVal == 1) {
            echo "<h2 style='color:lightgreen;'>Welcome back " . $auth->userName . "<br>Your account is now ready for use!</h2>";
        } else {
            echo "<h2 style='color:#ff6b6b;'> Something went wrong, please check your email or your password</h2>";
        }
    }
}  

ob_end_flush();
?>