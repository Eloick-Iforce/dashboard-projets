<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Tableau de Bord</title>
</head>

<body>
    <h1>Tableau de Bord</h1>

    <h2>Liste des Projets</h2>
    <div class="card-container">
        <?php
        include 'variables.php';
        include 'projets.php';

        echo '<h2>Projets Locaux</h2>';
        afficherProjets($projetsDirectoryLocal);

        echo '<h2>Projets WSL</h2>';
        afficherProjets($projetsDirectoryWSL);
        ?>

    </div>
    <script src="main.js"></script>
</body>

</html>