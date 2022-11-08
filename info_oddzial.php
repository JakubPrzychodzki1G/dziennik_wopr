<?php session_start(); 
check($_SESSION["ID_USER"])?>
<!DOCTYPE html>
<html>
    <head>
        <?php 
            require_once "funkcje_wopr.php";
            include "./classes/database_c.php";
            include "./classes/load_ratownicy_c.php";
            include "./classes/load_oddzial_c.php";
            $ratownicy_obj = new Lifeguard();
            $oddzial_obj = new Oddzial();
            $oddzial = $oddzial_obj->get_one($_GET["oddzial_id"]);
            $ratownicy= $ratownicy_obj->get_oddzial($_GET["oddzial_id"]);
        ?>
    </head>
    <body>
        <?php include "header_wopr.php" ?>
        <div class="row" style="height:100px">
            <div class="col-4">
                1 of 3
            </div>
            <div class="col-4">
                2 of 3
            </div>
            <div class="col-4">
                3 of 3
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <div class="row h-25">
                    <div class="col-12">
                        <div class="row h-50"></div>
                        <div class="row h-50 bg-danger"></div>
                    </div>
                </div>
                <div class="row h-50">
                    <div class="col-12 bg-danger"></div>
                </div>
                <div class="row h-25">
                    <div class="col-12">
                        <div class="row h-50 bg-danger"></div>
                        <div class="row h-50"></div>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="col-6" style="height:500px;">
                        <div class="row bg-white h-75 border border-danger border-5 shadow-2">
                            <div class="col-6">
                                <?php echo "<h5 class='p-4'>".$oddzial[0]["nazwa"]."</h5>
                                <div class='row p-4 text-white'>
                                    <div class='col-12'>
                                        <div class='row p-2 bg-danger shadow'>
                                            <span class=''>Lokalizacja: ".$oddzial[0]["lokalizacja"]."</span>
                                        </div>
                                        <div class='row p-2 bg-danger shadow mt-2'>
                                            <span class=''>Kierownik: ".$oddzial[0]["kierownik"]."</span>
                                        </div>
                                        <div class='row p-2 bg-danger shadow mt-2'>
                                            <span class=''>Liczba ratowników: ".(count($ratownicy))."</span>
                                        </div>
                                    </div>
                                </div>";
                                ?>
                            </div>
                            <div class="col-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Imie</th>
                                            <th scope="col">Nazwisko</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $j=0;
                                        for($i=0;$i<count($ratownicy);$i++){
                                            $j++;
                                            echo "<tr>
                                            <th scope='row'>".$j."</th>
                                                <td>".$ratownicy[$i]["imie"]."</td>
                                                <td>".$ratownicy[$i]["nazwisko"]."</td>
                                            </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row h-25">
                            <div class="col-12">
                                <div class="row h-50 bg-danger"></div>
                                <div class="row h-50"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1" style="height:500px">
                        <div class="row h-25">
                            <div class="col-12">
                                <div class="row h-50"></div>
                                <div class="row h-50 bg-danger"></div>
                            </div>
                        </div>
                        <div class="row h-50">
                            <div class="col-12 bg-danger"></div>
                        </div>
                        <div class="row h-25">
                            <div class="col-12">
                                <div class="row h-50 bg-danger"></div>
                                <div class="row h-50"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 p-0" style="height:500px">
                        <div class="row h-25">
                            <div class="col-12">
                                <div class="row h-50">

                                </div>
                                <div class="row h-50 bg-danger">

                                </div>
                            </div>
                        </div>
                        <div class="row h-75">
                            <img src=<?php echo "images/".$oddzial[0]["img_id"].".jpg"; ?> class="w-100">
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-1">
                <div class="row h-25">
                    <div class="col-12">
                        <div class="row h-50"></div>
                            <div class="row h-50 bg-danger"></div>
                        </div>
                    </div>
                    <div class="row h-50">
                        <div class="col-12 bg-danger"></div>
                    </div>
                    <div class="row h-25">
                        <div class="col-12">
                            <div class="row h-50 bg-danger"></div>
                            <div class="row h-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row h-30">
            <div class="col-4">
                1 of 3
            </div>
            <div class="col-4">
                2 of 3
            </div>
            <div class="col-4">
                3 of 3
            </div>
        </div>


    </body>
</html>