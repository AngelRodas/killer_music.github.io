<?php 
    session_start();

    if (isset($_GET["action"]))
    {
        if ($_GET["action"]=="logout")
        {
            $_SESSION = array();
            session_destroy();    

            header("Location: ini.php");
        }
    }
?>