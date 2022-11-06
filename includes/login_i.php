<?php


if(isset($_POST["submit"]))
{

    $id_user = $_POST["login_"];
    $password = $_POST["haslo_"];

    include "../classes/database_c.php";
    include "../classes/login_c.php";
    include "../classes/login_ctr_c.php";
    $login = new Login_ctr($id_user, $password);

    $login->login_user();

    header("location: ../main_wopr.php?error=none");

}else {
    header("location: ../index.php?error=nothing_happens");
}