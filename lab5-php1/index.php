<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
<body>
    <a href="user.php">Strona użytkownika</a>
    <?php
        echo '<h1> Nasz system </h1>';
        // echo 'Przesłany login: ' . $_POST["login"] . "<br>";
        // echo 'Przeslane haslo: ' . $_POST["haslo"] . "<br>";

        if(isset($_POST["wyloguj"]) && $_SESSION["zalogowany"] == 1) {
            $_SESSION["zalogowany"] = 0;
        }
    ?>
    <form action ="logowanie.php" method="POST">
        <fieldset>
            <legend>Dane użytkownika</legend>
            Login: <input type="text" name="login"><br>
            Haslo: <input type="password" name="haslo"><br>
            <input type="submit" method="POST" value="Zaloguj" name="zaloguj">
        </fieldset>
    </form><br><br>
    <form action="cookie.php" method="GET">
        <fieldset>
            <legend>Formularz Cookie</legend>
            <input type="number" name="czas">
            <input type="submit" name="utworzCookie">
        </fieldset>
    </form>
    <?php
        if(isset($_COOKIE["czas"])) {
            echo "Zapisane cookie: " . $_COOKIE["czas"];
        }
    ?>
</body>
</html>
