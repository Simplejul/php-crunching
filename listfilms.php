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

echo count($top[1])."<br>";
var_dump($top[1]);

?>

    <h3>    Afficher le top10 des films sous cette forme :</h3>
    <?php
        for ($i=0; $i < 10; $i++) { 
            var_dump ($top[$i])."<br>";
        }
    ?>
    
    <h3>    Quel est le classement du film « Gravity » ?</h3>
    <?php

    ?>
    
    <h3>    Quel est le réalisateur du film « The LEGO Movie » ?</h3>
    <?php

    ?>
    
    <h3>    Combien de films sont sortis avant 2000 ?</h3>
    <?php

    ?>
    
    <h3>    Quel est le film le plus récent ? Le plus vieux ?</h3>
    <?php

    ?>
    
    <h3>    Quelle est la catégorie de films la plus représentée ?</h3>
    <?php

    ?>
    
    <h3>    Quel est le réalisateur le plus présent dans le top100 ?</h3>
    <?php

    ?>
    
    <h3>    Combien cela coûterait-il d'acheter le top10 sur iTunes ? de le louer ?</h3>
    <?php

    ?>
    
    <h3>    Quel est le mois ayant vu le plus de sorties au cinéma ?</h3>
    <?php

    ?>
    
    <h3>    Quels sont les 10 meilleurs films à voir en ayant un budget limité ?</h3>
    <?php

    ?>
    

</body>
</html>