<html>
<head>
    <link rel="stylesheet" href="../css/add_team.css">
</head>
<body>
<ul id="menu">
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
    <h2>Dodaj kontuzje</h2></br>
    <form action="/panel_admina/logic_file/add_injury_logic.php" method="post">
        <label for="name">Wybierz gracza: </label>
        <select id="menu" name="menu">
<?php
session_start();
$name = $_POST["name"];
$databaseName = "volleyball";
$serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
$connectionInfo = array("Database" => $databaseName);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
$sql = "SELECT IdPlayer
FROM dbo.Team t
INNER JOIN dbo.Season s
ON t.IdTeam = s.IdTeam
WHERE t.Name = ?";
$params = array($name);
$stmt = sqlsrv_query($conn, $sql, $params);
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
    $id = $row["IdPlayer"];
    $player = "SELECT * FROM dbo.player WHERE IdPlayer = ?";
    $params2 = array($id);
    $stmt2 = sqlsrv_query($conn, $player, $params2);
while( $row2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC)) {
    echo '<option value="'.$row2['IdPlayer'].'">' . $row2["FirstName"].' '.$row2['LastName'].'</option>';
}}
?>
        </select></br></br>
        <label for="injury">Rodzaj kontuzji: </label></br>
        <input type = "text" name = "injury" id = "injury"></br></br>
        <label for="start_date">Data rozpoczęcia: </label></br>
        <input type = "date" name = "start_date" id = "start_date"></br></br>
        <label for="end_date">Data końca: </label></br>
        <input type = "date" name = "end_date" id = "end_date"></br></br>
        <input type = "submit" value = "Dodaj"  name="add" class="submit_button">
    </form>
</div>
</body>
</html>
