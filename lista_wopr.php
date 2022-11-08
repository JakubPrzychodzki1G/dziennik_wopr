<?php session_start(); 
check($_SESSION["ID_USER"])?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style-lista.css">
        
    </head>
    <body>
        <?php
            include "header_wopr.php";
            require_once "funkcje_wopr.php";
            include "./classes/database_c.php";
            include "./classes/load_ratownicy_c.php";
            include "./classes/load_oddzial_c.php";
            $lifeguards_obj = new Lifeguard();
            $oddzial_obj = new Oddzial();
        ?>
        
            <div class="container" style="padding-top:80px;">
                <ul class="responsive-table">
                    <li class="table-header">
                        <div class="col col-1">ID</div>
                        <div class="col col-2">Nazwa</div>
                        <div class="col col-3">Lokalizacja</div>
                        <div class="col col-4">Kierownik</div>
                        <div class="col col-5">Skład</div>
                    </li>
                        <?php
                        $oddzialy = $oddzial_obj->get_all();
                        $number_of_oddzialy = count($oddzialy);
                        $i=0;
                        for( $i = 0; $i<$number_of_oddzialy; $i++)
                        {
                        ?>
                            <li class="table-row collapsible">
                                <div class="col col-1" data-label="id"><?php echo $oddzialy[$i]["id"]; ?></div>
                                <div class="col col-2" data-label="nazwa"><?php echo $oddzialy[$i]["nazwa"]; ?></div>
                                <div class="col col-3" data-label="lokalizacja"><?php echo $oddzialy[$i]["lokalizacja"]; ?></div>
                                <div class="col col-4" data-label="kierownik"><?php echo $oddzialy[$i]["kierownik"]; ?></div>
                                <div class="col col-5" data-label="sklad">Kliknij, by zobaczyć skład</div>
                            </li>
                            <div id="zamkniencie" style="display:none;">
                            <?php
                            $lifeguards = $lifeguards_obj->get_all();
                            
                            //echo $oddzialy[$i+1];
                            $number_of_lifeguards = count($lifeguards);
                            for( $j = 0; $j<$number_of_lifeguards; $j++){
                                //echo $lifeguards[$j+5].' == '.$oddzialy[$i];
                                if($lifeguards[$j]["oddzial_id"] == $oddzialy[$i]["id"]){
                                    
                                    echo '<div class="table-under" style="display:block;">
                                        <div class="ratownik-list">
                                            <div class="col col-1" data-label="id">'.$lifeguards[$j]["id"].'</div>
                                            <div class="col col-2" data-label="imie">'.$lifeguards[$j]["imie"].'</div>
                                            <div class="col col-3" data-label="nazwisko">'.$lifeguards[$j]["nazwisko"].'</div>
                                            <div class="col col-4" data-label="ranga">'.$lifeguards[$j]["ranga"].'</div>
                                            <div class="col col-5" data-label="akcje">'.$lifeguards[$j]["akcje"].'</div>
                                            
                                        </div>
                                    </div>';
                                    
                                }
                            }
    
                            ?>
                            </div>
                            <?php
                        }
                        ?>
                </ul>
            </div>
    </body>
    <script>
            var coll = document.getElementsByClassName("collapsible");
            for (var i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                    content.style.display = "none";
                    } 
                    else {
                    content.style.display = "block";
                    }
                });
            }
        </script>
</html>