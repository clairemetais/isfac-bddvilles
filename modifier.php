<!-- Mettre en place un fonctionnement pour pouvoir modifier le code postal d’une ville -->

<?php
require_once('bdd.php');

if(!isset($_GET['ville']) || !isset($_GET['codepostal'])){
    if(empty($_GET['ville'])||($_GET['codepostal'])){
    echo "Merci de saisir un nom de ville ainsi qu'un code postal";
    }
}
$id=$_GET['id'];
$ville=$_GET['ville'];
$codepostal=$_GET['codepostal'];

$query="UPDATE villes_france_free SET ville_code_postal=$codepostal WHERE ville_id=$id LIMIT 1";
$execution=$bdd->exec($query);

?> 

<p>Merci d'avoir effectuer la mise à jour du code postal de <?php echo $ville;?>. <br>Bonne continuation sur notre site...</p>