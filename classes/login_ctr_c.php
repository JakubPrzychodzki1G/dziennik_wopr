<?php
class Login_ctr extends Login{


    private $id;
    private $password;
    public function __construct($id, $password){
        
        $this->id = $id;
        $this->password = $password;

    }

    public function login_user(){
        if ($this->empty()===false) {
            header("location: ../index.php?error=emptyinput");
            exit();
            echo $this->id.":".$this->password.":".$this->password_re.":".$this->email.":";
        }

        $this->get_user($this->id, $this->password);

    }

    private function empty(){
        $result;
        if(empty($this->id)||empty($this->password)){
            $result=false;
        }
        else{
            $result=true;
        }
        return $result;
    }

}