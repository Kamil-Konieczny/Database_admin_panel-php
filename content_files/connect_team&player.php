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
    <h2>Połącz:</h2></br>
    <form action="/panel_admina/logic_file/connect_team&player_logic.php" method="post">
        <label for="team">Druzyna: </label>
        <select id = "team" name ="team">
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
        <label for="player">Gracz: </label>
        <select id = "player" name = "player" >
            <?php
            if ($conn === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            $sql = "SELECT * FROM dbo.player";
            $stmt = sqlsrv_query( $conn, $sql);
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
            {
                $first_name = $row["FirstName"];
                $last_name = $row["LastName"];
                $birth_date = $row["BirthDate"];
                echo '<option value = '.$row['IdPlayer'].'>'. $first_name .' '.$last_name.' '. $birth_date->format('Y-m-d').'</option >';
            }
            ?>
        </select></br ></br ></br >
        <label for="player_number">Numer dla gracza: </label></br>
        <input type = "number" id="player_number" name="player_number"></br></br></br>

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
        <input type = "submit" value = "Przypisz"  name="add" class="submit_button">
    </form>
</div>

</body>
</html>