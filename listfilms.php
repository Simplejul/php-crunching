<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste films</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    
<?php

$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films

// Zone Test
echo count($top[1])."<br>";
var_dump($top[1]);
echo "<br><br>".$top[1] ["im:releaseDate"]["label"];
echo "<br><br>".gettype($top[1] ["im:releaseDate"]["label"])."<br><br>";
//$date = DateTime::createFromFormat('c', "2015-07-31T00:00:00-07:00")->format('Y-m-d');
$date = $top[1] ["im:releaseDate"]["label"];
$datetime = new DateTime($date);

echo $datetime->format("Y");

// Fin zone test


?>

    <h3>    Afficher le top10 des films sous cette forme :</h3>
    <?php
        for ($i=1; $i < 11; $i++) { 
            echo $i." ".($top[$i]["im:name"]["label"])."<br>";
        }
    ?>
    
    <h3>    Quel est le classement du film « Gravity » ?</h3>
    <?php
        for ($i=1; $i < 100; $i++) { 
            if ($top[$i]["im:name"]["label"]==="Gravity"){
                echo $i." ".$top[$i]["im:name"]["label"];
            }
        }
        
    ?>
    
    <h3>    Quel est le réalisateur du film « The LEGO Movie » ?</h3>
    <?php
        foreach ($top as $film) {
            if ($film["im:name"]["label"]==="The LEGO Movie"){
                echo $film["im:artist"]["label"];
            }
        }
    ?>
    
    <h3>    Combien de films sont sortis avant 2000 ?</h3>
    <?php
        $m = 0;
        foreach ($top as $film) {
            
            $date = $film["im:releaseDate"]["label"];
            $datetime = new DateTime($date);
            $yDate = $datetime->format("Y");
            
            if ($yDate<2000){
                $m++;
            }
        }
        echo $m;
    ?>
    
    <h3>    Quel est le film le plus récent ? Le plus vieux ?</h3>
    <?php
        /* Ne fonctionne pas = bizar ?
        $old=$datetime;
        $recent=$datetime;
        foreach ($top as $film) {
            $date1 = $film["im:releaseDate"]["label"];
            $datetime1 = new DateTime($date1);
            $ymdDate = $datetime1->format("Y-m-d");
            if ($ymdDate<$old){
                $old=$ymdDate;
            }
            
        }
        foreach ($top as $film) {
            $date1 = $film["im:releaseDate"]["label"];
            $datetime1 = new DateTime($date1);
            $ydDate = $datetime1->format("Y-m-d");
            if ($ydDate > $recent){
                $recent=$ydDate;
            }
            
        }
        echo $old."<br>";
        echo $recent;*/
        $arrayfilms = [];
        foreach ($top as $film) {
            $arrayfilms += array($film["im:releaseDate"]["label"] => $film["im:name"]["label"]);
        }
        ksort($arrayfilms);
        echo "Le film le plus récent : ".end($arrayfilms)."<br><br>";
        echo "Le film le plus ancien : ".reset($arrayfilms);
    ?>
    
    <h3>    Quelle est la catégorie de films la plus représentée ?</h3>
    <?php
        $categories = [];
        foreach ($top as $film) {
            array_push($categories, $film["category"]["attributes"]["term"]);
        }
        $catSorted = array_count_values($categories);
        asort($catSorted);
        $catmorerepresentnb = end($catSorted);
        echo array_search($catmorerepresentnb, $catSorted).".";
    ?>
    
    <h3>    Quel est le réalisateur le plus présent dans le top100 ?</h3>
    <?php
        $directors = [];
        foreach ($top as $film) {
            array_push($directors, $film["im:artist"]["label"]);
        }
        $directorsSorted = array_count_values($directors);
        asort($directorsSorted);
        $directorsmostrepesentednb = end($directorsSorted);
        echo array_search($directorsmostrepesentednb, $directorsSorted).".";
    ?>
    
    <h3>    Combien cela coûterait-il d'acheter le top10 sur iTunes ? de le louer ?</h3>
    <?php
        $totalprice=0;
        for ($i=0; $i < 10; $i++) { 
            $totalprice += (float)$top[$i]["im:price"]["attributes"]["amount"];
        }
        echo $totalprice."$<br>";
    ?>
    
    <h3>    Quel est le mois ayant vu le plus de sorties au cinéma ?</h3>
    <?php
        $month = [];
        foreach ($top as $film) {
            $date2 = $film["im:releaseDate"]["label"];
            $datetime2 = new DateTime($date2);
            $yDate2 = $datetime2->format("F");
            array_push($month, $yDate2);
        }
        $monthSorted = array_count_values($month);
        asort($monthSorted);
        $monthmostviewed = end($monthSorted);
        echo array_search($monthmostviewed, $monthSorted);
    ?>
    
    <h3>    Quels sont les 10 meilleurs films à voir en ayant un budget limité ?</h3>
    <?php
        $filmslimited = [];
        $ac = [];
        //foreach ($top as $film) {
            //$filmslimited += array($film["im:price"]["attributes"]["amount"] => $film["im:name"]["label"]);
            //$filmslimited[$film["im:price"]["attributes"]["amount"]]=[$film["im:name"]["label"]];
            
        //}
        //asort($filmslimited);
        var_dump ($filmslimited);
        echo "<br>";
        //$filmslowprice = array_slice($filmslimited,0,10,true);
        //var_dump($filmslowprice);
        echo "<br>";
        //foreach ($filmslowprice as $key => $value) {
            # code...
        //}
        //$a=[1,2,3,4,5,6,7,8];
        //var_dump ($a);
        //echo "<br>";
        //$b = array_slice($a,-3,3,true);
        //var_dump ($b);
    ?>
    

</body>
</html>