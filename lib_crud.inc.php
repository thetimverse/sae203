<?php
    // fichier d'infos de connexion
    require 'secretxyz123.inc.php';

// connexion à la base de données
function connexionBD() {
        // on initialise la variable de connexion à null
        $bdd = null;
        try {
        // on essaie de se connecter
        $bdd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', UTILISATEUR, MOTDEPASSE);
        // on passe le codage en utf-8
        $bdd->query('SET NAMES utf8;');
        } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
        }
        // on retourne la variable de connexion
        return $bdd;
    }


// déconnexion de la base de données
function deconnexionBD(&$bdd) {
        // on se déconnexte en mettant la variable de connexion à null 
        $bdd=null;
    }



function afficherCatalogue($bdd){
        $req = "SELECT * FROM funkos INNER JOIN types ON funkos._type_id = types.type_id";
        try {
            $resultat = $bdd->query($req);
        } catch (PDOException $e){
            // s'il y a une erreur on affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        foreach ($resultat as $value) {
            echo '<article id="'.$value['type_media'].'">
                    <a href="#">
                        <img src="images/uploads/'.$value['funko_photo'] . '" alt="Photo de la Funko '.$value['funko_nom'].'">';
            echo '<div class="infos">
                    <h3>' .$value['funko_num'].' - '. $value['funko_nom']. '</h3>';
            echo '<h4>Édition : '.$value['type_edition'].'</h4>';
            echo '<h4>'.$value['type_media'].'</h4>';
            echo '<p>'.$value['funko_date'].' - '.$value['funko_couleur'].' - '.$value['type_taille'].' cm</p></div>';
            echo '<div class="prix">'.$value['funko_prix'].' € </div>';
            echo '<a class="buttons" href="'.$value['funko_lien'].'">Acheter</a></a>';
            echo '</article>';
        }
    }


function afficherListeFunko($bdd) {
        $req = "SELECT * FROM funkos INNER JOIN types ON funkos._type_id = types.type_id";
        try {
            $resultat = $bdd->query($req);
        } catch (PDOException $e){
            // s'il y a une erreur on affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
                echo '<th>Photo</th><th>Nom</th><th>Numéro</th><th>Prix</th><th>Année de sortie</th><th>Couleur</th><th>Matériau</th><th>Lien d\'achat</th><th>Modifier</th><th>Supprimer</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($resultat as $value) {
            echo '<tr>' ;
            echo '<td class="image-table"><img src="../images/uploads/'.$value["funko_photo"] . '" alt="'.$value["funko_nom"].'"></td>';
            echo '<td>' . $value["funko_nom"] . '</td>';
            echo '<td>' . $value["funko_num"] . '</td>';
            echo '<td>'. $value["funko_prix"]. '</td>';
            echo '<td>' . $value["funko_date"] . '</td>';
            echo '<td>' . $value["funko_couleur"] . '</td>';
            echo '<td>' . $value["funko_materiau"] . '</td>';
            echo '<td>' . $value["funko_lien"] . '</td>';
            echo '<td> <a class="actions" href="table1_update_form.php?num='.$value["funko_id"].'" > Modifier </a> </td>';
            echo '<td> <a class="actions suppr" href="table1_delete.php?num='.$value["funko_id"].'" > Supprimer </a> </td>';
            echo '</tr>';
        }
        '</tbody></table>';
    }



function afficherListeType($bdd) {
        $req = "SELECT * FROM types";
        try {
            $resultat = $bdd->query($req);
        } catch (PDOException $e){
            // s'il y a une erreur on affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
                echo '<th>Média d\'origine</th><th>Édition</th><th>Taille</th><th>Modifier</th><th>Supprimer</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($resultat as $value) {
            echo '<tr>' ;
            echo '<td>' . $value["type_media"] . '</td>';
            echo '<td>' . $value["type_edition"] . '</td>';
            echo '<td>'. $value["type_taille"]. '</td>';
            echo '<td> <a class="actions" href="table2_update_form.php?num='.$value["type_id"].'" > Modifier </a> </td>';
            echo '<td> <a class="actions suppr" href="table2_delete.php?num='.$value["type_id"].'" > Supprimer </a> </td>';
            echo '</tr>';
        }
        '</tbody></table>';
    }



