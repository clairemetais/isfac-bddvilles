<!DOCTYPE html>
<html lang="en">
  
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
                <input type="number" name="departement" id="departement" placeholder="N° de departement" required><br>
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
                 // on determine le nombre de lignes de la base de données qu'on affecte comme le nombre d'id total puis on execute la requete
                 $sql="SELECT COUNT(*) AS nbredeville FROM villes_france_free";
                $query=$bdd->query($sql);
        //  on recupere le nbre de ligne grace a fetch
                $result= $query->fetch();
                $nbredeville=(int) $result['nbredeville'];
        // on determine le nombre de resultat /page et le numero de page du debut
                $parpage=10;
                $curentpage=1;
             // recuperer ce qu'on veut qu'il affiche par nombre d'articles.Ici 10. 0=point de depart, 10 = incrementation
                $query="SELECT ville_nom,ville_code_postal,ville_id FROM villes_france_free ORDER BY ville_nom LIMIT ".(($curentpage-1)*$parpage).",$parpage" ;
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
        <footer>
        <?php             
        // on calcule le nbre de page en totalité(ceil permet d'arrondir au nbre superieur)
            $nbredepage=ceil($nbredeville/$parpage);

            If(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<$nbredepage){
                $curentpage=$_GET['p'];
            }else{
                $curentpage=1;
            }
        // mise en place de la pagination
            for ($i=1; $i <=$nbredepage ; $i++) { 
                if ($i===$curentpage){
                    echo "$i";
                }
                echo "<a href=\"index.php?p=$i\">/$i/</a>";
            }
        ?>
        </footer>   
    </body>
</html>


   
        
        
   

