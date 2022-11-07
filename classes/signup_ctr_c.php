<?php

class Signup_ctr extends Signup{


    private $login;
    private $password;
    private $password_re;
    private $imie;
    private $nazwisko;
    public function __construct($login, $imie, $nazwisko, $password, $password_re){
        
        $this->login = $login;
        $this->password = $password;
        $this->password_re = $password_re;
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;

    }

    public function signup_user()
    {
        if ($this->empty()===false) {
            header("location: ../index_wopr.php?error=emptyinput");
            exit();
        }
        if ($this->wrong_char()===false) {
            header("location: ../index_wopr.php?error=wrong_char");
            exit();
        }
        if ($this->password_same()===false) {
            header("location: ../index_wopr.php?error=password_same");
            exit();
        }
        if ($this->login_email_taken()===false) {
            header("location: ../index_wopr.php?error=login_email_taken");
            exit();
        }

        $this->set_user($this->imie, $this->nazwisko, $this->login, $this->password);

    }

    private function empty(){
        $result;
        if(empty($this->login)||empty($this->imie)||empty($this->nazwisko)||empty($this->password)||empty($this->password_re)){
            $result=false;
        }
        else{
            $result=true;
        }
        return $result;
    }

    private function wrong_char(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->login)){
            $result=false;
        }
        else{
            $result=true;
        }
        return $result;
    }

    private function password_same(){
        $result;
        if($this->password !== $this->password_re){
            $result=false;
        }
        else{
            $result=true;
        }
        return $result;
    }

    private function login_email_taken(){
        $result;
        if($this->no_user($this->login)){
            $result=true;
        }
        else{
            $result=false;
        }
        return $result;
    }

}