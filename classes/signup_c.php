<?php

declare(strict_types=1);

class Signup extends database{

    protected function set_user($name, $surname, $login, $password):void 
    {
        $stmt = $this->connect()->prepare("INSERT INTO users (imie, nazwisko, login, haslo, poziom_dostepu) VALUES (?, ?, ?, ?, ?);");
        $stmt2 = $this->connect()->prepare("INSERT INTO ratownicy (imie, nazwisko, ranga, oddzial_id) VALUES (?, ?, ?, ?);"); 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($name, $surname, $login, $hashed_password, 10))) {
            $stmt = null;
            header("location: ../index_wopr.php?error=stmtfailed");
            exit();
        }
        if (!$stmt2->execute(array($name, $surname, "Ratownik WOPR", 3))) {
            $stmt = null;
            header("location: ../index_wopr.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function no_user($login){
        $stmt = $this->connect()->prepare("SELECT login FROM users WHERE login = ?;");
    
        if (!$stmt->execute(array($login))) {
            $stmt = null;
            header("location: ../index_wopr.php?error=stmtfailed");
        }
        $result;
        if ($stmt->rowCount()>0) {
            $result = false;
        }
        else {
            $result=true;
        }
        return $result;
    }

}