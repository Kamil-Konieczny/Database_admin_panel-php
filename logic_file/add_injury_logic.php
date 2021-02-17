<?php
session_start();

if(!empty($_POST['injury']) && !empty($_POST['start_date']) && !empty($_POST['end_date']) && !empty($_POST['menu'])) {
    $databaseName = "volleyball";
    $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
    $connectionInfo = array("Database" => $databaseName);
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
   $injury =  $_POST['injury'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $menu = $_POST['menu'];
    $sql = "INSERT INTO dbo.injury (injury,pause_ending,idPlayer,pause_start) VALUES (?,?,?,?)  ";
    $params = array($injury, $end_date, $menu, $start_date);

    $stmt = sqlsrv_query($conn, $sql, $params);
    if (!$stmt) {
        echo '<script>alert("Dodawanie nie powiodło się1")</script>';
        echo print_r(sqlsrv_errors(), true);
        include_once  'C:\xampp\htdocs\panel_admina\content_files\add_injury_team.php' ;
    } else {
        echo '<script>alert("Dodano do bazy")</script>';
        include_once  'C:\xampp\htdocs\panel_admina\content_files\add_injury_team.php' ;
    }
}
else{
    echo '<script>alert("Dodawanie nie powiodło się2")</script>';
    include_once  'C:\xampp\htdocs\panel_admina\content_files\add_injury_team.php' ;
}