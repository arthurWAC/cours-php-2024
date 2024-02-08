<?php
namespace Challenges\POKEMON_3;

use Tainix\Html;

// ECHANTILLON ------------------------
$pokemons = ['Air:98', 'Herbe:43', 'Psychique:44', 'Eau:34', 'Psychique:27', 'Herbe:39', 'Herbe:38', 'Eau:28', 'Herbe:44', 'Psychique:97', 'Feu:29', 'Feu:35', 'Eau:29', 'Eau:33', 'Psychique:60', 'Feu:24', 'Insecte:36', 'Herbe:22', 'Herbe:44', 'Feu:23', 'Eau:45', 'Eau:38', 'Herbe:20', 'Herbe:23', 'Eau:23', 'Insecte:31', 'Herbe:41', 'Feu:48'];
Html::debug($pokemons, '$pokemons');

// CODE DU CHALLENGE ------------------

// Quelle(s) fonction(s) je reprends de pokemon_2 ??

/**
 * Fonction qui retire un pokemon
 */
function retireUnPokemon(array $pokemons, string|array $type, int $puissance): array
{
    $type = (array) $type;

    foreach ($pokemons as $index => $pokemon) {
        
        if (in_array($pokemon['type'], $type) && $pokemon['puissance'] === $puissance) {
            unset($pokemons[$index]);

            break; // Je casse la boucle, je veux en enlever qu'un
        }
    }

    return $pokemons;
}

// $pokemons = [
//     ['type' => 'Herbe', 'puissance' => 12], // $pokemon, $index = 0
//     ['type' => 'Feu', 'puissance' => 12],  // $pokemon, $index = 1
//     ['type' => 'Glace', 'puissance' => 12], // ...
//     ['type' => 'Herbe', 'puissance' => 25],
//     ['type' => 'Feu', 'puissance' => 34],
//     ['type' => 'Glace', 'puissance' => 12],
// ];

// Html::debug($pokemons);

// $pokemons = retireUnPokemon($pokemons, 'Glace', 12);

// Html::debug($pokemons);

function meilleur(array $pokemons, string|array $types): int
{
    // 0. Initialisation
    $puissancesPokemons = [];

    $types = (array) $types; // ["Insecte", "Glace"] => ["Insecte", "Glace"] MAIS... "Feu" => ["Feu"]

    foreach ($pokemons as $pokemon) {
        
        if (in_array($pokemon['type'], $types)) {
            $puissancesPokemons[] = $pokemon['puissance'];
        }
    }

    // Cas où j'ai trouvé aucune correspondance
    if (empty($puissancesPokemons)) {
        return 0;
    }

    return max($puissancesPokemons);
}

function parsePokemons(array $pokemons): array
{
    $pokemonsBienRanges = [];

    foreach ($pokemons as $pokemonInformations) {
        [$type, $puissance] = explode(':', $pokemonInformations);

        $pokemonsBienRanges[] = [
            'type' => $type,
            'puissance' => (int) $puissance
        ];
    }

    return $pokemonsBienRanges;
}

// Programme principal
$pokemonsBienRanges = parsePokemons($pokemons);

$typesRares = ['Insecte', 'Glace', 'Poison', 'Psychique', 'Air'];

$compositionEquipe = [
    'Eau', 'Feu', 'Herbe', $typesRares
];

// Equipe 1
$meilleurEau = meilleur($pokemonsBienRanges, 'Eau');
$pokemonsBienRanges = retireUnPokemon(pokemons: $pokemonsBienRanges, type: 'Eau', puissance: $meilleurEau);

$meilleurFeu = meilleur($pokemonsBienRanges, 'Feu');
$pokemonsBienRanges = retireUnPokemon($pokemonsBienRanges, 'Feu', $meilleurFeu);

$meilleurHerbe = meilleur($pokemonsBienRanges, 'Herbe');
$pokemonsBienRanges = retireUnPokemon($pokemonsBienRanges, 'Herbe', $meilleurHerbe);

$meilleurRare = meilleur($pokemonsBienRanges, ['Insecte', 'Glace', 'Poison', 'Psychique', 'Air']);
$pokemonsBienRanges = retireUnPokemon($pokemonsBienRanges, $typesRares, $meilleurRare);

$totalEquipe1 = $meilleurEau + $meilleurFeu + $meilleurHerbe + $meilleurRare;

Html::debug($totalEquipe1, 'Total équipe 1');

// Equipe 2
$meilleurEau = meilleur($pokemonsBienRanges, 'Eau');
$pokemonsBienRanges = retireUnPokemon(pokemons: $pokemonsBienRanges, type: 'Eau', puissance: $meilleurEau);

$meilleurFeu = meilleur($pokemonsBienRanges, 'Feu');
$pokemonsBienRanges = retireUnPokemon($pokemonsBienRanges, 'Feu', $meilleurFeu);

$meilleurHerbe = meilleur($pokemonsBienRanges, 'Herbe');
$pokemonsBienRanges = retireUnPokemon($pokemonsBienRanges, 'Herbe', $meilleurHerbe);

$meilleurRare = meilleur($pokemonsBienRanges, ['Insecte', 'Glace', 'Poison', 'Psychique', 'Air']);
$pokemonsBienRanges = retireUnPokemon($pokemonsBienRanges, ['Insecte', 'Glace', 'Poison', 'Psychique', 'Air'], $meilleurRare);

$totalEquipe2 = $meilleurEau + $meilleurFeu + $meilleurHerbe + $meilleurRare;

Html::debug($totalEquipe2, 'Total équipe 2');


// REPONSE ATTENDUE -------------------
Html::debug('586', 'Réponse attendue', 'success');


