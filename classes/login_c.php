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

            session_start();
            $_SESSION["ID"]=$user[0]["id"];
            $_SESSION["LOGIN"]=$user[0]["login"];

            $stmt = null;
            
        }

        $stmt = null;
    }


}