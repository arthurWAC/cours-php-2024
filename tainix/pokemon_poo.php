<?php

// namespace Challenges\POKEMON_3;

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

    // Getteur qui commencent pas "get..."
    public function isSelected(): bool
    {
        return $this->isSelected;
    }
}



/**
 * Cette classe va me servir à stocker mes pokemons
 * Et à rechercher des pokemons intéressants
 */
class PokemonsList
{
    /**
     * PHPDoc = PHP Documentation
     * @var Pokemon[] $pokemons
     */
    private array $pokemons = [];

    public function addPokemon(Pokemon $pokemon): void // voir => ne retourne rien, pas de "return"
    {
        $this->pokemons[] = $pokemon;
    }

    // ?Pokemon => "Pokemon ou null"
    private function meilleur(string|array $types): ?Pokemon
    {
        // J'utilise plus la fonction "max" donc je fais une recherche de maximum "classique"
        $pokemonPuissanceMax = 0;
        $pokemonPuissant = null;

        $types = (array) $types;

        foreach ($this->pokemons as $pokemon) {

            // Je vais pas prendre les pokémons déjà sélectionnés
            if ($pokemon->isSelected()) {
                continue;
            }
            
            if (
                in_array($pokemon->type, $types) && 
                $pokemon->getPuissance() > $pokemonPuissanceMax
                ) {
                $pokemonPuissant = $pokemon;
                $pokemonPuissanceMax = $pokemon->getPuissance();
            }
        }

        return $pokemonPuissant;
    }

    public function selectionneMeilleur(string|array $types): ?Pokemon
    {
        $pokemonSelectionne = $this->meilleur($types);
        $pokemonSelectionne->selected();

        return $pokemonSelectionne;
    }
}


$pokemons = ['Air:98', 'Herbe:43', 'Psychique:44', 'Eau:34', 'Psychique:27', 'Herbe:39', 'Herbe:38', 'Eau:28', 'Herbe:44', 'Psychique:97', 'Feu:29', 'Feu:35', 'Eau:29', 'Eau:33', 'Psychique:60', 'Feu:24', 'Insecte:36', 'Herbe:22', 'Herbe:44', 'Feu:23', 'Eau:45', 'Eau:38', 'Herbe:20', 'Herbe:23', 'Eau:23', 'Insecte:31', 'Herbe:41', 'Feu:48'];

$mesPokemons = new PokemonsList; // Pas de () si pas de constructeur

foreach ($pokemons as $pokemonInformations) {
    $pokemon = new Pokemon($pokemonInformations); // Appel du constructeur, "__construct" de Pokemon
    $mesPokemons->addPokemon($pokemon);
}

echo "<p>La puissance du meilleur Pokemon Eau est de " . $mesPokemons->selectionneMeilleur('Eau')->getPuissance() . "</p>";

echo "<p>La puissance du meilleur Pokemon Eau est de " . $mesPokemons->selectionneMeilleur('Eau')->getPuissance() . "</p>";

echo "<p>La puissance du meilleur Pokemon Eau est de " . $mesPokemons->selectionneMeilleur('Eau')->getPuissance() . "</p>";

echo '<pre>';
var_dump($mesPokemons);
echo '</pre>';


// A retenir : 
/**
 * La notion de propriétés, et la visibilité public/private
 * La notion de méthodes, et la visibilité public/private
 * les notions de new et de constructeur
 * $this pour appeler soit des propriétés, soit des méthodes (pour appeler la référence de l'objet lui même)
 * La possibilité de typer avec des objets
 */