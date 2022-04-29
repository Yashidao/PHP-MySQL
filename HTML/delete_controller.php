<?php
require "index.php";
// on check si le btn est utiliser
if (isset($_POST['remove'])) {
    // on boucle dans le tableau pour savoir quel btn est utiliser
    foreach ($_POST['delete_row'] as $del) {
        // on delete de la db mais ATTENTION à la condition sinon tout est delete
        $sql_delete = "DELETE FROM weather
        WHERE ville = '$del'";
        // on se co a la db et on execute la requete
        $stmt2 = $db->prepare($sql_delete);
        $stmt2->execute();
    }
}
?>