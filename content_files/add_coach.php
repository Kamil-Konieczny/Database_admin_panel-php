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
    <h2>Dodaj trenera</h2></br>
    <form action="/panel_admina/logic_file/add_coach_logic.php" method="post">
        <label for="name">Imię: </label>
        <input type = "text" name = "first_name" id = "first_name"></br></br>
    <label for="last_name">Nazwisko: </label>
    <input type = "text" name = "last_name" id = "last_name"></br></br>
    </br>
        <label for="birth_date">Data urodzenia: </label></br>
    <input type = "date" name = "birth_date" id = "birth_date"></br></br>
    </br>
    <input type = "submit" value = "Dodaj"  name="add" class="submit_button">
    </form>
</div>
</body>
</html>
