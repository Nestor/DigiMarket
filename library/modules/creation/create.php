<?php
    class Create {
        function create_script($title, $description, $summary, $price, $itemPath) {
            require(ROOT . "/core/init.php");
            require(ROOT . "/library/modules/user/auth/auth.php");
            $auth = new Auth;
            $auth->doLogin($_COOKIE['username'], $_SESSION['password']);
            if ($auth->authVal == 1) {
            $author = $_COOKIE['username'];
            $title_nospace = $string = str_replace(' ', '_', $title);
            echo "<hr>";
            try {
                $insert = $conn->prepare("INSERT INTO `items` (`title`, `description`, `summary`, `price`, `author`, `title_original`, `file`, `deleted`) VALUES (:title, :description, :summary, :price, :author, :title_original, :file, 0)");
                $insert->bindParam(":title", $title_nospace);
                $insert->bindParam(":description", $description);
                $insert->bindParam(":summary", $summary);
                $insert->bindParam(":price", $price);
                $insert->bindParam(":author", $author);
                $insert->bindParam(":title_original", $title);
                $insert->bindParam(":file", $itemPath);
                $insert->execute();

                echo "Query Execution: Success";
            } catch (exception $error) {
                if (DEVELOPMENT == 1) {
                    echo "Query Execution: Failed<br>" . $error->getMessage();
                } else {
                    echo "Query Execution: Failed<br>Something went wrong, please try again, if this error persists then please contact support.";
                }
            }
            echo "<hr>";
            }
            
        }
    }
?>