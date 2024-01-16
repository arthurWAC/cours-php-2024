<?php

// Les fonctions, on en a déjà vu !

// Arrondir
$nombre = 3.14;
$arrondi = round($nombre);
$arrondiAUnChiffreApresLaVirgule = round($nombre, 1);

// in_array ou array_key_exists
$objets = ['gobelet', 'stylet', 'telephone', 'souris'];

if (in_array('souris', $objets)) {

}

// Une fonction, c'est un outil qui permet de réaliser une ou plusieurs actions
// Un outil qui est réutilisable


// Vocabulaire

// "Contrat", "Déclaration d'une fonction"
// Paramètres d'une fonction => éléments attendus lors de son utilisation
// "Ingrédients" d'une "recette"

// Recette : Pâte au pesto => Fonction
// Ingrédients : Pâtes, sel, basilic, parmesan, huile d'olive => Paramètres

// ---

// "Utilisation"
// Arguments : les valeurs passées à ma fonction
// Ce que j'ai dans mon placard : "Coquilettes Panzani", "Sel fin la Baleine", "Basilic du jardin"

// Résultat, le retour de la fonction
// "Coquilettes au pesto maison du 16/01 avec Basilic du jardin"
// "Spagetti au pesto avec basilic du supermarché"



// Analyse d'une déclaration d'une fonction native comme round
// round(int|float $num, int $precision = 0, int $mode = PHP_ROUND_HALF_UP): float

// round => nom
// 3 paramètres
// Le premier paramètre n'a pas de valeur par défaut, donc il est obligatoire
// Les 2 autres paramètres ont une valeur par défaut, ils sont facultatifs
// Chaque paramètre est typé
    // int|float => "Entier ou nombre décimal"
    // int => "Seulement un entier"
    // Les autres types disponibles : "string", "bool", "array", "null" et d'autres types qu'on verra + tard

// On a un type de retour, ici float, avec les ":" juste avant



// Créer ses propres fonctions

// Reprenons l'exemple de MONSTER_1
// 3. Calculer le gain de masse : $gainMasse = $coefficientA * 1 + $coefficientB;

// Formule : gain Masse = coefA * poidsAliment + coefB
// poidsAliment toujours égal à 1 pour le moment

define('FACTEUR_MASSE', 12);

$poidsAliment = 10;

function gainMasse(int $coefficientA, int $coefficientB, int $poidsAliment = 1): int
{
    // "Corps" de ma fonction, "Périmètre, "Scope" de ma fonction
    $masse = $coefficientA * $poidsAliment + $coefficientB;

    // echo "BONJOUR"; // On évitera les echo dans les fonctions, utiles en phase de debug

    return $masse;
}

function gainMasseGrosMonstre(int $coefficientA, int $coefficientB): int
{
    $masse = $coefficientA ** $coefficientB;

    // $masse += $poidsAliment; // Je peux pas accéder aux variables qui sont en dehors de ma fonction

    // Ca, ca fonctionne très bien
    $facteurMasse = 12;
    $masse += $facteurMasse;

    $masse += FACTEUR_MASSE; // Cette fois-ci ça marche, je peux utiliser une constante dans une fonction

    return $masse;
}

// Je peux appeler des fonctions dans des fonctions
function gainMasseGrosAliment(int $coefficientA, int $coefficientB)
{
    return gainMasse($coefficientA, $coefficientB, 100);
}

echo gainMasseGrosAliment(12,16);

// echo $facteurMasse;

// 1. Le mot clé "function"
// 2. Le nom de ma fonction, en camelCase, un nom le plus explicite possible
// 3. Le ou les paramètres, avec leur type, et un nom explicite. Et si besoin des valeurs par défaut
    // 3. bis TOUJOURS D'ABORD les paramètres obligatoires, puis les paramètres optionnels
// 4. Le type de retour
// 5. Les accolades, à la ligne
// 6. Le code de la fonction, avec forcément le mot clé "return"

// La déclaration d'une fonction est indépendante du reste du code
$coefficientA = 10;

$masse = gainMasse(1, $coefficientA, 3);

echo $masse . '<br />';

echo gainMasseGrosMonstre(2,2); // 2**2 => 4 + 12 + 12 => 28

// --------

// Il vaut mieux une fonction qui retourne une chaine de caractères, puis faire un echo du résultat de la fonction
function bonjour(): string
{
    return 'Bonjour';
}

echo bonjour();

// Plutot qu'une fonction qui fait un echo
// function bonjour()
// {
//     echo 'Bonjour';
// }


// PARAMETRES NOMMES

// function combat($pokemonAttaque, $pokemonDefense) {}

// combat(
//     pokemonAttaque: $pikachu,
//     pokemonDefense: $salameche
// );

// combat($pikacu, $salameche);

// function combat($pokemonAttaque, $pokemonDefense, $potionBonusPokemonAttaque = '', $potionBonusPokemonDefense = '') {}

// combat($pikachu, $salameche, '', 'Feu');

// combat(
//     pokemonDefense: $salameche,
//     potionBonusPokemonDefense: 'Feu',
//     pokemonAttaque: $pikachu,
// );

// => https://tainix.fr/article-technique/Bonnes-pratiques-PHP-3-construire-ses-fonctions-et-methodes