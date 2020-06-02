<html>
<head>
    <title>Travail Pratique #1</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/lib/jquery-3.5.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body>
    <h1>Informations m&eacute;t&eacute;orologiques</h1>
    <?php
        setlocale(LC_ALL, 'fr-CA');
        date_default_timezone_set('America/Montreal');
        echo "<h2 id=\"header__date\">".strftime('Le %A %e %B %Y - %T')."</h2>";    
    ?>
    <div id="main__selection">
        <label for="main__selection__city-list">Choix de la ville:</label>
        <select name="main__selection__city-list" id="main__selection__city-list" form="city-select-form">
        <?php
            /**
             * Auteur: Sylvain Tran
             * But du programme: Générer des options select depuis un fichier dans le serveur 
             * Date: 30-05-2020
            */
            // Open the file at the specified path
            define("PATH", "villes.txt");
            if(!$fic=fopen(PATH, "r")) {
                echo "Villes.txt has a problem opening.";
                exit;
            }
            // Extract the city from each line
            $lineIterator=fgets($fic);
            // Delimiter is a single char ending with ';' 
            $options="";
            while (!feof($fic)) {
                $dataArray=preg_split('/;\s/',$lineIterator);
                $city=preg_split('/:{1}/',$dataArray[0]);
                $file=preg_split('/:{1}/',$dataArray[1]);
                // Send both the city name and the file path in the value
                $option="<option value=".$city[1].":".$file[1].">".$city[1]."</option>";
                $options.=$option;
                $lineIterator=fgets($fic);
            }
            fclose($fic);
            echo $options;
        ?>
        </select>
        <br><br>
        <form id="city-select-form" action="assets/server/citySelectForm.php" method="POST">  
            <button id="button main__button--display-weather">Afficher la m&eacute;t&eacute;o</button>
        </form>   
        <br><br>
    </div>
    <hr>
    <p>
        Travail fait par: Sylvain Tran p1195417
    </p>
</body>
</html>