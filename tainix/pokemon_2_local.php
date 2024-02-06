<?php
/**
 * ATTENTION CE CODE NE FONCTIONNE PAS EN L'ETAT
 * A UTILISER DANS LA SANDBOX LOCALE DE TAINIX
 */
namespace Challenges\POKEMON_2;

use Tainix\Html;

// ECHANTILLON ------------------------
$pokemons = ['Tenebre:10', 'Herbe:48', 'Eau:48', 'Herbe:11', 'Eau:48', 'Insecte:66', 'Psychique:82', 'Psychique:93', 'Feu:13', 'Feu:42', 'Feu:10', 'Eau:45', 'Herbe:12', 'Glace:92', 'Eau:16', 'Psychique:25', 'Herbe:41', 'Poison:37'];

Html::debug($pokemons, '$pokemons');

// CODE DU CHALLENGE ------------------

// Parsing avant ?
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

$pokemonsBienRanges = parsePokemons($pokemons);
Html::debug($pokemonsBienRanges);

// V1 avec un switch case
$puissancesPokemonsDeTypeEau = [];
$puissancesPokemonsDeTypeFeu = [];
$puissancesPokemonsDeTypeHerbe = [];
$puissancesPokemonsDeTypeRare = [];

foreach ($pokemonsBienRanges as $pokemon) {

    switch ($pokemon['type']) {
        case 'Eau':
            $puissancesPokemonsDeTypeEau[] = $pokemon['puissance'];
        break;

        case 'Feu':
            $puissancesPokemonsDeTypeFeu[] = $pokemon['puissance'];
        break;

        case 'Herbe':
            $puissancesPokemonsDeTypeHerbe[] = $pokemon['puissance'];
        break;

        case 'Insecte':
        case 'Glace':
        case 'Poison':
        case 'Psychique':
        case 'Air':
            $puissancesPokemonsDeTypeRare[] = $pokemon['puissance'];
        break;
    }
}

$puissanceMaxEau = max($puissancesPokemonsDeTypeEau);
$puissanceMaxFeu = max($puissancesPokemonsDeTypeFeu);
$puissanceMaxHerbe = max($puissancesPokemonsDeTypeHerbe);
$puissanceMaxRare = max($puissancesPokemonsDeTypeRare);


function meilleur(array $pokemons, string|array $type): int
{
    // 0. Initialisation
    $puissancesPokemons = [];

    // je transforme $type en tableau de 1 élément
    if (is_string($type)) {
        $type = [$type];
    }

    // Astuce avec la conversion de type
    // $type = (array) $type; // ["Insecte", "Glace"] => ["Insecte", "Glace"] MAIS... "Feu" => ["Feu"]

    foreach ($pokemons as $pokemon) {
        
        if (in_array($pokemon['type'], $type)) {
            $puissancesPokemons[] = $pokemon['puissance'];
        }
    }

    // Cas où j'ai trouvé aucune correspondance
    if (empty($puissancesPokemons)) {
        return 0;
    }

    return max($puissancesPokemons);
}

// Controle sur le feu
Html::debug($puissanceMaxFeu, 'Max Feu');
Html::debug(meilleur($pokemonsBienRanges, 'Feu'), 'Application de ma fonction "meilleur Feu"');

// Controle sur les rares
$typesRares = ['Insecte', 'Glace', 'Poison', 'Psychique', 'Air'];
Html::debug($puissanceMaxRare, 'Max Rare');
Html::debug(meilleur($pokemonsBienRanges, $typesRares), 'Application de ma fonction "meilleur Rare"');

// Controle sur le total
Html::debug($puissanceMaxEau + $puissanceMaxFeu + $puissanceMaxHerbe + $puissanceMaxRare, 'Total V1');
Html::debug(
    meilleur($pokemonsBienRanges, 'Eau') + 
    meilleur($pokemonsBienRanges, 'Tenebre') + 
    meilleur($pokemonsBienRanges, 'Feu') + 
    meilleur($pokemonsBienRanges, 'Herbe') + 
    meilleur($pokemonsBienRanges, ['Insecte', 'Glace', 'Poison', 'Psychique', 'Air', 'Tenebre']),
    'Total V2 avec appels à la fonction "meilleur"'
);

// REPONSE ATTENDUE -------------------
Html::debug('231', 'Réponse attendue', 'success');