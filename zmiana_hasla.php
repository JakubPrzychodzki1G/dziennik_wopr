<?php
session_start();
require_once "funkcje_wopr.php";
require "baza_wopr.php";
$new_password=$_POST["passwordField3"];
$check_password=$_POST["passwordField2"];
$old_password=$_POST["passwordField1"];
$info_konto = zajety($conn,$_SESSION["ID_USER"]);
if($new_password == $check_password){
    if(password_verify($old_password,$info_konto["haslo"])){
        edit_haslo($conn,$_SESSION["ID_USER"],password_hash($new_password,PASSWORD_DEFAULT));
    }
    else{
        echo "Stare hasło nie zgadza się";
    }
}
else
{
    echo "Hasła nie zgadzają się ze sobą";
}
?>