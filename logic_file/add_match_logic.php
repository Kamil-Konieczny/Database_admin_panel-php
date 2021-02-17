<?php
session_start();
if(!empty($_POST['team1']) && !empty($_POST['team2']) && !empty($_POST['match_date']) ) {
    $_SESSION["team1"] = $_POST['team1'];
    $_SESSION["team2"] = $_POST['team2'];
    $_SESSION["match_date"] = $_POST['match_date'];
    $team1 = $_POST['team1'];
    $team1 = $_POST['team2'];
    $match_date = $_POST['match_date'];
    $databaseName = "volleyball";
    $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
    $connectionInfo = array("Database" => $databaseName);
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $sql = "INSERT INTO dbo.match (IdTeam1,IdTeam2,Date) VALUES (?,?,?)  ";
    $params = array($team1,$team1,$match_date);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if (!$stmt) {
        echo '<script>alert("Dodawanie nie powiodło się1")</script>';
        print_r(sqlsrv_errors(), true);
        header("Location: \panel_admina\content_files\add_match.php");
    } else {

        echo '<script>alert("Dodano do bazy")</script>';
        header("Location: \panel_admina\content_files\add_match_team1.php");    }
    ?>
<?php
    $sql = "SELECT TOP 1 * FROM dbo.match ORDER BY IdMatch DESC";
    $stmt2 = sqlsrv_query($conn, $sql);
    if ($stmt2 === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC))
    {
        $_SESSION["idmatch"] = $row['IdMatch'];
    }}
else{
    echo '<script>alert("Dodawanie nie powiodło się2")</script>';
    header("Location: \panel_admina\content_files\add_match.php");
}

