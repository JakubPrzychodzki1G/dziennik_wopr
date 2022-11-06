<?php



$conn = mysqli_connect('localhost','root','ten','wopr_dziennik');
if($conn->connect_error)
{
    die("nie ma bazy danyh". mysqli_connect_error());
}



?>