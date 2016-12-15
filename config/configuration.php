<?php
/* 
As of 25th Aug 2016, everything in this configuration is editable!
*/
/* The name you want to call your marketplace */
$market_name = "ElectricMarket";

/* MySQL Information */
$serverip = "localhost";
$username = "wafflez3_psa1";
$password = "skLAwo291JLA";
$dbname = "wafflez3_projectsa";

$devmode = 1;

/* The folder that this is stored in, if its in the main directory where you land when you goto your domain, then just set this to your domain name! */
$website_root_user = "http://wafflezzz.xyz/projects/ElectricMarket"; // Dont leave / at the end

/* User timeout in minutes */
$user_timeout = 30; 

/* 
This is editable, but I wouldn't recommend it.
Defining the cost of LOW, MID or HIGH for use underneath
*/
define(COST_LOW, 10);
define(COST_MID, 15);
define(COST_HIGH, 20);

/* Resource Load for Password Hashing | LOW = Not as secure but fast | MID = Adds a bit of extra time | HIGH = Adds a lot of extra time
   the time it takes is variable on the server you have - powerful server = less time - slow server = more time.
 */
$hash_cost = COST_LOW;
?>