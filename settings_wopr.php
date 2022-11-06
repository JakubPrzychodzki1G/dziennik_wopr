<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <?php
            require_once "funkcje_wopr.php";
            require "baza_wopr.php";
        ?>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="css/style-akcje.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0\css\font-awesome.min.css" rel="stylesheet">
        <script src="jquery/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <?php
            include "header_wopr.php";
            $info_ratownik=load_lifeguard($conn, $_SESSION["ID_USER"]);
            $info_konto = zajety($conn, $_SESSION["ID_USER"]);
            function gender($name){
                if(substr($name,strlen($name))!=="a"){
                    return "Mężczyzna";
                }
                else{
                    return "Kobieta";
                }
            }

        ?>
        
        <div class = "main-container1 min-vh-100">
            <div class = "cards_akcje col-12">
                <div class="row border-0 rounded-0" style="width:60%;">
                    <div class="col-12 bg-white p-5">
                        <div class="col-12 ml-3">
                            <div class="row p-2">
                                <header>
                                    <h2>Podstawowe Informacje</h2>
                                </header>
                            </div>
                            <div class="row p-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Imię i Nazwisko</span>
                                    <input disabled type="text" class="form-control mt-0" value="<?php echo $info_ratownik[1]." ".$info_ratownik[2];?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Ranga</span>
                                    <input disabled type="text" class="form-control mt-0" value="<?php echo $info_ratownik[3] ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Płęć</span>
                                    <input disabled type="text" class="form-control mt-0" value="<?php echo gender($info_ratownik[1]); ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-0 rounded-0 mt-4" style="width:60%;">
                    <div class="col-12 bg-white p-5">
                        <div class="col-12 ml-3">
                            <div class="row p-2">
                                <header>
                                    <h2>Informacje o Koncie</h2>
                                </header>
                            </div>
                            <div class="row p-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">E-mail</span>
                                    <input disabled type="text" class="form-control mt-0" value="<?php echo $info_konto["login"]."@gmail.com"; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Login</span>
                                    <input disabled type="text" class="form-control mt-0" value="<?php echo $info_konto["login"]; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Telefon</span>
                                    <input disabled type="text" class="form-control mt-0" value="868999000" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4" style="width:60%; justify-content: space-between;">
                    <div class = "col-lg-6 col-md-12 ps-0" id="col1">
                        <div class = "col-12 bg-white p-3">
                                <div class="col-12 p-4">
                                    <div class="row p-2">
                                        <header>
                                            <h5>Zmień hasło</h5>
                                        </header>
                                    </div>
                                    <form action="zmiana_hasla.php" method="post">
                                        <div class="row p-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Stare hasło</span>
                                                <input type="password" id="passwordField1" class="form-control mt-0" aria-label="Username" aria-describedby="basic-addon1">
                                                <span class="input-group-text bg-white p-1 "><span onclick="znikanieGwiazdek('span1','passwordField1')" id="span1" class="fa fa-fw fa-eye password-toogle"></span></span>
                                            </div>
                                        </div>
                                        <div class="row p-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Nowe hasło</span>
                                                <input type="password" id="passwordField2" class="form-control mt-0" aria-label="Username" aria-describedby="basic-addon1">
                                                <span class="input-group-text bg-white p-1 "><span onclick="znikanieGwiazdek('span2','passwordField2')" id="span2" class="fa fa-fw fa-eye password-toogle"></span></span>
                                            </div>
                                        </div>
                                        <div class="row p-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Potwierdź hasło</span>
                                                <input type="password" id="passwordField3" class="form-control mt-0" aria-label="Username" aria-describedby="basic-addon1">
                                                <span class="input-group-text bg-white p-1 "><span onclick="znikanieGwiazdek('span3','passwordField3')" id="span3" class="fa fa-fw fa-eye password-toogle"></span></span>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary ms-1" type="button" id="submit">Zmień hasło</button>
                                    </form>
                                </div>
                            </div>
                    </div>
                    <div class = "col-lg-6 col-md-12 pe-0" id="col2">
                        <div class = "col-12 bg-white p-3">
                                <div class="col-12 p-4">
                                    <div class="row p-2">
                                        <header>
                                            <h5>Ustawienia Aplikacji</h5>
                                        </header>
                                    </div>
                                    <div class="row p-1">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text rounded-3" id="basic-addon1">Kolor</span>
                                            <button id="color1" class="btn btn-primary p-4 rounded-3 ms-2"></button>
                                            <button id="color2" class="btn btn-success p-4 rounded-3 ms-2"></button>
                                            <button id="color3" class="btn btn-danger p-4 rounded-3 ms-2"></button>

                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">E-mail</span>
                                            <input type="text" class="form-control mt-0" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">E-mail</span>
                                            <input type="text" class="form-control mt-0" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function znikanieGwiazdek(id,id2){
                    document.getElementById(id).classList.toggle("fa-eye-slash");
                    if(document.getElementById(id2).type==="password"){
                        document.getElementById(id2).type = "text";
                    }
                    else{
                        document.getElementById(id2).type = "password";
                    }
            }
            
            document.getElementById("submit").addEventListener("click",function(){
                var val1 = document.getElementById("passwordField1").value;
                var val2 = document.getElementById("passwordField2").value;
                var val3 = document.getElementById("passwordField3").value;
                alert(val1);
                $.ajax({
                    url:"zmiana_hasla.php",
                    type:"post",
                    data:{
                        passwordField1:val1,
                        passwordField2:val2,
                        passwordField3:val3,
                    },
                    success: function(data) {
                        alert(data);
                        if(data==="Zmieniono hasło")
                            document.getElementById("passwordField1").value="";
                            document.getElementById("passwordField2").value="";
                            document.getElementById("passwordField3").value="";
                    },
                    error: function(){
                        alert("nie udalo się")
                    }
                });
            });
            function color_change(color1,color2,color3,color4,color5){
                document.cookie = "color1 = "+color1+";";
                document.cookie = "color2 = "+color2+";";
                document.cookie = "color3 = "+color3+";";
                document.cookie = "color4 = "+color4+";";
                document.cookie = "color5 = "+color5+";";
                document.querySelector(':root').style.setProperty('--primary',color1);
                document.querySelector(':root').style.setProperty('--second',color2);
                document.querySelector(':root').style.setProperty('--third',color3);
                document.querySelector(':root').style.setProperty('--fourth',color4);
                document.querySelector(':root').style.setProperty('--fifth',color5);

            }
            document.getElementById("color1").addEventListener("click",function(){
                color_change("rgb(38, 172, 239)","rgb(38, 172, 239)","rgb(38, 172, 239)","rgb(38, 172, 239)","rgb(38, 172, 239)");
            });
            document.getElementById("color2").addEventListener("click",function(){
                color_change("#198754","#198754","#198754","#198754","#198754");
            });
            document.getElementById("color3").addEventListener("click",function(){
                color_change("#dc3545","#dc3545","#dc3545","#dc3545","#dc3545");
            });
        </script>
    </body>
</html>