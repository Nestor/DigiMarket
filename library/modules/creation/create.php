<?php
    class Create {
        function create_script($title, $description, $summary, $price, $author) {
            require(ROOT . "/library/modules/user/auth/auth.php");
            $auth = new Auth;
            $auth->doLogin($_COOKIE['username'], $_SESSION['password']);
            
            if ($auth->authed == 1 ) {
            
            echo "Login - Authed!";
                
            /*
            $author = $_COOKIE['username'];
            $title_nospace = $string = str_replace(' ', '_', $title);
            
            $insert = $conn->prepare("INSERT INTO `items` (`title`, `description`, `summary`, `price`, `author`, `deleted`) VALUES (:title, :description, :summary, :price, :author, 0)");
            $insert->bindParam(":title", $title);
            $insert->bindParam(":description", $description);
            $insert->bindParam(":summary", $summary);
            $insert->bindParam(":price", $price);
            $insert->bindParam(":author", $author);
            $insert->execute();
            */    
            }
            
        }
    }
?>