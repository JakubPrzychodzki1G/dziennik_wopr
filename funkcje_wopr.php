<?php



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
function gender($name)
{
    if(substr($name,strlen($name))!=="a"){
        return "Mężczyzna";
    }
    else{
        return "Kobieta";
    }
}

?>