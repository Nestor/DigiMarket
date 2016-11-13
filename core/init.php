<?php
/* 
* This file shouldn't be used for anything but declaration and definitions 
* This file should NOT be modified 
* You HAVE been warned!
*/

/* Document Root for ALL files */
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/projects/ElectricMarket");


/* DO NOT DEFINE CUSTOM MODULES IN HERE */

/* Include - Loaders for custom scripts */
include ("autoload.php");

/* Require - Loaders for prebuilt scripts */
require(ROOT . "/config/configuration.php");

/* Market Name - e.g. ElectricMarket -> Whats shown on screen and in Emails */
define(MARKET_NAME, $market_name);

/* MySQL Information */
define(SQL_SERVER_IP, $serverip);
define(SQL_USERNAME, $username);
define(SQL_PASSWORD, $password);
define(SQL_DB_NAME, $dbname);

/* Developer Mode - Displays all errors -> Boolean (1/0) */
define(DEVELOPMENT, $devmode);

/* Website Root - Where the scripts files start from */
define(WEBSITE_DOMAIN, $website_root); 
$website_root = $website_root_user . "/public";

/* User auto login expiration - Where it stays logged in for x amount of time */
$user_timeout = $user_timeout * 60;
define(USER_LOGOUT_TIME, $user_timeout);

/* Hash Cost */
define(PASS_HASH_COST, $hash_cost);

require(ROOT . "/library/modules/connect/pdo_connect.php");


?>
