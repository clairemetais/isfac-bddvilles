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
        
    <?php
     require_once('bbd.php'); 
     ?>

<!-- 2)creer un formulaire d'incription avec le nom de la ville et le n°du departement pour ajouter une ville  -->
      
    <form action="ajouter.php" method="Get">
        <fieldset>
            <legend>Formulaire d'inscription</legend>
        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville" placeholder="nom de la ville" ><br>
        <label for="departement">departement</label>
        <input type="number" name="departement" id="departement" placeholder="numero de departement"><br>
        <input type="submit" value="AJOUTER">
        </fieldset> 
    </form> 

<!-- 1) Afficher dans un tableau html les villes et codes postaux de chaque élément de la BD -->          
        <table >
            <caption><h1>Les villes de France</h1></caption>
            <thead>
                <tr> 
                    <th>Supprimer</th>
                    <th>Modifier</th>
                    <th>Ville</th> 
                    <th>code Postal</th>   
                </tr>
            </thead>
            <tbody>
               
              <?php

                $query="SELECT ville_nom,ville_code_postal,ville_id FROM villes_france_free" ;
                $reponse=$bdd->query($query);

                foreach ($reponse as $value) {?>
                    <tr> 
                        <td ><a href="supprimer.php?supprimer=<?php echo $value['ville_id']; ?>"> 
                        <!-- lien vers la page php qui traite la suppression
                             passage en parametre d'une nouvelle clé grace à ? cle="supprimer" et valeur="resultat de la requete SELECT" pour recuperer l'id-->
                            <i class="fa-solid fa-trash" style="color:black;"></i></a></td>   
                        <td ><a href="formmodifier.php?modifier=<?php echo $value['ville_id'];?>">
                        <!-- lien vers la page formulaire php qui prendra en compte les modifications
                             passage en parametre d'une nouvelle clé grace à ? cle="modifier" et valeur="resultat de la requete SELECT" pour recuperer l'id -->
                            <i class="fa-regular fa-pen-to-square" style="color:black;"></i></a></td>
                        <td><?php echo $value['ville_nom'];?></td>
                        <td><?php echo $value['ville_code_postal'];?></td>  
                    <?php
                }
                ?>
                        
                    </tr>
            </tbody>
        </table> 
    </body>
</html>


   
        
        
   

