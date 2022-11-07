<?php
session_start();

include "./classes/database_c.php";
include "./classes/load_action_c.php";

if(isset($_POST["submit"]))
{
    $victim_name = $_POST["victim_name"];
    $victim_birth = $_POST["victim_birth"];
    $victim_adress = $_POST["victim_adress"];
    $action_start = $_POST["action_start"];
    $action_end = $_POST["action_end"];
    $injury_type = $_POST["injury_type"];
    $help_type = $_POST["help_type"];
    $event_place = $_POST["event_place"];
    $trans_time = $_POST["trans_time"];
    $trans_place = $_POST["trans_place"];
    $trans_id = $_POST["trans_id"];
    //$lifeguard_action = $_POST["lifeguard_action"];
    $lifeguard_squad = $_SESSION["ID_ODDZIAL"];
    $lifeguards = $_POST["1"];
    //$i=0;
    //$j=0;
    //echo $dupa;
    /*foreach($_POST["1"] as $item)
    {

        array_push($lifeguards, $item);
        echo $item;
        //echo " / " .$value;
        echo " / " .$lifeguards[$j];
        $j++;

    }*/
    require_once "funkcje_wopr.php";
    $action_obj = new Action();
    $action_obj->add($lifeguard_squad, $victim_name, $victim_birth, $victim_adress, $action_start, $action_end, $injury_type, $help_type, $event_place, $trans_time, $trans_place, $trans_id, $lifeguards);
    
}
elseif(isset($_POST["btnDelete"]))
{
    $id=$_GET["id"];
    $id_user = $_SESSION["ID_USER"];
    require_once "funkcje_wopr.php";
    $action_obj = new Action();
    $action_obj->delete($id, $id_user);
}

?>