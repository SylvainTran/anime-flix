<html>
<head>
    <title>Travail Pratique #1</title>
    <link rel="stylesheet" href="css/bootstrap-4.5.0/bootstrap.min.css">
    <script src="js/lib/bootstrap.min.js"></script>
    <style>
        h1 {
            color: blue;
            text-align: center;
        }
        h2 {
            color: red;
            text-align: center;
        }
        h3 {
            color: green;
            text-align: center;
            font-style: italic;
        }
        #main__selection{
            text-align: center;
        }
        #main__table--weather-data {
            border: 0.5px solid grey;   
            text-align: center;
            margin: auto;
        }
        #main__table--weather-data tr {

        }
        #main__table--weather-data td {
            padding: 5px;
            border: 1px solid black;
        }
        #main__table--first-row {

        }
        #main__table--last-row {
            text-align: center;
        }
        hr {
            width: 50%;
        }
    </style>
</head>
<body>
    <h1>Informations m&eacute;t&eacute;orologiques</h1>
    <?php
        /**
         * Auteur: Sylvain Tran
         * But du programme: Test du server
         * Date: 29-05-2020
        */
        // Parse the city name in the value of the submitted form using the : delimiter
        // POST method version
        $selectedCity=strtok($_POST['main__selection__city-list'], ":");
        setlocale(LC_ALL, 'fr-CA');
        date_default_timezone_set('America/Montreal');
        echo "<h2 id=\"header__date\">".strftime('Le %A %e %B %Y - %T')."</h2>";    
        echo "<hr>";
        echo "<h3>Ville: ".$selectedCity."</h3>";
        define("DIR", "../data/");
        $selectedFilePath=strtok($_POST['main__selection__city-list'], ":");
        $selectedFilePath=strtok(":");
        define("PATH", DIR.$selectedFilePath);
        if(!$fic=fopen(PATH, "r")) {
            echo "X.txt has a problem with opening.";
            exit;
        }
        $deli=': ';
        $information=NULL; // The first row's info (just the string)
        $temperature=NULL;
        $humidity=NULL;
        $wind=NULL;
        $desc=NULL;

        $line=fgets($fic);                    
        while (! feof($fic)) {
            $data=explode($deli,$line);
            switch($data[0]) {
                case "information":
                    $information=$data[1];
                    break;
                case "temperature":
                    $temperature=$data[1];                
                    break;
                case "vent":
                    $wind=$data[1];
                    break;
                case "humidite":
                    $humidity=$data[1];
                    break;
                case "desc":
                    $desc=$data[1];
                    break;                    
                default:
                    break;
            }
            $line=fgets($fic);
        }
        fclose($fic);

        // The dataTable and the headersTable follow each other in order
        $dataTable=array( $temperature, $humidity, $wind );
        $headersTable=array( "Temp&eacute;rature: ", "Humidit&eacute;: ", "Vent: " );
        $elements=count($dataTable);

        // Check for nulls in the information and desc vars, if null replace by &nbsp;
        if(is_null($information)) $information="&nbsp;";
        if(is_null($desc)) $desc="&nbsp;";

        echo "<table id=\"main__table--weather-data\">";
        echo "<tr id=\"main__table--first-row\">";
        echo "<td colspan=\"3\">";
        echo "<img src=../img/".trim($information).".gif alt=image m&eacute;t&eacute;o></img><br>";
        echo $information;
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        for($i=0;$i<$elements;$i++) {
            if(!is_null($dataTable[$i])) {
                echo "<td>";
                echo $headersTable[$i];
                echo $dataTable[$i];
                echo "</td>";
            } else {
                echo "<td>";
                echo "&nbsp;";
                echo "</td>";
            }
        }
        echo "</tr>";
        echo "<tr id=\"main__table--last-row\">";
        echo "<td colspan=\"3\">".$desc."</td>";
        echo "</tr>";
        echo "</table>";            
    ?>
    <hr style="width: 100%;">
    <p>
        Travail fait par: Sylvain Tran p1195417
    </p>
</body>
</html>