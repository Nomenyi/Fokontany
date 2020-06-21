<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <title>Fokontany</title>
</head>
<body style="background: #002B36;">

    <?php

        include "traitements/dbconnect.php";
        include "traitements/header.php" 
    
    ?>
    
    <div class="container">

        <div style="text-align: center; color: white; margin-top: 10px;" class="titre">
            <h2 style="font-weight: bold;">Rechercher ici</h2>
        </div>

        <?php 
            include "traitements/recherche.php";
        ?>

        <div style="text-align: center; color: white; margin-top: 10px;" class="titre">
            <h2 style="font-weight: bold;">Listes des villages et Communes</h2>
        </div>

        <?php
            
            include "traitements/search.php";

        ?>

    </div>

    <?php include "traitements/footer.php" ?>

    <script src="assets/script.js"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="assets/fontawesome/js/all.js"></script>
    <script src="assets/jquery/jquery.min.js"></script>
</body>
</html>