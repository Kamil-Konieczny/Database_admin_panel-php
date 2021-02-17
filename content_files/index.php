<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/add_team.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<ul id="menu" >
    <div class="sidenav">
        <a href="/panel_admina/content_files/add_season.php">Dodaj sezon</a>
        <a href="/panel_admina/content_files/add_player.php">Dodaj gracza</a>
        <a href="/panel_admina/content_files/add_coach.php">Dodaj trenera</a>
        <a href="/panel_admina/content_files/index.php">Dodaj drużynę</a>
        <a href="/panel_admina/content_files/connect_team&player.php">Przypisz gracza do drużyny</a>
        <a href="/panel_admina/content_files/add_match.php">Dodaj spotkanie</a>
        <a href="/panel_admina/content_files/add_injury_team.php">Dodaj kontuzje</a>
    </div>
</ul>
<div class="add_form" >
    <h2>Dodaj drużynę</h2></br>
    <form action="/panel_admina/logic_file/add_team_logic.php" method="post">
        <label for="name">Nazwa: </label>
        <input type = "text" name = "name" id = "name"></br></br>
    <label for="coach">Trener: </label>
    <select id = "coach" name ="coach">
<?php

$databaseName = "volleyball";
$serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
$connectionInfo = array("Database" => $databaseName);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
$sql = "SELECT * FROM dbo.coach";

$stmt = sqlsrv_query( $conn, $sql);
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
{
    $firstname = $row["FirstName"];
    $lastname = $row["LastName"];
    echo '<option value = '.$row['IdCoach'].'>'. $firstname .' '. $lastname.'</option >';
}?>
 </select></br ></br ></br >
    <label for="season">Sezon: </label>
    <select id = "season" name = "season" >
    <?php
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $sql = "SELECT * FROM dbo.connection";
    $stmt = sqlsrv_query( $conn, $sql);
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
    {
        $start = $row["DateStart"];
        $stop = $row["DateStop"];
        echo '<option value = '.$row['IdSeason'].'>'. $start->format('Y-m-d') .' - '. $stop->format('Y-m-d').'</option >';
    }
?>
    </select></br ></br ></br >
    <input type = "submit" value = "Dodaj"  name="add" class="submit_button">
</form>
</div>
</body>
</html>
