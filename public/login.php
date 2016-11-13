<?php require("../core/init.php"); ?>
<!-- 
	Files made up of mostly HTML wont be commented
-->
<head>
	<title><?php echo MARKET_NAME; ?> | Home</title>
</head>

<form action="rlogin.php" method="post">
<label>Login</label><br><br>
<input type="email" id="email" name="email" placeholder="Email" required />&nbsp
<input type="text" id="text" name="tryLogin" value=1 style="display:none;" />&nbsp
<input type="password" id="password" name="password" placeholder="Password" required /><br><br>
<input type="submit" />
</form>
<?php
if (!empty($_COOKIE['username']) and !empty($_COOKIE['password'])) {
	echo "User Logged in... \n You don't need to login.";
}

if (isset($_POST['tryLogin'])) {
	if ($_POST['tryLogin'] == 1) {
		doLogin($_POST['email'], $_POST['password']);
	}
}



?>