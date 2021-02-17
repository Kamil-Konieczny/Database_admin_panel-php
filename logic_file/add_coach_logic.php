<?php
session_start();

if(!empty($_POST['last_name']) && !empty($_POST['first_name'])&& !empty( $_POST['birth_date'])) {
    $databaseName = "volleyball";
    $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
    $connectionInfo = array("Database" => $databaseName);
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $lastname = $_POST['last_name'];
    $firstname = $_POST['first_name'];
    $date = $_POST['birth_date'];
    $sql = "INSERT INTO dbo.coach (FirstName,LastName,DatBirth) VALUES (?,?,?)  ";
    $params = array($firstname, $lastname, $date);

    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt == false) {
        echo '<script>alert("Dodawanie nie powiodło się")</script>';
        die(print_r(sqlsrv_errors(), true));
         include_once  'C:\xampp\htdocs\panel_admina\content_files\add_coach.php' ;
    } else {
        echo '<script>alert("Dodano do bazy")</script>';
   include_once  'C:\xampp\htdocs\panel_admina\content_files\add_coach.php' ;
    }
}
else{
   echo '<script>alert("Dodawanie nie powiodło się2")</script>';
    die(print_r(sqlsrv_errors(), true));
    include_once  'C:\xampp\htdocs\panel_admina\content_files\add_coach.php' ;
}
?>
