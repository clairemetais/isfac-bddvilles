<!-- Mettre en place un fonctionnement pour pouvoir supprimer une ville -->
 <?php

// connexion a la base de donnée
require_once('bdd.php');

$id=$_GET['supprimer'];


$requete="SELECT ville_nom FROM villes_france_free WHERE ville_id=$id";
$reponse=$bdd->query($requete);

foreach ($reponse as $value) {
    $ville=$value['ville_nom'];
}
?>
<p>Nous avons supprimer <?php echo $ville;?> de notre base de donnée. <br>Bonne continuation sur notre site...</p>
<?php
// prepration de la requete
$query="DELETE FROM villes_france_free WHERE ville_id=$id LIMIT 1";

$execution=$bdd->exec($query);

?>
