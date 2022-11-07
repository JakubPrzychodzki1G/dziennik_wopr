<?php session_start(); ?>
<html>
    <head>
        
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="css/style-akcje.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0\css\font-awesome.min.css" rel="stylesheet">
        <script src="jquery/jquery-3.6.0.min.js"></script>

    </head>
    <body>
        <?php
            include "header_wopr.php";
            require_once 'funkcje_wopr.php';
            include "./classes/database_c.php";
            include "./classes/load_action_c.php";
            $action1_obj = new Action();
        ?>
        <div class="main-container1">
            <div class="cards_akcje">
                <?php echo 'id akcji: '.$_GET["akcja"]; 
                $action1=$action1_obj->get_one($_SESSION["ID_USER"], $_GET["akcja"]);?>
                <form action="edit_action.php" method="post">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress" value="<?php echo $action1[0]["id"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress1" value="<?php echo $action1[0]["data_dodania"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress2" value="<?php echo $action1[0]["victim_name"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress3" value="<?php echo $action1[0]["victim_birth"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress4" value="<?php echo $action1[0]["victim_adress"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress5" value="<?php echo $action1[0]["action_start"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress6" value="<?php echo $action1[0]["action_end"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress7" value="<?php echo $action1[0]["injury_type"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress8" value="<?php echo $action1[0]["help_type"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress9" value="<?php echo $action1[0]["event_place"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress10" value="<?php echo $action1[0]["trans_time"]; ?>">
                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress11" value="<?php echo $action1[0]["trans_place"]; ?>">
                    <button class="btn" style="width:100%; color:white; background-color:rgb(38, 172, 239)" name="submit" id="submit" type="submit">edytuj</button>
                </form>
                <?php echo $action1[0]["ratownik1"]; ?>
                <?php echo $action1[0]["ratownik2"]; ?>
                <?php echo $action1[0]["ratownik3"]; ?>
                <?php echo $action1[0]["ratownik4"]; ?>
                <?php echo $action1[0]["ratownik5"]; ?>
                
            </div>
        </div>
    </body>
</html>