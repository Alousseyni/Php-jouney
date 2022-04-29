<?php 
    function est_connecter():bool
    {
        if (session_start()==PHP_SESSION_NONE) {
           session_start();
        }
        return !empty($_SESSION['connecte']);
    }

    function forcer_a_se_connecter(){
            if (!est_connecter()) {
               session_start();
              header('Location: /login.php');
              exit();
            }
    }
?>