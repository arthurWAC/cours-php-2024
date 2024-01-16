<?php
//== NE PAS TOUCHER
$shapes = ["pentagon_9","triangle_4","square_6","triangle_4","square_7","triangle_3","pentagon_2","pentagon_9","square_1","pentagon_8","pentagon_1","square_9","pentagon_6","pentagon_1","pentagon_7","hexagon_7","pentagon_6"];
//== NE PAS TOUCHER

// 0. Initialisation de ma somme
$somme = 0;

// Configurations
$nbSides = [
    'triangle' => 3,
    'square' => 4,
    'pentagon' => 5,
    'hexagon' => 6
];

// 1. Parcourir $shapes
foreach ($shapes as $shape) {

    // 2. Je dois sortir 2 infos : "le nom de la forme" et "la longueur du côté"
    [$nom, $longueur] = explode('_', $shape);
    
    // 3. Je dois calculer le périmètre, selon la forme
    $perimetre = perimetre(
        longueurDuCote: $longueur,
        nombreDeCote: $nbSides[$nom]
    );
    
    // 4. Incrémenter ma somme
    $somme += $perimetre;
}

// 5. Je dois afficher ma somme
echo $somme;


function perimetre(int $longueurDuCote, int $nombreDeCote): int
{
    return $longueurDuCote * $nombreDeCote;
}

// 1. Le mot clé "function"
// 2. Le nom de ma fonction, en camelCase, un nom le plus explicite possible
// 3. Le ou les paramètres, avec leur type, et un nom explicite. Et si besoin des valeurs par défaut
    // 3. bis TOUJOURS D'ABORD les paramètres obligatoires, puis les paramètres optionnels
// 4. Le type de retour
// 5. Les accolades, à la ligne
// 6. Le code de la fonction, avec forcément le mot clé "return"