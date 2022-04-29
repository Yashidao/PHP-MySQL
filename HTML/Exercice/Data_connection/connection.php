<?php
$user = 'root';
$pass = '';

// le try and catch permet de tester la connection user et d'avoir un message si c'est pas correcte
try {
    $db = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', $user, $pass);
    // on stock dans une variable la db avec le nom de la db
    $resultat = $db->query('SELECT * FROM weather');
    // on fetch le resultat pour avoir un tableau
    $donnees = $resultat->fetch();
} catch (PDOException $e) {
    // permet d'avoir le message d'erreur lier au problème
    die('Erreur : ' . $e->getMessage());
}
