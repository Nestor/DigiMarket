<?php 
ob_start();
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
require(ROOT . "/library/modules/user/auth/auth.php");
require(ROOT . "/core/init.php");

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
ob_end_flush();
?>