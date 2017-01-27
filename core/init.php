<?php

define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");

include("autoload.php");


           /* Configuration File - In the Config Directory */
        require(ROOT . "/config/configuration.php");
        
        /* MySQL Information */
        
        define("SQL_SERVER_IP", $serverip);
        define("SQL_USERNAME", $username);
        define("SQL_PASSWORD", $password);
        define("SQL_DB_NAME", $dbname);
         
        /* Require the Connection File */
        require(ROOT . "/library/modules/connect/pdo_connect.php");
        
        if(!defined("MARKET_NAME")) {
        
        /* Market Name - e.g. ElectricMarket -> Whats shown on screen and in Emails */
        define("MARKET_NAME", $market_name);

        /* Developer Mode - Displays all errors -> Boolean (1/0) */
        define("DEVELOPMENT", $devmode);

        /* Website Root - Where the scripts files start from */
        $website_root = $website_root_user . "/public";
        define("WEBSITE_DOMAIN", $website_root); 

        /* User auto login expiration - Where it stays logged in for x amount of time */
        $user_timeout = $user_timeout * 60;
        define("USER_LOGOUT_TIME", $user_timeout);

        /* Hash Cost */
        define("PASS_HASH_COST", $hash_cost);
        }
?>