// afficher les medias dans des champs "option"
function afficherMediaOptions($bdd) {
        // on sélectionne tous les medias de la table medias
        $req = "SELECT * FROM types";
        try {
            $resultat = $bdd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // pour chaque auteur, on met son id, son prénom et son nom 
        // dans une balise <option>
        foreach ($resultat as $value) {
            echo '<option value="'.$value['type_id'].'">'; // id de l'auteur
            echo $value['type_media'].' '.$value['type_edition']; // prénom espace nom
            echo '</option>'."\n";
        }
    }




// fonction d'ajout d'une BD dans la table bande_dessinees
function ajouterFunko($bdd, $numero, $nom, $nouvelleImage, $prix, $annee, $couleur, $materiau, $lien, $media){
        $req = 'INSERT INTO funkos (funko_num, funko_nom, funko_photo, funko_prix, funko_date, funko_couleur, funko_materiau, funko_lien, _type_id) 
                VALUES             ("'.$numero.'", "'.$nom.'", "'.$nouvelleImage.'", '.$prix.', '.$annee.', "'.$couleur.'", "'.$materiau.'", "'.$lien.'", "'.$media.'")';
        // echo '<p>' . $req . '</p>' . "\n";
        // try {
            $resultat = $bdd->query($req);
        // } catch (PDOException $e) {
        //     // s'il y a une erreur, on l'affiche
        //     echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        //     die();
        // }
        if ($resultat->rowCount() == 1) {
            echo '<h2>La Funko POP! "'.$numero.' - '.$nom.'" a été ajoutée au catalogue.</h2>' . "\n";
        } else {
            echo '<h4>Erreur lors de l\'ajout.</h4>' . "\n";
            die();
        }
    }


    
function ajouterType($bdd, $media, $edition, $taille){
        $req = 'INSERT INTO types (type_media, type_edition, type_taille) 
                VALUES             ("'.$media.'", "'.$edition.'", '.$taille.')';

            $resultat = $bdd->query($req);

        if ($resultat->rowCount() == 1) {
            echo '<h2>La catégorie de POP! "'.$media.' - '.$edition.'" a été ajoutée dans la table.</h2>' . "\n";
        } else {
            echo '<h4>Erreur lors de l\'ajout.</h4>' . "\n";
            die();
        }
    }



// fonction d'effacement d'une BD
function effacerFunko($bdd, $id) {
        $req = 'DELETE FROM funkos WHERE funko_id ='.$id;
            $resultat = $bdd->query($req);

        if ($resultat->rowCount()==1) {
            echo '<h2>La Funko POP! '.$id.' a été supprimée du catalogue.</h2>'."\n";
        } else {
            echo '<h4>Erreur lors de la suppression.</h4>'."\n";
            die();
        }
    }


// fonction d'effacement d'une BD
function effacerCategorie($bdd, $id) {
        $req = "DELETE FROM types WHERE type_id =".$id;
            $resultat = $bdd->query($req);

        if ($resultat->rowCount()==1) {
            echo '<h2>La catégorie '.$id.' a été supprimée du catalogue.</h2>'."\n";
        } else {
            echo '<h4>Erreur lors de la suppression.</h4>'."\n";
            die();
        }
    }


    
// fonction de récupération des informations d'une BD
function getFunko($bdd, $idFunko) {
        $req = 'SELECT * FROM funkos WHERE funko_id='.$idFunko;
        try {
            $resultat = $bdd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // la fonction retourne le tableau associatif 
        // contenant les champs et leurs valeurs
        return $resultat->fetch();
    }

// fonction de récupération des informations d'une BD
function getCategorie($bdd, $id) {
        $req = 'SELECT * FROM types WHERE type_id='.$id;
        echo '<p>GetCategorie() : '.$req.'</p>'."\n";
        try {
            $resultat = $bdd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // la fonction retourne le tableau associatif 
        // contenant les champs et leurs valeurs
        return $resultat->fetch();
    }

    
// afficher le "bon" media parmi les medias
// dans les balises "<option>"
function afficherMediasOptionsSelectionne($bdd, $idFunko) {
        $req = "SELECT * FROM types";
        try {
            $resultat = $bdd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        foreach ($resultat as $value) {
            echo '<option value="'.$value['type_id'].'"';
            if ($value['type_id'] == $idFunko) {
                echo ' selected="selected"';
            }
            echo '>';
            echo $value['type_media'].' '.$value['type_edition'];
            echo '</option>'."\n";
        }
    }



// fonction de modification d'une BD dans la table bande_dessinees
function modifierFunko($bdd, $id, $numero, $nom, $nouvelleImage, $prix, $annee, $couleur, $materiau, $lien, $media){
        $req = 'UPDATE funkos 
                SET 
                    funko_num="'.$numero.'", funko_nom="'.$nom.'", funko_photo="'.$nouvelleImage.'", funko_prix='.$prix.', funko_date='.$annee.', funko_couleur="'.$couleur.'", funko_materiau="'.$materiau.'", funko_lien="'.$lien.'", _type_id="'.$media.'" 
                WHERE funko_id='.$id;
        // try {
            $resultat = $bdd->query($req);
        // } catch (PDOException $e) {
        //     // s'il y a une erreur, on l'affiche
        //     echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        //     die();
        // }
        if ($resultat->rowCount() == 1) {
            echo '<h2>La Funko POP! "'.$numero.' - '.$nom.'" a été modifiée.</h2>' . "\n";
        } else {
            echo '<h4>Erreur lors de la modification.</h4>' . "\n";
            die();
        }
    }


// fonction de modification d'une catégorie dans la table types
function modifierType($bdd, $id, $media, $edition, $taille){
        $req = "UPDATE types 
                SET 
                    type_media='".$media."', type_edition='".$edition."', type_taille=".$taille." 
                WHERE type_id='".$id."'";
        // try {
            $resultat = $bdd->query($req);
        // } catch (PDOException $e) {
        //     // s'il y a une erreur, on l'affiche
        //     echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        //     die();
        // }
        if ($resultat->rowCount() == 1) {
            echo '<h2>La catégorie "'.$media.' - '.$edition.'" a été modifiée.</h2>' . "\n";
        } else {
            echo '<h4>Erreur lors de la modification.</h4>' . "\n";
            die();
        }
    }




// Génération de la liste des auteurs dans le formulaire de recherche
function genererDatalistMedia($bdd) {
        // $req = "SELECT type_media, type_edition FROM types";
        // try {
        //     $resultat = $bdd->query($req);
        // } catch (PDOException $e) {
        //     // s'il y a une erreur, on l'affiche
        //     echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        //     die();
        // }
        // // pour chaque auteur, on met son nom et prénom dans une balise <option>
        // foreach ($resultat as $value) {
            echo '<option value="Harry Potter"><option value="Star Wars"><option value="Marvel"><option value="DC Comics"><option value="Stranger Things"><option value="Disney"><option value="Black Widow"><option value="Game of Thrones"><option value="The 100"><option value="The Legend of Korra">'; 
        // } 
    }

// Génération de la liste des auteurs dans le formulaire de recherche
function genererDatalistPerso($bdd) {
    $req = "SELECT funko_nom FROM funkos";
    try {
        $resultat = $bdd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // pour chaque auteur, on met son nom et prénom dans une balise <option>
    foreach ($resultat as $value) {
        echo '<option value="'.$value['funko_nom'].'">'; 
    } 
}

// Génération de la liste des auteurs dans le formulaire de recherche
function genererDatalistEdition($bdd) {
    // $req = "SELECT type_edition FROM types";
    // try {
    //     $resultat = $bdd->query($req);
    // } catch (PDOException $e) {
    //     // s'il y a une erreur, on l'affiche
    //     echo '<p>Erreur : ' . $e->getMessage() . '</p>';
    //     die();
    // }
    // // pour chaque auteur, on met son nom et prénom dans une balise <option>
    // foreach ($resultat as $value) {
        echo '<option value="Standard"><option value="Édition spéciale"><option value="Convention exclusive"><option value="Supersized"><option value="Chase"><option value="Art Series"><option value="Exclusive">'; 
    } 




// affichage des resultats de recherche
function afficherResultatRecherche($bdd) {
    $req = "SELECT * FROM funkos 
            INNER JOIN types 
            ON funkos._type_id = types.type_id
            WHERE type_media LIKE '%".$_POST['license']."%'";
            echo '<article class="search-result"><h3>Votre recherche : </h3>'."\n".'<br><h4> '.$_POST['license'].'</h4></article>';
    try {
        $resultat = $bdd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<article>
                <a href="#">
                    <img src="images/uploads/'.$value['funko_photo'] . '" alt="Photo de la Funko '.$value['funko_nom'].'">';
        echo '<div class="infos">
                <h3>' .$value['funko_num'].' - '. $value['funko_nom']. '</h3>';
        echo '<h4>Édition : '.$value['type_edition'].'</h4>';
        echo '<h4>'.$value['type_media'].'</h4>';
        echo '<p>'.$value['funko_date'].' - '.$value['funko_couleur'].' - '.$value['type_taille'].' cm</p></div>';
        echo '<div class="prix">'.$value['funko_prix'].' € </div>';
        echo '<a class="buttons" href="'.$value['funko_lien'].'">Acheter</a></a>
        </article>';
    }
}


// affichage des resultats de recherche
function afficherResultatRecherchePrix($bdd) {
    $req = "SELECT * FROM funkos 
            INNER JOIN types 
            ON funkos._type_id = types.type_id
            WHERE funko_prix BETWEEN ".$_POST['prix_mini']." AND ".$_POST['prix_maxi']."";
    echo '<article class="search-result"><h3>Votre recherche : </h3><br><h4> '.$_POST['prix_mini'].' € - '.$_POST['prix_maxi'].' €</h4></article>';
    try {
        $resultat = $bdd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<article>
                <a href="#">
                    <img src="images/uploads/'.$value['funko_photo'] . '" alt="Photo de la Funko '.$value['funko_nom'].'">';
        echo '<div class="infos">
                <h3>' .$value['funko_num'].' - '. $value['funko_nom']. '</h3>';
        echo '<h4>Édition : '.$value['type_edition'].'</h4>';
        echo '<h4>'.$value['type_media'].'</h4>';
        echo '<p>'.$value['funko_date'].' - '.$value['funko_couleur'].' - '.$value['type_taille'].' cm</p></div>';
        echo '<div class="prix">'.$value['funko_prix'].' € </div>';
        echo '<a class="buttons" href="'.$value['funko_lien'].'">Acheter</a></a>
        </article>';
    }
}

// affichage des resultats de recherche
function afficherResultatRechercheEdition($bdd) {
    $req = "SELECT * FROM funkos 
            INNER JOIN types 
            ON funkos._type_id = types.type_id
            WHERE type_edition LIKE '%".$_POST['edition']."%'";
            echo '<article class="search-result"><h3>Votre recherche : </h3>'."\n".'<br><h4> '.$_POST['edition'].'</h4></article>';
    try {
        $resultat = $bdd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<article>
                <a href="#">
                    <img src="images/uploads/'.$value['funko_photo'] . '" alt="Photo de la Funko '.$value['funko_nom'].'">';
        echo '<div class="infos">
                <h3>' .$value['funko_num'].' - '. $value['funko_nom']. '</h3>';
        echo '<h4>Édition : '.$value['type_edition'].'</h4>';
        echo '<h4>'.$value['type_media'].'</h4>';
        echo '<p>'.$value['funko_date'].' - '.$value['funko_couleur'].' - '.$value['type_taille'].' cm</p></div>';
        echo '<div class="prix">'.$value['funko_prix'].' € </div>';
        echo '<a class="buttons" href="'.$value['funko_lien'].'">Acheter</a></a>
        </article>';
    }
}

// affichage des resultats de recherche
function afficherResultatRecherchePerso($bdd) {
    $req = "SELECT * FROM funkos 
            INNER JOIN types 
            ON funkos._type_id = types.type_id
            WHERE funko_nom LIKE '%".$_POST['perso']."%'";
            echo '<article class="search-result"><h3>Votre recherche : </h3>'."\n".'<br><h4> '.$_POST['perso'].'</h4></article>';
    try {
        $resultat = $bdd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<article>
                <a href="#">
                    <img src="images/uploads/'.$value['funko_photo'] . '" alt="Photo de la Funko '.$value['funko_nom'].'">';
        echo '<div class="infos">
                <h3>' .$value['funko_num'].' - '. $value['funko_nom']. '</h3>';
        echo '<h4>Édition : '.$value['type_edition'].'</h4>';
        echo '<h4>'.$value['type_media'].'</h4>';
        echo '<p>'.$value['funko_date'].' - '.$value['funko_couleur'].' - '.$value['type_taille'].' cm</p></div>';
        echo '<div class="prix">'.$value['funko_prix'].' € </div>';
        echo '<a class="buttons" href="'.$value['funko_lien'].'">Acheter</a></a>
        </article>';
    }
}