<?php 
    require '../debut.html.php';
?>

    <title>POP! Mania</title>
    <link rel="shortcut icon" href="../images/freddy.png" type="image">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
<?php 
    require 'header_admin.php';
?>


<div class="admin">
    <h1>Modifier une POP!</h1>
    <br>
    <a class="bouton" href="table1_gestion.php">Gestion des POP!</a><br>

    <?php
        require '../lib_crud.inc.php';

        $id=$_GET['num'];
        $co=connexionBD();
        $funko=getFunko($co, $id);
        // var_dump($funko);
        deconnexionBD($co);
    ?>

    <div class="form-gestion">
    <form action="table1_update_valide.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="num" value="<?= $id; ?>" />

            Nom : <input type="text" name="nom" value="<?php echo $funko['funko_nom']; ?>" required /><br />
            Numéro (#000) : <input type="text" name="numero" value="<?php echo $funko['funko_num']; ?>" required /><br />
	        Prix : <input type="number" name="prix" min="0.00" max="10000.00" step="0.01" value="<?php echo $funko['funko_prix']; ?>" required /><br />
	        Année : <input type="number" name="annee" min="-5000" max="3000" value="<?php echo $funko['funko_date']; ?>" required /><br />
	        Couleur : <input type="text" name="couleur" value="<?php echo $funko['funko_couleur']; ?>" required /><br />
            Matériau : <input type="text" name="materiau" value="<?php echo $funko['funko_materiau']; ?>" required /><br />
            <!-- ajouter le même principe que média sur taille normalement!!! -->
            Taille (en cm) : <select name="taille" required>
                <option value="choisir">--Choisissez une valeur--</option>
                <option value="10">10</option>
                <option value="25">25</option>
            </select><br />
            Lien d'achat : <input type="text" name="lien" value="<?php echo $funko['funko_lien']; ?>" required /><br />
	        Photo : <input type="file" name="photo" class="input-long" required /><br />
                La photo doit être changée ou réuploadée. <br>
                Ancienne photo : <img src="../images/uploads/<?php echo $funko['funko_photo']; ?>" alt="Funko de <?php echo $funko['funko_nom']; ?>"><br>
	        Média d'origine et édition : <select name="media" class="input-long" required>
                <?php
                    $co=connexionBD();
                    afficherMediasOptionsSelectionne($co, $funko['_type_id']);
                    deconnexionBD($co);
                ?>
	        </select><br /> 
            <a href="table2_gestion.php">Gestion des catégories de Funko POP!</a><!-- pour ajouter un nouveau media/edition c'est à ajouter dans la table 2 -->
	        <input id="submit" class="buttons" type="submit" value="Modifier" />
    </form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<?php require '../footer.php' ?>

</html>