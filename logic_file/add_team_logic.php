<?php

if(!empty($_POST['name']) && !empty($_POST['coach']) && !empty($_POST['season']) ) {
    $databaseName = "volleyball";
    $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
    $connectionInfo = array("Database" => $databaseName);
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $name = $_POST['name'];
    $coach = $_POST['coach'];
    $idSeason = $_POST['season'];
    $sql = "INSERT INTO dbo.Team (Name) VALUES ('".$name."')  ";
    $params = array($name);
    $stmt = sqlsrv_query($conn, $sql);
    if (!$stmt) {
        echo print_r(sqlsrv_errors(), true);}

    if (!$stmt) {
        echo '<script>alert("Dodawanie nie powiodło się1")</script>';
        print_r(sqlsrv_errors(), true);
        include_once  'C:\xampp\htdocs\panel_admina\content_files\index.php' ;
    } else {
        $sql2 ="SELECT TOP 1 * FROM dbo.team ORDER BY IdTeam DESC ";
        $stmt2 = sqlsrv_query($conn, $sql2);

        $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC);
        $id =  $row['IdTeam'];

        $sql3 = "INSERT INTO dbo.TeamStatictisc (IdTeam,IdSeason,IDCoach) VALUES (?,?,?)  ";
        $params3 = array($id,$idSeason,$coach);
        $stmt3 = sqlsrv_query($conn, $sql3, $params3);
        if (!$stmt3) {
            echo '<script>alert("Dodawanie nie powiodło się3")</script>';
            die(print_r(sqlsrv_errors(), true));
            include_once  'C:\xampp\htdocs\panel_admina\content_files\index.php' ;
        } else {
        echo '<script>alert("Dodano do bazy")</script>';
        include_once  'C:\xampp\htdocs\panel_admina\content_files\index.php' ;}
    }
}
else{
    echo '<script>alert("Dodawanie nie powiodło się")</script>';
    include_once  'C:\xampp\htdocs\panel_admina\content_files\index.php' ;
}
