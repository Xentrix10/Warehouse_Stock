<?php
session_start();

if(isset($_SESSION['loggedin']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "shop" )){

    //unsetting all session variables
    $_SESSION = array();
    //destroying session
    session_destroy();
    //redirecting to entry page
    header('Location: entry.html');
}else{
    session_destroy();
    header('Location: index.html');
}

?>