<?php
class Projet
{
    private $nom;
    private $chemin;
    private $id;
    private $derniereModification;

    private $technologie;

    public function __construct($nom, $chemin, $id, $derniereModification)
    {
        $this->nom = $nom;
        $this->chemin = $chemin;
        $this->id = $id;
        $this->derniereModification = $derniereModification;
        $this->technologie = $this->detecterTechnologie();
    }

    private function detecterTechnologie()
    {
        if (file_exists($this->chemin . '/composer.json')) {
            $composer = json_decode(file_get_contents($this->chemin . '/composer.json'), true);
            if (isset($composer['require']['laravel/framework'])) {
                return 'laravel';
            }
        }

        if (file_exists($this->chemin . '/package.json')) {
            $package = json_decode(file_get_contents($this->chemin . '/package.json'), true);
            if (isset($package['dependencies']['react'])) {
                return 'react';
            }
        }

        // Add more technology checks here...

        return 'unknown';
    }

    public function afficher()
    {
        echo '<div class="card" id="' . $this->id . '" onclick="openWithVSCode(this)" data-path="' . $this->chemin . '">';
        echo '<h3>' . $this->nom . '</h3>';
        echo '<p>Dernière modification : ' . date("F d Y H:i:s.", $this->derniereModification) . '</p>';
        echo '<img class="logo" src="images/' . $this->technologie . '.png" alt="' . $this->technologie . ' logo">';
        echo '</div>';
    }
}

function afficherProjets($directory)
{
    $projets = scandir($directory);

    foreach ($projets as $projet) {
        if ($projet === '.' or $projet === '..') continue;

        $chemin = rtrim($directory, '/') . '/' . $projet;
        $id = $chemin;
        $derniereModification = filemtime($chemin);

        // If 'public' directory exists in the project, use it for the id
        if (is_dir($chemin . '/public')) {
            $id .= '/public';
        }

        $projet = new Projet($projet, $chemin, $id, $derniereModification);
        $projet->afficher();
    }
}
