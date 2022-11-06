<?php
session_start();


if(isset($_POST["submit"]))
{
    $login = $_POST["login_"];
    $haslo = $_POST["haslo_"];
    require_once 'baza_wopr.php';
    require_once 'funkcje_wopr.php';


    logowanie($conn, $login, $haslo);

    
}
else{
    header("location: ../login-form-15/index_wopr.php?error=nicsieniedzieje");
    exit();
}
?>