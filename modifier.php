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

$id=$_GET['id'];
$ville=$_GET['ville'];
$codepostal=$_GET['codepostal'];

$query="UPDATE villes_france_free SET ville_code_postal=$codepostal WHERE ville_id=$id LIMIT 1";
$execution=$bdd->exec($query);

?> 

<p>Merci d'avoir effectuer la mise à jour du code postal de <?php echo $ville;?>. <br>Bonne continuation sur notre site...</p>