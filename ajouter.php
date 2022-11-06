<!-- Créer un formulaire d’inscription (ville, département) et insérer cette nouvelle ville dans cette table. -->
<?php
require_once('bdd.php');

if(!isset($_GET['ville']) || !isset($_GET['departement'])){
    if(empty($_GET['ville'])||($_GET['departement'])){
    echo "Merci de saisir un nom de ville ainsi qu'un numero de departement";
    }
}

$ville=$_GET["ville"];
$departement=$_GET['departement'];

$query="INSERT INTO villes_france_free(ville_nom,ville_departement)VALUES('$ville','$departement')";

$execution=$bdd->exec($query);

?>
<p>Nous avons ajouter <?php echo $ville?> à notre base de données.
<br>Merci de votre collaboration.
 <br>Bonne continuation sur notre site...</p>