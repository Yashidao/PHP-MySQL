<?php
// le require recupère le fichier nommer
require "index.php";
// on recupère les valeurs pris des btn pour les mettre dans des variables
$ville = $_POST['ville'];
$haut = $_POST['haut'];
$bas = $_POST['bas'];

// cette portion sert pour inserer dans un db les valeurs que je veux
$sql = "INSERT INTO weather (ville, haut, bas)
    VALUES (:ville, :haut, :bas)";
// on lance la preparation en PDO
$stmt = $db->prepare($sql);
// on execute le code pour valider la requete
$stmt->execute(['ville' => $ville, 'haut' => $haut, 'bas' => $bas]);
// la balise de fin n'est pas necesaire
?>