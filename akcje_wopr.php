<!DOCTYPE html>
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
            require "baza_wopr.php";
            require_once 'funkcje_wopr.php';
            include "./classes/database_c.php";
            include "./classes/load_ratownicy_c.php";
            include "./classes/load_action_c.php";
            $action_obj = new Action();
            $action = $action_obj->get_all($_SESSION["ID_USER"]);
            $lifeguards_obj = new Lifeguard();
            $lifeguards = $lifeguards_obj->get_oddzial($_SESSION["ID_ODDZIAL"]);
        ?>
        
        <div class="main-container1">
            <div class="cards_akcje">
                <div class="card_akcje card-add">
                    <a class="btn shadow-none float-end" data-bs-toggle="modal" href="#modal1" data-target="#modal1" data-toggle="modal">
                    <div class="card__icon1"><p>Dodaj akcje</p></div>
                    <div class="card__add1"><i style="font-size: 1500%;" class="fa fa-plus fa-lg"></i></div>
                    </a>
                </div>
                <?php for($j = 0 ; $j < count($action); $j++){?>
                <div class="card_akcje card-1">
                    <div class="card__exit1">
                    <button class="btn btn-danger" data-bs-toggle="modal" href="#modal2<?php echo $j?>" data-target="#modal2<?php echo $j?>" data-toggle="modal"><i class="fa fa-close"></i></button>    
                    </div>
                    <div class="card__icon1"><p><?php echo 'id akcji: '.$action[$j]["id"]; ?></p></div>
                    <h2 class="card__title1"><?php echo 'co sie dzialo w akcji: '.$action[$j]["injury_type"]; ?></h2>
                    <div class="card_addons1"><h2 class="card__title1">Uczestnicy:</h2>
                    <?php
                    for($l = 0; $l<count($lifeguards);$l++){
                        for($k = 1; $k<=10; $k++){
                            if($action[$j]["ratownik".strval($k)]===NULL)
                                continue;
                            if($action[$j]["ratownik".strval($k)]==$lifeguards[$l]["id"]){
                                echo $lifeguards[$l]["imie"]. " " .$lifeguards[$l]["nazwisko"]." ";
                            }
                            
                        }
                    }
                    ?>
                    </div>
                    <p class="card__apply1">
                    <a class="card__link1" href="/login-form-15/pojedyncza_akcja.php?akcja=<?php echo $action[$j]["id"] ?>">Wejdź w akcję <i class="fa fa-arrow-right"></i></a>
                    </p>
                </div>
                <div class="modal" id="modal2<?php echo $j?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Czy napewno chcesz usunąć tą akcję?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex">
                                <button type="button" class="btn btn-secondary w-50" data-bs-dismiss="modal">Nie</button>
                                <form action="dodaj_akcje.php?id=<?php echo $action[$j]["id"]; ?>" method="post" class="w-50">
                                    <button type="submit" id="btnDelete" name="btnDelete" class="btn btn-primary w-100">Tak</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>    
                <?php } ?>
            </div>
        </div>
                        <div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="color:white;">
                                    <div class="modal-header" style="background-color:#e23e3e; border:1%; border-color:#e23e3e; margin-right:0;">
                                        <h5 class="modal-title" id="exampleModalLabel">Dodaj akcję</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="dodaj_akcje.php" method="post">
                                        <div class="modal-body">
                                                    <div class="card-body">
                                                        <div class="row ">
                                                            <label class="bg-danger rounded" for="input_group_add" style="padding:2px; font-size: 120%;"> Informacje o poszkodowanym </label>
                                                            <div class="input-group border border-danger rounded" id="input_group_add">
                                                                <div class= "col-sm-4">
                                                                    <label style="color: black;" for="victim_name">Imię i nazwisko</label>
                                                                    <input type="text" style = "margin:0;" class="form-control" name="victim_name">
                                                                </div>
                                                                <div class = "col-sm-4">
                                                                    <label style="color: black;" for="victim_birth">Data urodzenia</label>
                                                                    <input type="date" style = "margin:0;" class="form-control" name="victim_birth">
                                                                </div>
                                                                <div class = "col-sm-4">
                                                                    <label style="color: black;" for="victim_adress">Adres</label>
                                                                    <input type="text" style = "margin:0;" class="form-control" name="victim_adress">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        <label class="bg-danger rounded" for="input_row_add" style="padding:2px; font-size: 120%;"> Informacje o akcji </label>
                                                        <div class="col-sm-12 border border-danger rounded" id="input_row_add">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label style="color: black;" for="action_start">Rozpoczęcie akcji</label>
                                                                        <input class="form-control" style = "margin:0;" type="datetime-local" name="action_start"> </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label style="color: black;" for="action_end">Koniec akcji</label>
                                                                        <input class="form-control" style = "margin:0;" type="datetime-local" name="action_end"> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="input-group"> <textarea class="form-control" name="injury_type" style="height:30%" rows="4" cols="80" type="text" placeholder="Rodzaj doznanego urazu/zachorowania lub sytuacji wymagającej udzielenia pomocy"></textarea> </div>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="input-group"> <textarea class="form-control" name="help_type" style="height:30%" rows="4" cols="80" type="text" placeholder="Rodzaj udzielonej pomocy"></textarea> </div>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12-sm">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="Miejsce zdarzenia" name="event_place">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="input_group_hospital" style="color: black; margin: 0;">Czas i miejsce przekazania jednostce PRM lub innym</label>
                                                                <div class="input-group" id="input_group_hospital" style="margin: 0;">
                                                                    <div class="col-sm-4">
                                                                        <input type="datetime-local" class="form-control" name="trans_time">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="Miejsce przekazania" name="trans_place">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="Jednostka" name="trans_id">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="input-group"  id="adding_new_lifeguard">
                                                                    <div class="col-sm-4">
                                                                        <div class="input-group mt-3">
                                                                            <select class="select" style="width:70%;" name="lifeguard_action" id="inputGroupSelect">
                                                                                <option selected>Ratownicy</option>
                                                                                <?php 
    
                                                                                    for($i = 0 ; $i < count($lifeguards); $i++){?>
                                                                                        <option value=<?php echo '"'.$lifeguards[$i]["id"].'"'; ?>><?php echo $lifeguards[$i]["imie"]. " " .$lifeguards[$i]["nazwisko"];?></option>
                                                                                    <?php
                                                                                    }?>
                                                                            </select>
                                                                            <div class="input-group-append" style="width:30%;">
                                                                                <button class="btn btn-outline-secondary" id="add_button" type="button"><i class="fa fa-plus fa-lg"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                   </div>
                                                
                                        </div>
                                    
                                        <div class="modal-footer">
                                        
                                        <button class="btn" style="width:100%; color:white; background-color:rgb(38, 172, 239)" name="submit" id="submit" type="submit">Dodaj</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
        <script>
            let i = 0;
            document.getElementById("add_button").addEventListener("click",function(){
                let box = document.getElementById("adding_new_lifeguard");
                var div_col = document.createElement("div");
                var div_input = document.createElement("div");
                var div_col_8 = document.createElement("div");
                var div_col_4 = document.createElement("div");
                var input = document.createElement("input");
                var buttonRemove = document.createElement("button");
                var icon = document.createElement("i");
                var hidden_input = document.createElement("input")
                div_col.setAttribute("class", "col-sm-4");
                box.appendChild(div_col);
                icon.setAttribute("class", "fa fa-minus fa-lg");
                div_col_8.setAttribute("class", "col-sm-8");
                div_col_4.setAttribute("class", "col-sm-4");
                let option = $("#inputGroupSelect :selected").text();
                let option_value = $("#inputGroupSelect :selected").val();
                i=i+1;
                Object.assign(hidden_input, {
                    
                    type: "hidden",
                    value: option_value,
                    name: "1[]"
                })
                Object.assign(input, {
                    className:"form-control border border-danger",
                    value: option,
                    disabled: true,
                })
                div_input.setAttribute("class","input-group");
                Object.assign(buttonRemove,{
                    text: '',
                    className: "form-control border border-danger btn btn-outline-danger",
                    type: "button",
                })
                div_col.appendChild(div_input);
                div_input.appendChild(div_col_8);
                div_input.appendChild(div_col_4);
                div_col_8.appendChild(input);
                div_col_8.appendChild(hidden_input);
                div_col_4.appendChild(buttonRemove);
                buttonRemove.appendChild(icon);
                buttonRemove.onclick = function(){
                    box.removeChild(div_col);
                }

            });
        </script>
    </body>
</html>