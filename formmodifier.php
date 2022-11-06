<!-- Mettre en place un fonctionnement pour pouvoir modifier le code postal d’une ville -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/c20989b72b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <title>tableau</title>
    </head>

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
    <fieldset>
        <legend>Mise à jour du code postal</legend>
        <label for="ville">Vous avez selectionné : </label>
        <input type="text" name="ville" id="ville" value="<?php echo $VILLE; ?>" required>
        <label for="codepostal">Code postal : </label>
        <input type="number" name="codepostal" id="codepostal" value="<?php echo $CODEPOSTAL; ?>"required><br>
        <input type="submit" value="Modifier">
        <input type="hidden" name="id" value="<?php echo $id;?>">
    </fieldset>
</form> 