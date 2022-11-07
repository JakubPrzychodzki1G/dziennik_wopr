<?php

class Action extends database{


    public function get_all($id)
    {

        $stmt = $this->connect()->query("SELECT * FROM akcje WHERE widoczne = 1 AND ( ratownik1 = $id OR ratownik2 = $id OR ratownik3 = $id OR ratownik4 = $id OR ratownik5 = $id OR ratownik6 = $id OR ratownik7 = $id OR ratownik8 = $id OR ratownik9 = $id OR ratownik10 = $id);");
        $array_all=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $number_of_rows = $stmt->fetchColumn();
        if($number_of_rows>0){
            $stmt = null;
            exit();
        }
        $stmt = null;
        return $array_all;

    }

    public function get_top_7($id)
    {

        $stmt = $this->connect()->query("SELECT * FROM akcje WHERE widoczne = 1 AND ( ratownik1 = $id OR ratownik2 = $id OR ratownik3 = $id OR ratownik4 = $id OR ratownik5 = $id OR ratownik6 = $id OR ratownik7 = $id OR ratownik8 = $id OR ratownik9 = $id OR ratownik10 = $id) ORDER BY data_dodania DESC LIMIT 7;");
        $array_top_7=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $number_of_rows = $stmt->fetchColumn();
        if($number_of_rows>0){
            $stmt = null;
            exit();
        }
        $stmt = null;
        return $array_top_7;

    }

    public function count_urazy($id)
    {

        $stmt = $this->connect()->query("SELECT injury_type, COUNT(id) AS ilosc FROM akcje WHERE widoczne = 1 AND ( ratownik1 = $id OR ratownik2 = $id OR ratownik3 = $id OR ratownik4 = $id OR ratownik5 = $id OR ratownik6 = $id OR ratownik7 = $id OR ratownik8 = $id OR ratownik9 = $id OR ratownik10 = $id) GROUP BY injury_type;");
        $array_count=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $number_of_rows = $stmt->fetchColumn();
        if($number_of_rows>0){
            $stmt = null;
            exit();
        }
        $stmt = null;
        return $array_count;

    }

    public function get_one($id,$id2)
    {

        $stmt = $this->connect()->query("SELECT * FROM akcje WHERE id = $id2 AND widoczne = 1 AND (ratownik1 = $id OR ratownik2 = $id OR ratownik3 = $id OR ratownik4 = $id OR ratownik5 = $id OR ratownik6 = $id OR ratownik7 = $id OR ratownik8 = $id OR ratownik9 = $id OR ratownik10 = $id);");
        $array_one = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $number_of_rows = $stmt->fetchColumn();
        if($number_of_rows>0){
            $stmt = null;
            exit();
        }
        $stmt = null;
        return $array_one;

    }

    public function add($lifeguard_squad, $victim_name, $victim_birth, $victim_adress, $action_start, $action_end, $injury_type, $help_type, $event_place, $trans_time, $trans_place, $trans_id, $lifeguard_action)
    {

        $stmt = $this->connect()->prepare("INSERT INTO akcje(data_dodania, id_oddzialu, victim_name, victim_birth, victim_adress, action_start, action_end, injury_type, help_type, event_place, trans_time, trans_place, trans_id, ratownik1, ratownik2, ratownik3, ratownik4, ratownik5, ratownik6, ratownik7, ratownik8, ratownik9, ratownik10) VALUES ( NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if(!$stmt->execute(array($lifeguard_squad, $victim_name, $victim_birth, $victim_adress, $action_start, $action_end, $injury_type, $help_type, $event_place, $trans_time, $trans_place, $trans_id, $lifeguard_action[0], $lifeguard_action[1], $lifeguard_action[2], $lifeguard_action[3], $lifeguard_action[4], $lifeguard_action[5], $lifeguard_action[6], $lifeguard_action[7], $lifeguard_action[8], $lifeguard_action[9]))){

            $stmt = null;
            header("location: ../login-form-15/akcje_wopr.php?error=stmtfail");
            exit();

        }
        $stmt = null;
        header("location: ../login-form-15/akcje_wopr.php?error=none");

    }

    public function edit($id, $victim_name, $victim_birth, $victim_adress, $action_start, $action_end, $injury_type, $help_type, $event_place, $trans_time, $trans_place)
    {

        $stmt = $this->connect()->prepare("UPDATE akcje SET victim_name=?, victim_birth=?, victim_adress=?, action_start=?, action_end=?, injury_type=?, help_type=?, event_place=?, trans_time=?, trans_place=? WHERE id = $id;");
        if(!$stmt->execute(array($victim_name, $victim_birth, $victim_adress, $action_start, $action_end, $injury_type, $help_type, $event_place, $trans_time, $trans_place))){
            
            $stmt = null;
            header("location: ../pojedyncza_akcja.php?error=stmtfail");
            exit();

        }
        $stmt = null;
        header("location: ../login-form-15/pojedyncza_akcja.php?akcja=$id");

    }

    public function delete($id, $id_user)
    {

        $stmt = $this->connect()->prepare("UPDATE akcje SET widoczne=? WHERE id = $id AND (ratownik1 = $id_user OR ratownik2 = $id_user OR ratownik3 = $id_user OR ratownik4 = $id_user OR ratownik5 = $id_user OR ratownik6 = $id_user OR ratownik7 = $id_user OR ratownik8 = $id_user OR ratownik9 = $id_user OR ratownik10 = $id_user);");
        if(!$stmt->execute(array(0))){

            $stmt = null;
            header("location: ../login-form-15/akcje_wopr.php?del-ko");
            exit();

        }
        $stmt = null;
        header("location: ../login-form-15/akcje_wopr.php?del-ok");

    }

}
