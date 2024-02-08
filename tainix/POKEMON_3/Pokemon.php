<?php

namespace Challenges\POKEMON_3;

// Un objet = Une classe
class Pokemon
{
    // Des propriétés (puissance et type)
    public readonly string $type; // "readonly" = "lecture seule", on peut définir la valeur 1 seule fois
    private int $puissance;

    private bool $isSelected = false;

    // Des Méthodes

    // La méthode qu'on retrouvera (presque) toujours
    // Le constructeur (c'est une méthode magique, elle s'appelle tout seule)
    public function __construct(string $informations)
    {
        [$type, $puissance] = explode(':', $informations);

        // Je vais $type et $puissance dans mes propriétés
        // J'utilise le mot clé $this
        $this->type = $type;
        $this->puissance = (int) $puissance;
    }

    public function augmentePuissance(int $augmentation): void
    {
        $this->puissance += $augmentation;
        // $this->puissance = $this->puissance + $augmentation;
    }

    // Getteur
    public function getPuissance(): int
    {
        return $this->puissance; // Comme ça je peux accéder à ma propriété privée
    }

    public function selected(): void
    {
        $this->isSelected = true;
    }

    // Getteur qui commencent pas par "get..."
    public function isSelected(): bool
    {
        return $this->isSelected;
    }
}
