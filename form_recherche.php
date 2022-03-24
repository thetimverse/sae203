<?php 
    require 'debut.html.php';
?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="parsley.min.js"></script>
    <link rel="stylesheet" href="styles/parsley.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/ashoka.png" type="image">
    
    <title>POP! Mania Recherche</title>
</head>

<?php
    require 'header.php';
?>

<body id="main-recherche">
    <main>


    <section id="recherche">
    <?php
        echo '<datalist id="license">';
                    // On va afficher ici la datalist
                    require 'lib_crud.inc.php';
                    $co=connexionBD();
                    genererDatalistMedia($co);
                    deconnexionBD($co);
        echo '</datalist>
        <datalist id="edition">';
                    // On va afficher ici la datalist
                    $bd=connexionBD();
                    genererDatalistEdition($bd);
                    deconnexionBD($bd);
        echo '</datalist>
        <datalist id="perso">';
                    // On va afficher ici la datalist
                    $bd=connexionBD();
                    genererDatalistPerso($bd);
                    deconnexionBD($bd);
        echo '</datalist>';
    ?>

    <h1>Trouvez vos futures POP! rares ici</h1>

    <div id="search">
    <form action="reponse_recherche_prix.php" method="POST" data-parsley-validate>
        <div id="prix_mini">
            <label class="prix-label" for="prix_mini">Prix minimum</label>
            <input type="text" id="prix_mini" name="prix_mini" placeholder="5" data-parsley-type="number">
        </div>
        <div id="prix_maxi">
            <label class="prix-label" for="prix_maxi">Prix maximum</label>
            <input type="text" id="prix_maxi" name="prix_maxi" placeholder="100" data-parsley-type="number">
        </div>
        <input class="btn btn-primary" type="submit" value="Rechercher" id="submit">
    </form>

    <form action="reponse_recherche_perso.php" method="POST">
        <div id="perso">
            <label for="perso">Cherchez un personnage</label>
            <input type="search" list="perso" id="perso" name="perso" autocomplete="off" placeholder="Hermione Granger..."/>
        </div>
    <input class="btn btn-primary" type="submit" value="Rechercher" id="submit">
    </form>

    <form action="reponse_recherche.php" method="POST">
        <div id="license">
            <label for="license">Cherchez une license</label>
            <input type="search" list="license" id="license" name="license" autocomplete="off" placeholder="Star Wars..."/>

        </div>
    <input class="btn btn-primary" type="submit" value="Rechercher" id="submit">
    </form>

    <form action="reponse_recherche_edition.php" method="POST">
        <div id="edition">
            <label for="edition">Cherchez une édition</label>
            <input type="search" list="edition" id="edition" name="edition" autocomplete="off" placeholder="Chase..."/>

        </div>
    <input class="btn btn-primary" type="submit" value="Rechercher" id="submit">
    </form>
    </div>

    </section>


    </main>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<?php require 'footer.php' ?>