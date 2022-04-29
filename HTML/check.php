<?php

$user = 'root';
$pass = '';



try {

    $db = new PDO('mysql:host=localhost;dbname=tuto;charset=utf8', $user, $pass);
    $resultat = $bd->query('SELECT * FROM meteo');

} catch (PDOException $e) {

    die('Erreur : ' . $e->getMessage());

}

?>
