<?php
	/* Don't Mess With This File! */
	require("../../../../core/init.php");

	function doLogin($email, $password) {
	/* Default variables for your email and password */
	$int = USER_LOGOUT_TIME;

	/* Verify email prepared statement (password has verification comes in an if statement later) */
	$verifyEP = $conn->prepare("SELECT * FROM us WHERE email=:email");
	$verifyEP->bindParam(":email", $email);
	$verifyEP->execute();

	while ($vep = $verifyEP->fetch(PDO::FETCH_BOTH)) {
		/* Verify password hashes */
		if (password_verify($vep['password'], $password)) {
			/* SuccessMsg */
    		echo 'User validated successfully!<br>Welcome back ' . $vep['username'];
    		echo '<br>We are just getting your account ready for use!';
    		setcookie("username",$vep['username'],time()+$int);
    		setcookie("password",password_hash($vep['password']),time()+$int);

		} else {
			/* FailMsg */
    		echo 'Invalid Username or Password';
		}
	}
}
?>