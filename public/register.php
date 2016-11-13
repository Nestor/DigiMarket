<?php require("../core/init.php"); ?>
<!-- 
	Files made up of HTML wont be commented because I cant be bothered to.
	Error Code 69420 - too much effort 
-->
<head>
	<title><?php echo MARKET_NAME; ?> | Home</title>
</head>

<form action="../library/modules/user/auth/rauth.php" method="post">
<label>Register</label><br><br>
<input type="email" id="email" name="email" placeholder="Email" required />&nbsp
<input type="text" id="username" name="username" placeholder="Username" required />&nbsp
<input type="password" id="password" name="password" placeholder="Password" required /><br><br>
<input type="submit" onclick="document.write('If this is taking a while to load, please don\'t worry! Its normal :) ')" />
</form>