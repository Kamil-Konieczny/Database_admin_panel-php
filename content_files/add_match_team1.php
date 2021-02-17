
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/add_match_team.css">
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


    <?php
    if(session_id() == '') {
        session_start();
    }

    $team1 = $_SESSION['team1'];
    $databaseName = "volleyball";
    $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
    $connectionInfo = array( "Database"=>$databaseName);
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn == false ) {
        die( print_r( sqlsrv_errors(), true));
    }

    $sql = "SELECT * FROM dbo.team WHERE IdTeam = ?";
    $params = array($team1);
    $stmt = sqlsrv_query( $conn, $sql,$params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
    {
        $name = $row['Name'];
        $id = $row['IdTeam'];
    }
    $id_match = $_SESSION['idmatch'];
    $_SESSION['id_match'] = $id_match;
    echo '<h2>Dodaj punkty dla poszczególnych zawodników drużyny '.$name.'</h2>';
    echo '<label id = "idmatch" name = "idmatch" style="float:right;">'.$id_match.'</label>';
    echo '<label style="float:right;">Id meczu: </label>';

    ?>
    <form action="/panel_admina/logic_file/add_player_points_logic.php" method="post">
    <table id="myTable" name ="myTable">
        <tr>
            <th>Id</th>
            <th>Zawodnik</th>
            <th>Punkty</th>
        </tr>
<?php
        if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        $sql = "SELECT * FROM dbo.playerstatistics WHERE IdMatch = ?";
        $params2 = array($id_match);
        $stmt = sqlsrv_query( $conn, $sql,$params2);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
            $id_player = $row['IdPlayer'];
            $points = $row['Puncts'];
            $sql = "SELECT * FROM dbo.player WHERE IdPlayer = ?";
            $params = array($id_player);
            $stmt2 = sqlsrv_query($conn, $sql, $params);
            if ($stmt2 === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC)) {
            $name = $row['FirstName'];
            $last_name = $row['LastName'];

            echo '<tr>';
            echo '<td>' . $id_player . '</td>';
            echo '<td>' . $name.' '.$last_name. '</td>';
            echo '<td>' . $points . '</td>';
            echo '</tr>';
        }}
        ?>

    </table>
        <div class ="add_player_points">
        <select name = "name" id = "name">
            <?php
            if( $conn === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            $sql = "SELECT * FROM dbo.season WHERE IdTeam = ?";
            $params2 = array($team1);
            $stmt = sqlsrv_query( $conn, $sql,$params2);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            while( $row2 = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {

                echo '<option value = ' . $row2['IdPlayer'] . '>' . getPlayerData($row2['IdPlayer']) . '</option >';

            }
            function getPlayerData($id)
            {
                $databaseName = "volleyball";
                $serverName = "DESKTOP-8ASQ7VG\SQLEXPRESS";
                $connectionInfo = array( "Database"=>$databaseName);
                $conn = sqlsrv_connect( $serverName, $connectionInfo);
                if( $conn == false ) {
                    die( print_r( sqlsrv_errors(), true));
                }
                    $sql = "SELECT * FROM dbo.player WHERE IdPlayer = ? ";
                    $params2 = array($id);
                    $stmt = sqlsrv_query( $conn, $sql,$params2);
                    $name ='';
                    $last_name = '';
                    while( $row2 = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
                    {
                        $name = $row2['FirstName'];
                        $last_name = $row2['LastName'];

                    }
                    return $name.' '.$last_name;
            }
            ?>
        </select></br></br></br>
        <label for="points"></label>
        <input type="number"  value = "Punkty" style = "   margin-left: 20%;" name = "points" id="points">
        <input type="submit"   value = "Dodaj punkty gracza">

        </div>
    </form>

    <form action="/panel_admina/content_files/add_match_team2.php" method="post" >
        <?php
        if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        $sql = "SELECT TOP 1 * FROM dbo.playerstatistics ORDER BY id DESC";
        $stmt = sqlsrv_query( $conn, $sql,$params2);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        $id ='';
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
        {
            $id = $row['id'];

        }
        $_SESSION['last_stat'] = $id;
        ?>
    <input type="submit" style="width: 57%; position: fixed; top: 75%;" value = "Przejdz dalej" onclick="send()">
        </div>
    </form>

</body>
</html>

