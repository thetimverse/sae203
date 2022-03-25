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
    <h1>Ajouter une POP!</h1>
    <br>
    <?php
	        require '../lib_crud.inc.php';
	
			$id=$_POST['num'];
	        $nom=$_POST['nom'];
            $numero=$_POST['numero'];
	        $prix=$_POST['prix'];
	        $annee=$_POST['annee'];
	        $couleur=$_POST['couleur'];
	        $materiau=$_POST['materiau'];
	        $taille=$_POST['taille'];
            $lien=$_POST['lien'];
            $media=$_POST['media'];


            $imageType=$_FILES["photo"]["type"];
	        if ( ($imageType != "image/png") &&
	            ($imageType != "image/jpg") &&
	            ($imageType != "image/jpeg") ) {
	                echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
	                echo 'Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
	                die();
	        }

            $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];
	
	        if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
	            if(!move_uploaded_file($_FILES["photo"]["tmp_name"], 
	            "../images/uploads/".$nouvelleImage)) {
	                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
	                die();
	            }
	        } else {
	            echo '<p>Problème : image non chargée...</p>'."\n";
	            die();
	        }
	
	        $co=connexionBD();
	        modifierFunko($co, $id, $numero, $nom, $nouvelleImage, $prix, $annee, $couleur, $materiau, $lien, $media)."\n";
	        deconnexionBD($co);
	    ?>
    <a class="bouton" href="table1_gestion.php">Gestion des POP!</a><br>
	<a class="bouton" href="../listing.php">Catalogue</a><br>
</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<?php require '../footer.php' ?>

</html>