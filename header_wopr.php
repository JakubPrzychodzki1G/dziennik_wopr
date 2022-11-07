
<!DOCTYPE html><html class="menu">
<html>

<head>

<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="google" value="notranslate"/>

<link rel="stylesheet" type="text/css" href="css/header-style.css">
<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0\css\font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/bootstrap.bundle.min.js"></script>
<?php 
require_once "funkcje_wopr.php";

if(isset($_SESSION["ID_USER"])===false){
    header("location: ../login-form-15/index_wopr.php?error=nieladniegagatku");
}

?>

 



</head>
<body>
<div class="navbar-1 text-secondary" >
    
        <ul>
            <li>
                <a class="text-secondary" href="/login-form-15/includes/logout_i.php">
                    <i class="fa fa-2x fa-sign-out"></i>    
                </a>
            </li>
            <li>
                <span class="nav-text"><?php echo $_SESSION["IMIE"]." ".$_SESSION["NAZWISKO"] ?></span><br>
                <span class="nav-text"><?php echo $_SESSION["RANGA"] ?></span>
            </li>
        </ul>
        <i class="fa fa-3x fa-user"></i>
</div>

<nav class="main-menu">

    <div class="scrollbar" id="style-1">      
        <ul>
            <li>                                   
                <a href="/login-form-15/main_wopr.php">
                <i class="fa fax fa-home fa-lg"></i>
                <span class="nav-text">Mapy</span>
                </a>
            </li>   

            <li class="darkerlishadow">
                <a href="/login-form-15/lista_wopr.php">
                <i class="fa fax fa-list-ul fa-lg"></i>
                <span class="nav-text">Lista oddziałów</span>
                </a>
            </li>
    
            <li class="darkerli">
                <a href="/login-form-15/akcje_wopr.php">
                <i class="fa fax fa-book fa-lg"></i>
                <span class="nav-text">Dziennik</span>
                </a>
            </li>
    
            <li class="darkerli">
                <a href="/login-form-15/stats_wopr.php">
                <i class="fa fax fa-database"></i>
                <span class="nav-text">Statystyki</span>
                </a>
            </li>
    
            <li class="darkerli">
                <a href="/login-form-15/settings_wopr.php">
                <i class="fa fax fa-cogs fa-lg"></i>
                <span class="nav-text">Ustawienia</span>
                </a>
            </li>

        </ul>
        <ul class="logout">
            <li>
                <a href="/login-form-15/includes/logout_i.php">
                <i class="fa fax fa-lightbulb-o fa-lg"></i>
                <span class="nav-text">
                    Wyloguj się 
                </span>            
                </a>
            </li>  
        </ul>
    </div>
</nav>
        
<script>

function getCookie(cname) {
  var cookies = ` ${document.cookie}`.split(";");
  var val = "";
  for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i].split("=");
    if (cookie[0] == ` ${cname}`) {
      return cookie[1];
    }
  }
  return "";
}
document.querySelector(':root').style.setProperty('--primary', getCookie("color1"));
document.querySelector(':root').style.setProperty('--second', getCookie("color2"));
document.querySelector(':root').style.setProperty('--third', getCookie("color3"));
document.querySelector(':root').style.setProperty('--fourth', getCookie("color4"));
document.querySelector(':root').style.setProperty('--fifth', getCookie("color5"));



</script>

			
  
  
</body>
</html>