<?php
    /**
     * Auteur: Sylvain Tran
     * But du programme: Test du server
     * Date: 29-05-2020
    */
    define("PATH", "../data/animes.txt");
    if(!$fic=fopen(PATH, "r")) {
        echo "Animes.txt has a problem with opening.";
        exit;
    }
    $rep="<table border=1>";
    $rep.="<caption>Anime List</caption>";
    $rep.="<tr><th>Episode</th><th>Title</th><th>Duration</th></tr>";
    $line=fgets($fic);
    $deli=';';
    while (!feof($fic)) {
        $tab=explode($deli,$line);
        $rep.="<tr><td>".$tab[0]."</td><td>".$tab[1]."</td><td>".$tab[2]."</td></tr>";
        $line=fgets($fic);
    }
    $rep.="</table>";
    fclose($fic);
    echo $rep;
?>
<br>
<a href="/tp1/test.html">Return home</a>