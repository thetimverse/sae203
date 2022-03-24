<?php 
    require '../debut.html.php';
?>

    <title>POP! Mania</title>
    <link rel="shortcut icon" href="../images/harry.png" type="image">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
<?php 
    require 'header_admin.php';
?>

<div class="admin">
    <h1>Ajouter une catégorie de POP!</h1>
    <br>
    <?php
	        require '../lib_crud.inc.php';
	
            $id=$_POST['num'];
	        $media=$_POST['media'];
            $edition=$_POST['edition'];
	        $taille=$_POST['taille'];
	        var_dump($_POST);
	        var_dump($_FILES);
	
	        $co=connexionBD();
	        modifierType($co, $id, $media, $edition, $taille)."\n";
	        deconnexionBD($co);
	    ?>
    <a class="bouton" href="table2_gestion.php">Gestion des catégories</a><br>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<?php require '../footer.php' ?>

</html>