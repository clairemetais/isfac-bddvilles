<!-- Mettre en place un fonctionnement pour pouvoir supprimer une ville -->
 <?php

// connexion a la base de donnée
require_once('bdd.php');

$id=$_GET['supprimer'];

// prepration de la requete
$query="DELETE FROM villes_france_free WHERE ville_id=$id LIMIT 1";

$execution=$bdd->exec($query);

?>