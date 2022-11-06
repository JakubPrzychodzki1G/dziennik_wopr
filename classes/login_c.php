<?php

declare(strict_types=1);

class Login extends database{

    protected function get_user($login,$password):void 
    {
        $stmt = $this->connect()->prepare("SELECT haslo FROM users WHERE login = ?;");
    
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($login))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        if ($stmt->rowCount()==0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $hashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $check = password_verify($password, $hashed[0]["haslo"]);

        if (!$check) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif($check){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE login = ?;');
            
            if (!$stmt->execute(array($login))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount()==0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt1 = $this->connect()->prepare("SELECT oddzial_id, ranga FROM ratownicy WHERE id = ?");
            if (!$stmt1->execute(array($user[0]["id"]))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            $user_info = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["LOGIN"]=$user[0]["login"];
            $_SESSION["ID_USER"]=$user[0]["id"];
            $_SESSION["POZIOM_DOSTEPU"]=$user[0]["poziom_dostepu"];
            $_SESSION["ID_ODDZIAL"]=$user_info[0]["oddzial_id"];
            $_SESSION["RANGA"]=$user_info[0]["ranga"];
            $_SESSION["IMIE"]=$user[0]["imie"];
            $_SESSION["NAZWISKO"]=$user[0]["nazwisko"];
            $_SESSION["HASLO"]=$user[0]["haslo"];

            $stmt = null;
            
        }

        $stmt = null;
    }


}