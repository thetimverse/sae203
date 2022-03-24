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
<h1>Bienvenue dans l'administration</h1>
<br>
        <ul>
            <li><h2><a href="table1_gestion.php">Gestion des Funko POP!</a></h2></li>
            <li><h2><a href="table2_gestion.php">Gestion des types de Funko POP!</a></h2></li>
        </ul>
</div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<?php require '../footer.php' ?>

</html>