<?php
class Projet
{
    private $nom;
    private $chemin;
    private $derniereModification;

    public function __construct($nom, $chemin, $derniereModification)
    {
        $this->nom = $nom;
        $this->chemin = $chemin;
        $this->derniereModification = $derniereModification;
    }

    public function afficher()
    {
        echo '<div class="card" onclick="openWithVSCode(this)" data-path="' . $this->chemin . '" id="' . $this->chemin . '">';
        echo $this->chemin;
        echo '<h3>' . $this->nom . '</h3>';
        echo '<p>Dernière modification : ' . date("F d Y H:i:s.", $this->derniereModification) . '</p>';
        echo '</div>';
    }
}

function afficherProjets($directory)
{
    $projets = scandir($directory);

    foreach ($projets as $projet) {
        if ($projet === '.' or $projet === '..') continue;

        $chemin = rtrim($directory, '/') . '/' . $projet;
        $derniereModification = filemtime($chemin);

        $projet = new Projet($projet, $chemin, $derniereModification);
        $projet->afficher();
    }
}
