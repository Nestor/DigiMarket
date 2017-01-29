<?php
Class Download {
    Function downloadFile($file) {
        require(ROOT . "/core/init.php");
        require(ROOT . "/library/modules/user/auth/auth.php");
        $auth = new Auth;
        $auth->doLogin($_COOKIE['username'], $_SESSION['password']);
        if ($auth->authVal == 1) {
            if (file_exists($file)) {
                header('Content-Type: application/octet-stream');
                header("Content-Transfer-Encoding: 7BIT");
                header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
                readfile($file);
            }
        } else {
            echo "You are not authorized to be on this page";
        }
    }
}
?>