<?php
/* 
As of 25th Aug 2016, everything in this configuration is editable!
*/
/* The name you want to call your marketplace */
$market_name = "DigiMarket";

/* MySQL Information */
$serverip = "localhost";
$username = "exlabsco_dm";
$password = "x275432";
$dbname = "exlabsco_digimarket";

$devmode = 1;

/* The folder that this is stored in, if its in the main directory where you land when you goto your domain, then just set this to your domain name! */
$website_root_user = "http://wafflezzz.xyz/projects/ElectricMarket"; // Dont leave / at the end

/* User timeout in minutes */
$user_timeout = 30; 

/* 
This is editable, but I wouldn't recommend it.
Defining the cost of LOW, MID or HIGH for use underneath
*/
if (!defined("COST_LOW")) {
define("COST_LOW", 10);
define("COST_MID", 15);
define("COST_HIGH", 20);
}

/* Resource Load for Password Hashing | LOW = Not as secure but fast | MID = Adds a bit of extra time | HIGH = Adds a lot of extra time
   the time it takes is variable on the server you have - powerful server = less time - slow server = more time.
 */
$hash_cost = COST_LOW;

/* Self Explanatory -> Where all the digital goods are uploaded to */
$fileUploadPath = "/uploads/files";

/* Self Explanatory -> Where all the images (excluding digital goods - see the above variable) are uploaded to */
$imageUploadPath = "/uploads/images";
?>