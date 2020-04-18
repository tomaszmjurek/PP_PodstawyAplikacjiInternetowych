<?php session_start();
    if(isSet($_POST["zaloguj"])) {
        require("funkcje.php");
        foreach($osoby as $osoba) {
            if($_POST["login"] == $osoba->login && $_POST["haslo"] == $osoba->haslo) {
                $_SESSION["zalogowanyImie"] = $osoba->imieNazwisko;
                $_SESSION["zalogowany"] = 1;
                header("Location: user.php");
            }
        }
    }  
    if($_SESSION["zalogowany"] == 0)
        header("Location: index.php");
?>