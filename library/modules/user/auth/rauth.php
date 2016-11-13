<?php
/* Dont  mess with this! */
require("../../../../core/init.php");

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
$message = "Hello " . $username . ",\n Thank you for registering with " . $market_name . " to take full advantage of our service, please prove that you are the owner of this account by clicking on this link: \n" . $website_domain . "/verification/verify.php?auth=" . $authid . "&username=" . $username;
/* Limits words to lines */
$message = wordwrap($message, 100);

/* Sends email */
mail($email, "Account verification", $message);


/* SuccessMsg */
echo "Successfully registered, redirecting...";

/* Redirect */
$redirect = ROOT . "/public/index.php";
header("Refresh:0; url=$redirect");

} else {
	/* FailMsg - Blank Field */
	echo "Sorry! You have left either one or more fields blank, please try again!";
}

?>