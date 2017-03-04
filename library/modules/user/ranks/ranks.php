<?php
Class Ranks {
	Function setRank($username, $rankid) {
		define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
		require(ROOT . "/core/init.php");
  	    $setRank = $conn->prepare("UPDATE `us` SET rank=:rankid WHERE username=:username");
 	  $setRank->bindParam(":username", $username);
    $setRank->bindParam(":rankid", $rankid);
    try {
    $setRank->execute();
    } catch (exception $error) {
    	if (DEVELOPMENT == 1) {
    		echo "An unexpected error has occured:<br>" . $error;
    	} else {
    		echo "An unepected error has occured, please contact the site administrator";
    	}
    }
	}
	
	Function checkPriv($username, $password, $perms) {
	   $this->authed = 0;
	   require(ROOT . "/library/modules/user/auth/auth.php");
	   $auth = new Auth;
	   $auth->doLogin($username, $password); 
	   if ($auth->authVal == 1) {
	   if (!defined("ROOT")) {
	   define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
	   }
      require(ROOT . "/core/init.php");
	   $rankID = $conn->prepare("SELECT * FROM `us` WHERE email=:email");
	   $rankID->bindParam(":email", $username);
	   $rankID->execute();
   	   while ($rid = $rankID->fetch(PDO::FETCH_ASSOC)) {
   	      $checkRank = $conn->prepare("SELECT * FROM `ranks` WHERE id=:id");
   	      $checkRank->bindParam(":id", $rid['rank']);
   	      $checkRank->execute();
      	      while ($cr = $checkRank->fetch(PDO::FETCH_ASSOC)) {
      	         if ( strpos($cr['privileges'], $perms) == true or $cr['privileges'] == "*" ) {
      	            $this->authed = 1;
      	         } else {
      	             $this->authed = 0;
                 }
      	      }
   	   }
	   }
	   }
	
	
}
?>