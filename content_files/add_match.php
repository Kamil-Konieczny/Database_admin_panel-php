<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/add_team.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <h2>Dodaj spotkanie</h2></br>
    <form action="/panel_admina/logic_file/add_match_logic.php" method="post">
        <label for="team1">Druzyna pierwsza: </label>
        <select id = "team1" name ="team1">
            <?php
            $databaseName = "volleyball";
            $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
            $connectionInfo = array("Database" => $databaseName);
            $conn = sqlsrv_connect($serverName, $connectionInfo);
            if ($conn === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            $sql = "SELECT * FROM dbo.team";

            $stmt = sqlsrv_query( $conn, $sql);
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
            {
                $name = $row["Name"];
                echo '<option value = '.$row['IdTeam'].'>'. $name .'</option >';
            }
            ?>
        </select></br ></br ></br >
        <label for="team2">Druzyna druga: </label>
        <select id = "team2" name ="team2">
            <?php
            $conn = sqlsrv_connect($serverName, $connectionInfo);
            if ($conn === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            $sql = "SELECT * FROM dbo.team";

            $stmt = sqlsrv_query( $conn, $sql);
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
            {
                $name = $row["Name"];
                echo '<option value = '.$row['IdTeam'].'>'. $name .'</option >';
            }
            ?>
        </select></br ></br ></br >
        <label for="match_date">Data spotkania: </label></br>
        <input type = "date" name = "match_date" id = "match_date"></br></br>
        <input type = "submit" value = "Zapisz i przejdz dalej"  name="add" class="submit_button">
    </form>
</div>

</body>
</html>