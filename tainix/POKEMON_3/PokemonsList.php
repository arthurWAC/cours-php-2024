<?php

namespace Challenges\POKEMON_3;

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