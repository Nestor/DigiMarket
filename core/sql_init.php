<?php
/* 
* This file shouldn't be used for anything but declaration and definitions 
* This file should NOT be modified 
* You HAVE been warned!
*/

/* Document Root for ALL files */
require(ROOT . "/config/configuration.php");

/* MySQL Information */
define(SQL_SERVER_IP, $serverip);
define(SQL_USERNAME, $username);
define(SQL_PASSWORD, $password);
define(SQL_DB_NAME, $dbname);

require(ROOT . "/library/modules/connect/pdo_connect.php");

?>