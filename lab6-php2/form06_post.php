<?php session_start(); 
 $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
 if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
 }

 printf("<h2>Dodaj pracownika</h2>");

 if(isSet($_SESSION["statusDodawania"])) {
    if($_SESSION["statusDodawania"] == -1 )
        printf("Query failed: %s\n", $_SESSION["error"]);
    else if($_SESSION["statusDodawania"] == -2) 
        printf("Nieprawidłowe dane formularza!");
    $_SESSION["statusDodawania"] = 0;
 }

print<<<KONIEC
 <html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 </head>
 <body>
 <form action="form06_redirect.php" method="POST">
    id_prac <input type="text" name="id_prac">
    nazwisko <input type="text" name="nazwisko">
    <input type="submit" value="Wstaw">
    <input type="reset" value="Wyczysc">
 </form>
KONIEC;

printf("<br><a href='form06_get.php'>Pokaż pracowników</a>");

?>