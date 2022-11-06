<?php

class Oddzial extends database{


    public function get_all()
    {

        $stmt = $this->connect()->prepare("SELECT id, nazwa, pos_x, pos_y, lokalizacja, kierownik, img_id FROM action_note WHERE widoczny=1;");
        if(!$stmt->execute()){

            $stmt = null;
            exit();

        }
        $array_all=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array_all;

    }

    public function get_one($id)
    {

        $stmt = $this->connect()->prepare("SELECT id, nazwa, pos_x, pos_y, lokalizacja, kierownik, img_id FROM action_note WHERE widoczny=1 AND id=?");
        if(!$stmt->execute(array($id))){

            $stmt=null;
            exit();

        }
        $array_oddzial = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;
        return $array_one;

    }



}