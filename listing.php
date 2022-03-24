<?php 
    require 'debut.html.php';
?>

    <title>POP! Mania Catalogue</title>
    <link rel="shortcut icon" href="images/catwoman.png" type="image">
</head>


<body id="main-listing">
<?php
    require 'header.php';
?>
        <?php
            require('lib_crud.inc.php');
            $bdd = connexionBD();
        ?>

    <main>
        <h1>Retrouvez toutes nos POP! rares ici</h1>

        <section id="catalogue">
            <?php
                afficherCatalogue($bdd);
                deconnexionBD($bdd);
            ?> 
        </section>

    </main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<?php require 'footer.php' ?>
