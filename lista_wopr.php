<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style-lista.css">
        
    </head>
    <body>
        <?php
            include "header_wopr.php";
            require "baza_wopr.php";
            require_once "funkcje_wopr.php";
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
                        $oddzialy = load_oddzial($conn,-1);
                        $number_of_oddzialy = count($oddzialy);
                        $i=0;
                        for( $i = 0; $i<$number_of_oddzialy; $i++)
                        {
                        ?>
                            <li class="table-row collapsible">
                                <div class="col col-1" data-label="id"><?php echo $oddzialy[$i]; ?></div>
                                <div class="col col-2" data-label="nazwa"><?php echo $oddzialy[$i+1]; ?></div>
                                <div class="col col-3" data-label="lokalizacja"><?php echo $oddzialy[$i+4]; ?></div>
                                <div class="col col-4" data-label="kierownik"><?php echo $oddzialy[$i+5]; ?></div>
                                
                                <div class="col col-5" data-label="sklad">dsafa</div>
                            </li>
                            <div id="zamkniencie" style="display:none;">
                            <?php
                            $lifeguards = 0;
                            $lifeguards = load_lifeguard($conn, -1 );
                            
                            //echo $oddzialy[$i+1];
                            $number_of_lifeguards = count($lifeguards);
                            for( $j = 0; $j<$number_of_lifeguards; $j++){
                                //echo $lifeguards[$j+5].' == '.$oddzialy[$i];
                                if($lifeguards[$j+5] == $oddzialy[$i]){
                                    
                                    echo '<div class="table-under" style="display:block;">
                                        <div class="ratownik-list">
                                            <div class="col col-1" data-label="id">'.$lifeguards[$j].'</div>
                                            <div class="col col-2" data-label="imie">'.$lifeguards[$j+1].'</div>
                                            <div class="col col-3" data-label="nazwisko">'.$lifeguards[$j+2].'</div>
                                            <div class="col col-4" data-label="ranga">'.$lifeguards[$j+3].'</div>
                                            <div class="col col-5" data-label="akcje">'.$lifeguards[$j+5].'</div>
                                            
                                        </div>
                                    </div>';
                                    
                                }
                                $j=$j+5;
                            }
                            $i=$i+6;
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