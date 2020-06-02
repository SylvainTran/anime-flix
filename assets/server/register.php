<?php
    /**
     * Auteur: Sylvain Tran
     * But du programme: Test du server
     * Date: 29-05-2020
    */
    define("PATH", "../data/animes.txt");
    if(!$fic=fopen(PATH, "a+")) {
        echo "Animes.txt file not found";
        exit;
    }
    $idRef=$_POST['idRef'];
    $titleRef=$_POST['titleRef'];
    $durationRef=$_POST['durationRef'];
    $line=$idRef.";".$titleRef.";".$durationRef."\n";
    fputs($fic,$line);
    fclose($fic);
    echo "Anime: ".$titleRef." was registered successfully.";

    // echo "<b>Data received. <b><br>";
    // echo "<br>Anime ID = ".$idRef;
    // echo "<br>Title of anime = ".$titleRef;
    // echo "<br>Duration of anime = ".$durationRef;
?>
<br>
<a href="/tp1/test.html">Return home</a>