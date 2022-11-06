<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/c20989b72b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <title>tableau</title>
    </head>
    <body> 
        <header>   
            <?php
            require_once('bdd.php'); 
            ?>

        <!-- 2)creer un formulaire d'incription avec le nom de la ville et le n°du departement pour ajouter une ville  -->
            
            <form action="ajouter.php" method="Get">
                <fieldset>
                    <legend>Formulaire d'inscription</legend>
                <label for="ville">Ville : </label>
                <input type="text" name="ville" id="ville" placeholder="nom de la ville" required><br>
                <label for="departement">Département : </label>
                <input type="number" name="departement" id="departement" placeholder="N° de departement"required minlength="2" maxlength="3"><br>
                <input type="submit" value="AJOUTER" width="30px">
                </fieldset> 
            </form> 
        </header>
<!-- 1) Afficher dans un tableau html les villes et codes postaux de chaque élément de la BD -->          
       
        <table class="t1">
            <caption><h1>Les villes de France</h1></caption>
            <thead>
                <tr> 
                    <th>Ville</th> 
                    <th>Code Postal</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>  
                </tr>
            </thead>
            <tbody>
              <?php
                $query="SELECT ville_nom,ville_code_postal,ville_id FROM villes_france_free" ;
                $reponse=$bdd->query($query);
                foreach ($reponse as $value) {?>
                    <tr> 
                        <td><?php echo $value['ville_nom'];?></td>
                        <td><?php echo $value['ville_code_postal'];?></td>
                        <td ><a href="supprimer.php?supprimer=<?php echo $value['ville_id']; ?>"> 
                        <!-- lien vers la page php qui traite la suppression
                             passage en parametre d'une nouvelle clé grace à ? cle="supprimer" et valeur="resultat de la requete SELECT" pour recuperer l'id-->
                            <i class="fa-solid fa-trash" style="color:black;"></i></a></td>   
                        <td ><a href="formmodifier.php?modifier=<?php echo $value['ville_id'];?>">
                        <!-- lien vers la page formulaire php qui prendra en compte les modifications
                             passage en parametre d'une nouvelle clé grace à ? cle="modifier" et valeur="resultat de la requete SELECT" pour recuperer l'id -->
                            <i class="fa-regular fa-pen-to-square" style="color:black;"></i></a></td> 
                    </tr> 
                <?php
                }?>    
                    
            </tbody>
        </table> 
    </body>
</html>


   
        
        
   

