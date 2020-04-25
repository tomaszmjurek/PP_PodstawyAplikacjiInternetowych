<?php session_start(); 
 $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
 if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
 }

 printf("<h1>Pracownicy</h1>");

 if(isSet($_SESSION["statusDodawania"]) && $_SESSION["statusDodawania"] == 1) {
    printf("Pomyslnie dodano pracownika!<br><br>");
    $_SESSION["statusDodawania"] = 0;
 }
    
 $sql = "SELECT * FROM pracownicy";
 $result = $link->query($sql);
 foreach ($result as $v) {
    echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
 }
 $result->free();
 $link->close();

 printf("<br><a href='form06_post.php'>Dodaj pracownika</a><br>");
?>