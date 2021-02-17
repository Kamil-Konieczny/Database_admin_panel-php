<?php
if(!empty($_POST['team'])&&!empty($_POST['player'])&&!empty($_POST['season'])&&!empty($_POST['player_number'])) {

    $team = $_POST['team'];
    $player = $_POST['player'];
    $season = $_POST['season'];
    $player_number = $_POST['player_number'];
    $databaseName = "volleyball";
    $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
    $connectionInfo = array("Database" => $databaseName);
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $sql = "INSERT INTO dbo.season (IdPlayer,IdTeam,Number,IdSeason) VALUES (?,?,?,?)  ";
    $params = array($player,$team,$player_number,$season);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if (!$stmt) {
        echo '<script>alert("Dodawanie nie powiodło się1")</script>';
        print_r(sqlsrv_errors(), true);
        include_once  'C:\xampp\htdocs\panel_admina\content_files\connect_team&player.php' ;
    } else {
        echo '<script>alert("Dodano do bazy")</script>';
        include_once  'C:\xampp\htdocs\panel_admina\content_files\connect_team&player.php' ;
    }
}
else{
    echo '<script>alert("Dodawanie nie powiodło się")</script>';
    include_once  'C:\xampp\htdocs\panel_admina\content_files\connect_team&player.php' ;
}