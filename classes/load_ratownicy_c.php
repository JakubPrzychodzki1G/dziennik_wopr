<?php 

class Lifeguard extends database{


    public function get_all()
    {

        $stmt = $this->connect()->prepare("SELECT * FROM ratownicy;");
        if(!$stmt->execute()){

            $stmt = null;
            exit();

        }
        $array_all=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array_all;

    }

    public function get_oddzial($id)
    {

        $stmt = $this->connect()->prepare("SELECT * FROM ratownicy WHERE oddzial_id = ?");
        if(!$stmt->execute(array($id))){

            $stmt=null;
            exit();

        }
        $array_oddzial = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;
        return $array_oddzial;

    }



}