<!-- Créer un formulaire d’inscription (ville, département) et insérer cette nouvelle ville dans cette table. -->
<?php
require_once('bdd.php');

$ville=$_GET["ville"];
$departement=$_GET['departement'];

$query="INSERT INTO villes_france_free(ville_nom,ville_departement)VALUES('$ville','$departement')";

$execution=$bdd->exec($query);

?>