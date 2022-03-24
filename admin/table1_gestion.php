<?php 
    require '../debut.html.php';
?>

    <title>POP! Mania</title>
    <link rel="shortcut icon" href="../images/freddy.png" type="image">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

    <?php require 'header_admin.php'; ?>

<div class="admin admin-tableau">
    <h1>Gestion des Funko POP!</h1>
    <br>
        <a class="bouton" href="table1_new_form.php">Ajouter une POP!</a><br>

    <div class="table">
        <?php
            require('../lib_crud.inc.php');
            $co = connexionBD();
            afficherListeFunko($co);
            deconnexionBD($co);
        ?>
    </div>
</div>

    <?php require '../footer.php' ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>