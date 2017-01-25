
<?php 
$reponse1 = selection($bdd,'obj_connectes', '*','','');
$reponse2 = selection ($bdd,'obj_connectes', '*','','');
  
  
  // c'est ma boucle principale qui parcoure toute la base de donnée des objets connectés
  while ($donnees1 = $reponse1->fetch() and $donnees2 = $reponse2->fetch())
  { 
    $donnees1['id'] == $donnees2['id'];
    // je met cette egalité pour que les deux vriables prenne bien en compte le meme objet connecté en meme temps
    
  
    // c'est la condition des catégorie (1=temperature , 2= lumiere ,3 = securite)
    if ($donnees1['id_categorie_objets_connectes'] == 1)
    {
      //cette condition est ssentielle pour ne pas diviser par un denominateur plus grand que le numerateur ce qui fausserait la condtion suivante , de meme on ne divise pas par 0
      if ($donnees1['donnee_recue'] > $donnees1['donnee_demandee'] and $donnees1['donnee_demandee'] != 0 )
      {
        
        if ((($donnees1['donnee_recue']+$donnees1['seuil_erreur'])/$donnees1['donnee_demandee']) > 1 and (($donnees1['donnee_recue']-$donnees1['seuil_erreur'])/$donnees1['donnee_demandee']) > 1)
        {
          $nb_modifs = update($bdd,'obj_connectes','etat','\'disfonctionnement\'','id', $donnees1['id']);
          echo 'Il y\'a un problème au niveau de ' . $donnees1['nom']; ?>  </br> <?php

        }
        else
        {
          $nb_modifs = update($bdd, 'obj_connectes','etat','\'fonctionne\'', 'id', $donnees1['id']);
          
        }
      }
      elseif ($donnees1['donnee_recue'] <= $donnees1['donnee_demandee'] and $donnees1['donnee_recue'] != 0 )
      {
      
        if ((($donnees1['seuil_erreur']+$donnees1['donnee_demandee'])/$donnees1['donnee_recue']) >1 and (($donnees1['seuil_erreur']+$donnees1['donnee_demandee'])/$donnees1['donnee_recue']) >1)
        {
          $nb_modifs = $nb_modifs = update($bdd,'obj_connectes','etat','\'disfonctionnement\'','id', $donnees1['id']);
          echo 'Il y\'a un problème au niveau de ' . $donnees1['nom']; ?>  </br> <?php
        }
        else
        {
          $nb_modifs = update($bdd, 'obj_connectes','etat','\'fonctionne\'', 'id', $donnees1['id']);
          
        }
      }
      // le dernier else c'est si la valeur vaut 0
      else {
        echo 'Il y\'a un problème au niveau de ' . $donnees1['nom'] . ', la valeur est de 0'; ?>  </br> <?php
      }
    
    }
    
  
    
    if ($donnees1['id_categorie_objets_connectes'] == 2)
    {
      // comme ceux sont plus des nombres on se casse pas la tete on met une condition degalité 
      if ($donnees1['donnee_recue'] != $donnees1['donnee_demandee'])
      {
        $nb_modifs = $nb_modifs = update($bdd,'obj_connectes','etat','\'disfonctionnement\'','id', $donnees1['id']);
        echo 'Il y\'a un problème au niveau de '. $donnees1['nom']; ?>  </br> <?php
      }
      else
      {
        $nb_modifs = update($bdd, 'obj_connectes','etat','\'fonctionne\'', 'id', $donnees1['id']);
        
      }
      
      
    }
  
    
  
    if ($donnees1['id_categorie_objets_connectes'] == 3)
    {
      
      
      
      if ($donnees1['donnee_recue'] != $donnees1['donnee_demandee'])

      {
        $nb_modifs = $nb_modifs = update($bdd,'obj_connectes','etat','\'disfonctionnement\'','id', $donnees1['id']);
        echo 'Il y\'a un problème au niveau du/de ' . $donnees1['nom']; ?>  </br> <?php
      }
      else
      {
        $nb_modifs = update($bdd, 'obj_connectes','etat','\'fonctionne\'', 'id', $donnees1['id']);
      } 
      
    }
  } 
  
    //mettre la commande javascript 
  $reponse1->closeCursor() and $reponse2->closeCursor();

// Fin Verification de l'état des capteurs 
?>
