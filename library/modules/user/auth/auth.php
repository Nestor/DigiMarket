<?php
class Auth {
/* Register */

function userRegister($username, $email, $password) {
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/projects/ElectricMarket");
require(ROOT . "/core/init.php");
    
/* Get variables from the register page */
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$auth_market_name = MARKET_NAME . "_";
$website_domain = WEBSITE_DOMAIN;

/* Check for empty results */
if ( !empty($username) or !empty($email) or !empty($password) ) {

/* Hash password (bcrypt) */
$settings = [ 
	'cost' => PASS_HASH_COST,	
];
$password = password_hash($password, PASSWORD_DEFAULT, $settings);
$authid = uniqid($market_name, true);


/* SQL - done in PDO - files called from init.php */
/* Prepare statement */

    
$register_user = $conn->prepare("INSERT INTO us (username, password, email, emailauthverify) VALUES (:username, :password, :email, :auid)");
$register_user->bindParam(":username", $username);
$register_user->bindParam(":password", $password);
$register_user->bindParam(":email", $email);
$register_user->bindParam(":auid", $authid);
$register_user->execute();

/* Message to email - Contains AUTH CODE */
$message = "Hello " . $username . ",\n Thank you for registering with " . $market_name . " to take full advantage of our service, please prove that you are the owner of this account by clicking on this link: \n" . $website_domain . "/verify/?auth=" . $authid . "&username=" . $username;
/* Limits words to lines */
$message = wordwrap($message, 100);

/* Sends email */
mail($email, "Account verification", $message);


/* Redirect */
$redirect = ROOT . "/public/index.php";
header("Refresh:0; url=$redirect");

} else {
	/* FailMsg - Blank Field */
	echo "";
}

}


/* Login */


function doLogin($email, $passwd) {
  require(ROOT . "/core/init.php");
	$int = USER_LOGOUT_TIME;
    $checkAuth = 0;

	/* Verify email prepared statement (password has verification comes in an if statement later) */
	$verifyEP = $conn->prepare("SELECT * FROM us WHERE email=:email");
	$verifyEP->bindParam(":email", $email);
	$verifyEP->execute();

	while ($vep = $verifyEP->fetch(PDO::FETCH_BOTH)) {
        /* Verify password hashes */
		if (password_verify($passwd, $vep['password'])) {
			/* SuccessMsg */
            $checkAuth = 1;
			setcookie("username",$vep['email'],time()+$int);
    		$_SESSION['password'] = $passwd;
    		$verifiedUsername = $vep['username'];
		}
	}

	if ($checkAuth == 1) {
        $this->authVal = 1;
        $this->userName = $verifiedUsername;
    } else {
        $this->authVal = 0;
    }

}
    
/* Email Auth Verification - Needs Converting to use OOP PHP (Current Dir: public/verification/verify.php) - Yeah Despite the fact that this is populated, the main file needs a conversion. */
    
function userEmAuth($authkey, $user) {
    
    require(ROOT . "/core/init.php");
    $init = new Init;
    $init->sql_init();

	/* Prepared Statement to fetch data from the users table to be used to verify */
	$fetchauthdata = $conn->prepare("SELECT * FROM us WHERE username=:username");
	$fetchauthdata->bindParam(":username", $user);
	$fetchauthdata->execute();

	while($fad = $fetchauthdata->fetch(PDO::FETCH_BOTH)) {
		/* Checks if the user is already verified */
		if ($fad['verified'] != 1) {
			/* Checks if the auth key in the table and the authkey the user has supplied through GET matches */
			if ($authkey == $fad['emailauthverify']) {
				$setverifyuser = $conn->prepare("UPDATE us SET verified=1");
				$setverifyuser->execute();
				/* SuccessMsg */
				echo "Thank you for registering with us, your account has now been verified.";
				/* Redirect */
				$redirect = ROOT . "/public/index.php";
				header("Refresh:0; url=$redirect");
			} else {
				/* FailMsg - Auth Codes don't match */
				echo "Sorry! Your auth code was incorrect, please resend it and try again!";
			}
		} else {
			/* FailMsg - Account already verified */
			echo "Your account has already been verified!";
			header("Refresh:0; url=$redirect");
		}
	}
}



}

?>