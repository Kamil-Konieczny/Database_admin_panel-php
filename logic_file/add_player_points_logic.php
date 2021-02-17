<?php

session_start();
if (!empty($_POST['name']) && !empty($_POST['points'])) {
    $idplayer = $_POST['name'];
    $points = $_POST['points'];
    $idmatch = $_SESSION['id_match'];

    $databaseName = "volleyball";
    $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
    $connectionInfo = array("Database" => $databaseName);
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $sql = "INSERT INTO dbo.playerstatistics (IdMatch,IdPlayer,Puncts,YellowCard) VALUES (?,?,?,?)  ";
    $params = array($idmatch, $idplayer,$points,0);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if (!$stmt) {
        print_r(sqlsrv_errors(), true);
        header("Location: \panel_admina\content_files\add_match_team1.php");
    } else {
        header("Location: \panel_admina\content_files\add_match_team1.php");
    }

} else {
    echo '<script>alert("Dodawanie nie powiodło się")</script>';
    header("Location: \panel_admina\content_files\add_match_team1.php");
}