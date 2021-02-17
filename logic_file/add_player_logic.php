<?php

if(!empty($_POST['first_name'])&&!empty($_POST['last_name'])&&!empty($_POST['birth_date'])&& !empty($_POST['weight'])&&!empty($_POST['height'])&&!empty($_POST['position'])) {
    $first_name = $_POST['first_name'];
    $last_name =$_POST['last_name'] ;
    $birth_date  = $_POST['birth_date'];
    $weight =$_POST['weight'] ;
    $height = $_POST['height'];
    $position = $_POST['position'];
    $first_squad = '';
    if(isset($_POST['first_squad']))
    {
        $first_squad = true;
    }
    else
    {
        $first_squad = false;
    }
    $databaseName = "volleyball";
    $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
    $connectionInfo = array("Database" => $databaseName);
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $sql = "INSERT INTO dbo.player (FirstName,LastName,BirthDate,Weight,Height,first_squad,IdPosition) VALUES (?,?,?,?,?,?,?)  ";
    $params = array($first_name,$last_name,$birth_date,$weight,$height,$first_squad,$position);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if (!$stmt) {
       echo '<script>alert("Dodawanie nie powiodło się1")</script>';
        print_r(sqlsrv_errors(), true);
     include_once  'C:\xampp\htdocs\panel_admina\content_files\add_player.php' ;
    } else {
        echo '<script>alert("Dodano do bazy")</script>';
        include_once  'C:\xampp\htdocs\panel_admina\content_files\add_player.php' ;
    }
    sqlsrv_close(conn);
}
else{
    echo '<script>alert("Dodawanie nie powiodło się2")</script>';
    include_once  'C:\xampp\htdocs\panel_admina\content_files\add_player.php' ;
}