<?php

if(isset($_POST["submit"]))
{

    $id_user = $_POST["login_sign"];
    $imie = $_POST["imie_sign"];
    $nazwisko = $_POST["nazwisko_sign"];
    $password = $_POST["haslo_sign"];
    $password_re = $_POST["haslo_re"];

    include "../classes/database_c.php";
    include "../classes/signup_c.php";
    include "../classes/signup_ctr_c.php";
    $signup = new Signup_ctr($id_user, $imie, $nazwisko, $password, $password_re);

    $signup->signup_user();

    header("location: ../index_wopr.php?error=none");

}else {
    header("location: ../index_wopr.php?error=nothing_happens");
}

