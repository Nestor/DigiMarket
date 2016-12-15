<?php 
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/projects/ElectricMarket");
require(ROOT . "/library/modules/user/auth/auth.php");
$auth = new Auth;
?>
<!-- 
	Files made up of HTML wont be commented.
-->
<head>
	<title><?php echo MARKET_NAME; ?> | Home</title>
</head>

<form action="login.php" method="post">
<label>Login</label><br><br>
<input type="email" id="email" name="email" placeholder="Email" required />&nbsp
<input type="password" id="password" name="password" placeholder="Password" required /><br><br>
<input type="text" id ="text" name="submitted" value=1 style="display:none;" />
<input type="submit" />
</form>
<?php
if (!empty($_COOKIE['username']) and !empty($_COOKIE['password'])) {
	echo "User Logged in... \n You don't need to login.";
}

if ( isset( $_POST['submitted'] ) ) {
	if ( $_POST['submitted'] == 1 ) {        
		$auth->doLogin($_POST['email'], $_POST['password']);
    }
}  

// Test

?>