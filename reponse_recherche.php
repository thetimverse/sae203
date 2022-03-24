<?php 
    require 'debut.html.php';
?>
    <link rel="shortcut icon" href="images/ashoka.png" type="image">
    <title>POP! Mania Catalogue</title>
</head>
<?php
    require 'header.php';
?>

<body>

    <h1>Résultats de votre recherche</h1>

    <section id="catalogue">

        <?php
            require 'lib_crud.inc.php';
            $co=connexionBD();

            if(!empty($_POST['license'])) {
                filter_var($_POST['license'], FILTER_SANITIZE_STRING);
                htmlentities($_POST['license']);
                afficherResultatRecherche($co);
            } 
            deconnexionBD($co);
        ?>

    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<?php require 'footer.php' ?>