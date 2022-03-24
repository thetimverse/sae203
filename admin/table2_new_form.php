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
    <a class="bouton" href="table2_gestion.php">Gestion des catégories</a><br>

    <div class="form-gestion">
    <form action="table2_new_valide.php" method="post">

            Média d'origine : <input type="text" name="media" required /><br />
            Édition : <input type="text" name="edition" required /><br />
            Taille (en cm) : <select name="taille"  class="input-long" required>
                <option value="choisir">--Choisissez une valeur--</option>
                <option value="10">10</option>
                <option value="25">25</option>
            </select><br />
	        <input id="submit" class="buttons" type="submit" value="Ajouter" />
    </form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<?php require '../footer.php' ?>

</html>