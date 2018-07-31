<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        $string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
        $dico = explode("\n", $string);

        /*foreach ($dico as $mot) {
            echo $mot."  ";
        }*/
    ?>
    <h3>Combien de mots contient ce dictionnaire ?</h3>
    <?php
        echo count($dico);
    ?>

    <h3>Combien de mots font exactement 15 caractères ?</h3>
    <?php
        $j=0;
        foreach ($dico as $mot) {
            
            if (strlen($mot)===15) {
                $j++;
                //echo $mot."  ";
            };
        }
        echo "<br>".$j."<br>";
    ?>

    <h3>Combien de mots contiennent la lettre « w » ?</h3>
    <?php
        $k=0;
        foreach ($dico as $mot) {
            if (stripos($mot, "w")) {
                $k++;
            };
        }
        echo "<br>".$k."<br>";
    ?>

    <h3>Combien de mots finissent par la lettre « q » ?</h3>
    <?php
        $l=0;
        foreach ($dico as $mot) {
            if(substr($mot,-1)==="q"){
                $l++;
            };
        }
        echo $l;
        
    ?>
</body>
</html>
