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
<div class="add_form" style = "    margin-top: 1%;">
    <h2>Dodaj gracza</h2></br>
    <form action="/panel_admina/logic_file/add_player_logic.php" method="post">
        <label for="first_name">Imię: </label>
        <input type = "text" name = "first_name" id = "first_name"></br></br>
        <label for="last_name">Nazwisko: </label>
        <input type = "text" name = "last_name" id = "last_name"></br></br>

        <label for="birth_date">Data urodzenia: </label></br>
        <input type = "date" name = "birth_date" id = "birth_date"></br></br>

        <label for="weight">Waga: </label></br>
        <input type = "number" name = "weight" id = "weight"></br></br>
        <label for="height">Wzrost: </label></br>
        <input type = "number"  name = "height" id = "height"></br></br>
        <label for="position">Pozycja: </label>
        <select id="position" name = "position">
            <?php
            $databaseName = "volleyball";
            $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
            $connectionInfo = array( "Database"=>$databaseName);
            $conn = sqlsrv_connect( $serverName, $connectionInfo);
            if( $conn == false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            $sql = "SELECT * FROM dbo.position";
            $stmt = sqlsrv_query( $conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
            {
                $name = $row['Position'];
                echo '<option value="'.$row['IdPosition'].'" >'.$name.'</option>';
            }
            ?>
        </select></br></br></br>
        <label for="first_squad">Pierwszy skład: </label>
        <input type = "checkbox"  name = "first_squad" id = "first_squad"></br></br></br>

        <input type = "submit" value = "Dodaj"  name="add" class="submit_button">
    </form>
</div>
</body>
</html>
