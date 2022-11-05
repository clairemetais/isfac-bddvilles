<!-- Mettre en place un fonctionnement pour pouvoir modifier le code postal d’une ville -->
<?php
require_once('bdd.php');

$id=$_GET['modifier'];

$requete="SELECT ville_nom,ville_code_postal FROM villes_france_free WHERE ville_id=$id";
$reponse=$bdd->query($requete);

foreach ($reponse as $value) {                         
    $VILLE=$value['ville_nom'];
    $CODEPOSTAL=$value['ville_code_postal'];  
}
?>

<form action="modifier.php" method="get">
    <label for="ville">Ville</label>
    <input type="text" name="ville" id="ville" value="<?php echo $VILLE; ?>" >
    <label for="codepostal">Codepostal</label>
    <input type="number" name="codepostal" id="codepostal" value="<?php echo $CODEPOSTAL; ?>">
    <input type="submit" value="Modifier">
    <input type="hidden" name="id" value="<?php echo $id;?>">
</form> 