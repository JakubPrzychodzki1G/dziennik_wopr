<?php
function zajety($conn, $login)
{
    $rezultat;
    if(is_numeric($login)==true){
        $sql="SELECT * FROM users WHERE id=?;";
    }
    elseif(is_numeric($login)==true && $login<0){
        $login=$login*-1;
        $sql="SELECT imie, nazwisko FROM users WHERE id=?;";
    }
    else{
        $sql="SELECT * FROM users WHERE login=?;";
    }
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../rejestracja1.php?error=zajetylogin");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$login);
    mysqli_stmt_execute($stmt);

    $rezultat_zbazy = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($rezultat_zbazy)){
        return $row;
    }
    else{
        $rezultat=false;
        return $rezultat;
    }

    mysqli_stmt_close($stmt);
}
function logowanie($conn, $login, $haslo)
{
    $czyjestlogin = zajety($conn, $login);
    $hasloHash = $czyjestlogin["haslo"];
    $sprawdzeniehaslo = password_verify($haslo, $hasloHash);
    
    if($czyjestlogin===false){
        header("location: ../login-form-15/index_wopr.php?error=zle");
        exit();
    }
    if($sprawdzeniehaslo === true)
    {
        session_start();
        $id_user = $czyjestlogin['id'];
        $sql2 = "SELECT oddzial_id, ranga FROM ratownicy WHERE id = $id_user";
        $result2 = mysqli_query($conn, $sql2);
        while($row=mysqli_fetch_assoc($result2))
        {
            $id_squad=$row["oddzial_id"];
            $ranga=$row["ranga"];
        }
        $_SESSION["ID"]= 0;
        $_SESSION["ID_USER"]=$id_user;
        $_SESSION["POZIOM_DOSTEPU"]=$czyjestlogin["poziom_dostepu"];
        $_SESSION["ID_ODDZIAL"]=$id_squad;
        $_SESSION["RANGA"]=$ranga;
        header("location: ../login-form-15/main_wopr.php");
        exit();
    }
    else if($sprawdzeniehaslo === false)
    {
        header("location: ../login-form-15/index_wopr.php?error=zle1");
        exit();
    }

}
function load_oddzial($conn, $id)
{
    if($id==-1){
        $sql = "SELECT id, nazwa, pos_x, pos_y, lokalizacja, kierownik, img_id FROM action_note WHERE widoczny=1;";
    }
    elseif($id > -1){
        $sql = "SELECT id, nazwa, pos_x, pos_y, lokalizacja, kierownik, img_id FROM action_note WHERE widoczny=1 AND id=$id;";
    }
    $result = mysqli_query($conn, $sql);
    $number_of_rows = mysqli_num_rows($result);
    if($number_of_rows > 0)
    {
        $i = 0;
        while($row=mysqli_fetch_assoc($result))
        {
            $array[$i]=$row["id"];
            $i++;
            $array[$i]=$row["nazwa"];
            $i++;
            $array[$i]=$row["pos_x"];
            $i++;
            $array[$i]=$row["pos_y"];
            $i++;
            $array[$i]=$row["lokalizacja"];
            $i++;
            $array[$i]=$row["kierownik"];
            $i++;
            $array[$i]=$row["img_id"];
            $i++;
        }
    }
    return $array;
}
function load_lifeguard($conn, $id)
{
    if($id==-1){
        $sql = "SELECT id, imie, nazwisko, ranga, akcje, oddzial_id FROM ratownicy ;";
    }
    else{
        $sql = "SELECT id, imie, nazwisko, ranga, akcje, oddzial_id FROM ratownicy WHERE oddzial_id = $id ;";
    }
    $result = mysqli_query($conn, $sql);
    $number_of_rows = mysqli_num_rows($result);
    if($number_of_rows > 0)
    {
        $i = 0;
        while($row=mysqli_fetch_assoc($result))
        {
            $array[$i]=$row["id"];
            $i++;
            $array[$i]=$row["imie"];
            $i++;
            $array[$i]=$row["nazwisko"];
            $i++;
            $array[$i]=$row["ranga"];
            $i++;
            $array[$i]=$row["akcje"];
            $i++;
            $array[$i]=$row["oddzial_id"];
            $i++;
        }
    }
    return $array;
}
function add_action($conn, $lifeguard_squad, $victim_name, $victim_birth, $victim_adress, $action_start, $action_end, $injury_type, $help_type, $event_place, $trans_time, $trans_place, $trans_id, $lifeguard_action)
{
    $sql="INSERT INTO akcje(data_dodania, id_oddzialu, victim_name, victim_birth, victim_adress, action_start, action_end, injury_type, help_type, event_place, trans_time, trans_place, trans_id, ratownik1, ratownik2, ratownik3, ratownik4, ratownik5, ratownik6, ratownik7, ratownik8, ratownik9, ratownik10) VALUES ( NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../login-form-15/akcje_wopr.php?error=stmtfail");
        exit();

    }
    mysqli_stmt_bind_param($stmt,"ssssssssssssssssssssss", $lifeguard_squad, $victim_name, $victim_birth, $victim_adress, $action_start, $action_end, $injury_type, $help_type, $event_place, $trans_time, $trans_place, $trans_id, $lifeguard_action[0], $lifeguard_action[1], $lifeguard_action[2], $lifeguard_action[3], $lifeguard_action[4], $lifeguard_action[5], $lifeguard_action[6], $lifeguard_action[7], $lifeguard_action[8], $lifeguard_action[9]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login-form-15/akcje_wopr.php?error=none");
    exit();
}
function load_action($conn, $id, $zmienna)
{
    if($zmienna==0){
        $sql="SELECT * FROM akcje WHERE widoczne = 1 AND ( ratownik1 = $id OR ratownik2 = $id OR ratownik3 = $id OR ratownik4 = $id OR ratownik5 = $id OR ratownik6 = $id OR ratownik7 = $id OR ratownik8 = $id OR ratownik9 = $id OR ratownik10 = $id);";
    }
    elseif($zmienna==1){
        $sql = "SELECT * FROM akcje WHERE widoczne = 1 AND ( ratownik1 = $id OR ratownik2 = $id OR ratownik3 = $id OR ratownik4 = $id OR ratownik5 = $id OR ratownik6 = $id OR ratownik7 = $id OR ratownik8 = $id OR ratownik9 = $id OR ratownik10 = $id) ORDER BY data_dodania DESC LIMIT 7;";
    }
    elseif($zmienna==2){
        $sql = "SELECT injury_type, COUNT(id) AS ilosc FROM akcje WHERE widoczne = 1 AND ( ratownik1 = $id OR ratownik2 = $id OR ratownik3 = $id OR ratownik4 = $id OR ratownik5 = $id OR ratownik6 = $id OR ratownik7 = $id OR ratownik8 = $id OR ratownik9 = $id OR ratownik10 = $id) GROUP BY injury_type;";
    }
    
    $result = mysqli_query($conn, $sql);
    $number_of_rows = mysqli_num_rows($result);
    if($number_of_rows > 0)
    {
        $i = 0;
        while($row=mysqli_fetch_assoc($result))
        {
            $array[$i] = $row;
            $i++;
            
        }
    }
    return $array;
}
function load_one_action($conn, $id, $id2)
{
    $sql="SELECT * FROM akcje WHERE id = $id2 AND widoczne = 1 AND (ratownik1 = $id OR ratownik2 = $id OR ratownik3 = $id OR ratownik4 = $id OR ratownik5 = $id OR ratownik6 = $id OR ratownik7 = $id OR ratownik8 = $id OR ratownik9 = $id OR ratownik10 = $id);";
    $result = mysqli_query($conn, $sql);
    $number_of_rows = mysqli_num_rows($result);
    if($number_of_rows > 0)
    {
        $i = 0;
        while($row=mysqli_fetch_assoc($result))
        {
            $array[$i] = $row;
            $i++;
            
        }
    }
    return $array;
}
function edit_action($conn, $id, $victim_name, $victim_birth, $victim_adress, $action_start, $action_end, $injury_type, $help_type, $event_place, $trans_time, $trans_place)
{
    $sql="UPDATE akcje SET victim_name=?, victim_birth=?, victim_adress=?, action_start=?, action_end=?, injury_type=?, help_type=?, event_place=?, trans_time=?, trans_place=? WHERE id = $id;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../pojedyncza_akcja.php?error=stmtfail");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssssssssss", $victim_name, $victim_birth, $victim_adress, $action_start, $action_end, $injury_type, $help_type, $event_place, $trans_time, $trans_place);
    mysqli_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login-form-15/pojedyncza_akcja.php?akcja=$id");
    exit();
}
function month_stats($conn,$id,$zmienna)
{
    if($zmienna==0){
        $sql = "SELECT date_format(action_start, '%M'),COUNT(id) FROM akcje WHERE widoczne = 1 AND (ratownik1 = $id OR ratownik2 = $id OR ratownik3 = $id OR ratownik4 = $id OR ratownik5 = $id OR ratownik6 = $id OR ratownik7 = $id OR ratownik8 = $id OR ratownik9 = $id OR ratownik10 = $id) GROUP BY date_format(action_start, '%M') ;";
    }
    elseif($zmienna==1){
        $date = date('Y-m-d 00:00:00');
        $date1= date('Y-m-d 23:59:59');
        $sql = "SELECT COUNT(id) FROM akcje WHERE action_start BETWEEN '$date' AND '$date1';";
    }
    elseif($zmienna==2)
    {
        $sql="SELECT AVG(TIMESTAMPDIFF(MINUTE, action_start, action_end)) AS srednia FROM `akcje` WHERE widoczne = 1 AND ( ratownik1 = $id OR ratownik2 = $id OR ratownik3 = $id OR ratownik4 = $id OR ratownik5 = $id OR ratownik6 = $id OR ratownik7 = $id OR ratownik8 = $id OR ratownik9 = $id OR ratownik10 = $id);";
    }
    $result = mysqli_query($conn, $sql);
    $number_of_rows = mysqli_num_rows($result);
    if($number_of_rows > 0)
    {
        $i = 0;
        while($row=mysqli_fetch_assoc($result))
        {
            if($zmienna==0){
                $array[$i] = $row["date_format(action_start, '%M')"];
                $i++;
                $array[$i] = $row["COUNT(id)"];
                $i++;
            }
            else{
                //echo $row["COUNT(id)"];
                $array[$i]=$row;
                $i++;
            }
        }
    }
    return $array;
}
function edit_haslo($conn, $id, $haslo)
{
    $sql="UPDATE users SET haslo=? WHERE id = $id;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $haslo);
    mysqli_execute($stmt);
    mysqli_stmt_close($stmt);
    echo "Zmieniono hasło";
    exit();
}
function del_action($conn, $id, $id_user){
    $sql="UPDATE akcje SET widoczne=? WHERE id = $id AND (ratownik1 = $id_user OR ratownik2 = $id_user OR ratownik3 = $id_user OR ratownik4 = $id_user OR ratownik5 = $id_user OR ratownik6 = $id_user OR ratownik7 = $id_user OR ratownik8 = $id_user OR ratownik9 = $id_user OR ratownik10 = $id_user);";
    $stmt=mysqli_stmt_init($conn);
    $zero=0;
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../login-form-15/akcje_wopr.php?del-ko");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $zero);
    mysqli_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login-form-15/akcje_wopr.php?del-ok");
    exit();
}
?>