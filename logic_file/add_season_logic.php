<?php
if(!empty($_POST['start_date'])&&!empty($_POST['end_date'])) {
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $databaseName = "volleyball";
    $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
    $connectionInfo = array("Database" => $databaseName);
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $sql = "INSERT INTO dbo.connection (DateStart,DateStop) VALUES (?,?)  ";
    $params = array($start,$end);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if (!$stmt) {
        echo '<script>alert("Dodawanie nie powiodło się1")</script>';
         print_r(sqlsrv_errors(), true);
        include_once  'C:\xampp\htdocs\panel_admina\content_files\add_season.php' ;
    } else {
        echo '<script>alert("Dodano do bazy")</script>';
        include_once  'C:\xampp\htdocs\panel_admina\content_files\add_season.php' ;
    }
}
else{
    echo '<script>alert("Dodawanie nie powiodło się2")</script>';
    include_once  'C:\xampp\htdocs\panel_admina\content_files\add_season.php' ;
}