<?php 
    require 'debut.html.php';
?>

    <title>POP! Mania</title>
    <link rel="shortcut icon" href="images/groot.png" type="image">
</head>


<body>
<?php
    require 'header.php';
?>
    <main id="main-home">
    <section id="home">
        <!-- <div id="left"></div> -->
        <h1>Bienvenue sur POP! Mania</h1>
        <h2>Le site de référence des POP! rares</h2>
        
        <!-- <div id="right"></div> -->
    </section>
    <section id="buttons">
        <a class="buttons" href="listing.php">Catalogue</a>
        <a class="buttons" href="form_recherche.php">Recherche</a>
    </section>

    <section id="showcase">
        <a href="listing.php#Marvel"><div class="showcase">
            <h5>Marvel</h5>
        </div></a>
        <a href="listing.php#DC Comics"><div class="showcase">
            <h5>DC Comics</h5>
        </div></a>
        <a href="listing.php#Franchise Star Wars"><div class="showcase">
            <h5>Star Wars</h5>
        </div></a>
        <a href="listing.php#Disney"><div class="showcase">
            <h5>Disney</h5>
        </div></a>
        <a href="listing.php#Franchise Harry Potter"><div class="showcase">
            <h5>Harry Potter</h5>
        </div></a>
        <a href="listing.php#Game of Thrones"><div class="showcase">
            <h5>Game of Thrones</h5>
        </div></a>
    </section>
    </main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

<?php require 'footer.php' ?>
</html>



