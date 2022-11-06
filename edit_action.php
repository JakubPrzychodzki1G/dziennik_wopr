<?php
session_start();
if(isset($_POST["submit"]))
{
    $id = $_POST["victim_adress"];
    $victim_name = $_POST["victim_adress2"];
    $victim_birth = $_POST["victim_adress3"];
    $victim_adress = $_POST["victim_adress4"];
    $action_start = $_POST["victim_adress5"];
    $action_end = $_POST["victim_adress6"];
    $injury_type = $_POST["victim_adress7"];
    $help_type = $_POST["victim_adress8"];
    $event_place = $_POST["victim_adress9"];
    $trans_time = $_POST["victim_adress10"];
    $trans_place = $_POST["victim_adress11"];
    require_once "baza_wopr.php";
    require_once "funkcje_wopr.php";
    edit_action($conn, $id, $victim_name, $victim_birth, $victim_adress, $action_start, $action_end, $injury_type, $help_type, $event_place, $trans_time, $trans_place );
}