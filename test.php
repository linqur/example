<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "testDB";
/*подлючение к серверу*/
    $con = new mysqli($server,$user,$pass);

/*создание бд*/
    $con->query("CREATE DATABASE $dbname");
    $con->select_db($dbname);

/*создание таблицы*/
    $sql = "CREATE TABLE users(
            id int AUTO_INCREMENT PRIMARY KEY,
            name varchar(40),
            password varchar(40))";
    if($con->query($sql) === TRUE){
        echo "</br>table create";
    }
    else{
        echo "</br>Error ".$con->error;
    }

/*заполнение таблицы*/
    $name = "Oleg";
    $password = "qwerty";
    $sql = "INSERT INTO users VALUES ( NULL ,'$name','$password')";
    if($con->query($sql) === TRUE){
        echo "</br>record create";
    }
    else{
        echo "</br>Error ".$con->error;
    }

/*последний индекс*/
    $lats_id = $con->insert_id;
    echo "</br>Идентификатор последнего элемента $lats_id</br>";

/*Select и вывод*/
    $sql = "SELECT id,name,password FROM users WHERE id>7 AND id<15"; /*BEETWIN 7 and 15 (между)   IN (1,2,3) (конкретные)    NOT IN (1,2,3) все кроме */
    $records = $con->query($sql);
    if ($records->num_rows > 0){
        while($rows = $records->fetch_assoc()){
            echo $rows['id']."\t".$rows['name']."\t".$rows['password']."</br>";
        }
    }
/*обновлекние записей UPDATE и REPLACE*/
    $sql = "UPDATE users SET name='gazon' WHERE id IN (1,5,8)";
    if($con->query($sql) === TRUE){
        echo "</br>update create";
    }
    else{
        echo "</br>Error ".$con->error;
    }
    $sql = "REPLACE INTO users VALUES(2,'Газява','1234')";
    if($con->query($sql) === TRUE){
        echo "</br>replace create";
    }
    else{
        echo "</br>Error ".$con->error;
    }
   /*Удаление записей*/
    $sql = "DELETE FROM users WHERE id IN (1,5,8)"; /*TRANCATE TABLE tabname очищение всей таблицы быстро(без перебора записей)*/
    if($con->query($sql) === TRUE){
        echo "</br>delete create";
    }
    else{
        echo "</br>Error ".$con->error;
    }
include_once ('header.html');
include_once ('footer.html');
