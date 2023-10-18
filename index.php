<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/output.css">
    <title>Tableau de Bord</title>
</head>

<body>
    <div class="bg-white text-black dark:bg-gray-900 dark:text-white p-5 min-h-screen">

        <div class="flex justify-between">
            <h1 class="font-bold text-5xl">Tableau de Bord</h1>
            <div>
                <a href="http://localhost/phpmyadmin" target="_blank" class="p-2 bg-blue-500 rounded hover:bg-blue-700 text-white">Open phpMyAdmin</a>
                <button id="themeToggle" class="p-2 rounded bg-gray-800 text-white dark:text-black dark:bg-gray-200" onclick="toggleTheme()">Changer de thème</button>
            </div>

        </div>

        <div class="">
            <?php
            include 'variables.php';
            include 'projets.php';

            echo '<h2 class="text-2xl">Projets Locaux</h2>';
            afficherProjets($projetsDirectoryLocal);

            echo '<h2 class="text-2xl">Projets WSL</h2>';
            afficherProjets($projetsDirectoryWSL);
            ?>

        </div>
        <script src="main.js"></script>
        <script>
            function toggleTheme() {
                console.log('toggle theme');
                const body = document.body;
                if (body.classList.contains('dark')) {
                    body.classList.remove('dark');
                } else {
                    body.classList.add('dark');
                }
            }
        </script>
    </div>
</body>

</html>