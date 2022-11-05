<!-- Mettre en place un fonctionnement pour pouvoir modifier le code postal d’une ville -->
<?php
require_once('stringconnect.php');

$id=$_GET['id'];
$codepostal=$_GET['codepostal'];

$query="UPDATE villes_france_free SET ville_code_postal=$codepostal WHERE ville_id=$id LIMIT 1";
$execution=$bdd->exec($query);

?> 