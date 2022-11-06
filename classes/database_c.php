<?php

class database {

    protected function connect(){
        try {
            $username = "root";
            $password = "ten";
            $database = new PDO('mysql:host=localhost;dbname=wopr_dziennik',$username, $password);
            return $database;
        } catch (PDOException $e) {
            print "Error!:".$e->getMessage()."<br>";
            die();
        }
    }

}