<?php
        require_once "baza_wopr.php";
        require_once "funkcje_wopr.php";
        $oddzial=load_oddzial($conn);
        //for($i=0;$i<count($oddzial);$i++){
            echo json_encode($oddzial);
        //}
    
?>