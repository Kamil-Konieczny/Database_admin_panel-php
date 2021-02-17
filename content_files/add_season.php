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
<div class="add_form">
    <h2>Dodaj sezon</h2></br>
    <form action="/panel_admina/logic_file/add_season_logic.php" method="post">
        <label for="start_date">Data rozpoczęcia: </label></br>
        <input type = "date" name = "start_date" id = "start_date"></br></br>
        <label for="end_date">Data końca: </label></br>
        <input type = "date" name = "end_date" id = "end_date"></br></br>
        <input type = "submit" value = "Dodaj sezon"  name="add" class="submit_button">
    </form>
</div>
</body>
</html>