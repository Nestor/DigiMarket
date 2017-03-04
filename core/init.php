<?php
if (!defined("ROOT")) {
    define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
}
include("autoload.php");


           /* Configuration File - In the Config Directory */
        require(ROOT . "/config/configuration.php");
        
        /* MySQL Information */
        if (!defined("SQL_SERVER_IP")) {
            define("SQL_SERVER_IP", $db_serverip);
            define("SQL_USERNAME", $db_username);
            define("SQL_PASSWORD", $db_password);
            define("SQL_DB_NAME", $db_name);
        }
        /* Require the Connection File */
        require(ROOT . "/library/modules/connect/pdo_connect.php");
        
        if(!defined("MARKET_NAME")) {
        
        /* Market Name - e.g. DigiMarket -> Whats shown on screen and in Emails */
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

        /* Item upload directory */
        define("FILE_UPLOAD_DIR", ROOT . $fileUploadPath . "/");
        
        /* Image upload directory */
        define("IMAGE_UPLOAD_DIR", ROOT . $imageUploadPath . "/");
    
        }


?>

