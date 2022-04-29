<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- l'action permet d'acceder à un autre ficher php en donnant le chemin d'accès -->
    <!-- la methode "post" empeche simplement de voir les infos dans la barre d'url -->
    <form action='delete_controller.php' method=post>
        <table>
            <tr>
                <th>Del</th>
                <th>Ville</th>
                <th>Haut</th>
                <th>Bas</th>
            </tr>
            <?php
            $user = 'root';
            $pass = '';
            // le try and catch permet de tester la connection user et d'avoir un message si c'est pas correcte
            try {
                $db = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', $user, $pass);
                // on stock dans une variable la db avec le nom de la db
                $resultat = $db->query('SELECT * FROM weather');
                // on fetch le resultat pour avoir un tableau
                $donnees = $resultat->fetch();
            } catch (PDOException $e) {
                // permet d'avoir le message d'erreur lier au problème
                die('Erreur : ' . $e->getMessage());
            }
            // permet de faire un boucle sur le tableau et on peut afficher dans l'html 
            while ($donnees = $resultat->fetch()) {
                // l'echo reprends tout l'html en mode "string"
                echo "
            <tr>
                <td>" . "<input type=checkbox name=delete_row[] value=" . $donnees["ville"] . ">" . "</td>
                <td>" . $donnees["ville"] . "</td>
                <td>" . $donnees["haut"] . "</td>
                <td>" . $donnees["bas"] . "</td>
            </tr>";
            }
            // il faut ABSOLUMENT que l'input soit dans un form puis reprendre les valeurs
            echo "</table>
            <input type=submit name=remove value=delete>
            </form>
            ";
            // permettant à la requête d'être de nouveau exécutée
            $resultat->closeCursor();
            ?>
            <p>Ajout d'information dans la DataBase:</p>
            <!-- idem, on part sur un autre ficher php du même nom avec le chemin -->
            <form action="submit_ville.php" method="post">
                <input type="text" name="ville" placeholder="nom de ville">
                <input type="text" name="haut" placeholder="T° max">
                <input type="text" name="bas" placeholder="T° min">
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
</body>

</html>