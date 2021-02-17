<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
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
<div class="add_form">
    <h2>Wybierz drużynę</h2></br>
   <?php $id = ''; ?>

    <form action="/panel_admina/content_files/add_injury.php" method="post">

        <select name = "name" id = "name">
            <?php
            $databaseName = "volleyball";
            $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
            $connectionInfo = array( "Database"=>$databaseName);
            $conn = sqlsrv_connect( $serverName, $connectionInfo);
            if( $conn == false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            $sql = "SELECT * FROM dbo.team";
            $stmt = sqlsrv_query( $conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
            {
                $name = $row["Name"];
                echo '<option>'.$name.'</option >';
            }
            ?>
        </select></br></br></br>
        <input type = "submit" value = "Dalej"  name="add" class="submit_button">
    </form>
</div>
</body>
</html>
