<?php
echo '<h1>Les tableaux</h1>';

// On va utiliser les "crochets" []

// Les tableaux "auto indexés"
// Je veux qu'ils ne contiennent qu'un seul type de variable

$nombres = [1, 2, 3, 4, 5, 6]; // Des crochets pour entourer les valeurs, des virgules pour les séparer

$mots = ['Bryan', 'is', 'in', 'the', 'kitchen'];

$tableauVide = [];

// Ajouter une valeur dans un tableau
// $tableauVide[] = 5; // Je mets la valeur 5 dans le tableau
// array_push($tableauVide, 5);

$nom = 'Robert';
$tableauVide[] = $nom;

$nom = 'Claude';
$tableauVide[] = $nom;

echo '<pre>';
print_r($tableauVide); // ['Robert', 'Claude'] et non ['Claude', 'Claude']
echo '</pre>';

// Comment j'accède à 1 valeur précise de mon tableau => avec les index
// L'index commence à 0 !

echo $tableauVide[0]; // crochet index crochet
echo $tableauVide[1];

echo '<pre>';
print_r($nombres);
echo '</pre>';

// Dans un tableau de N éléments, les éléments sont indexés de 0 à N-1

// Tableaux à plusieurs dimensions
// "Tableaux de tableaux"

// Modéliser un Morpion
$morpion = [
    ['X', 'O', 'X'],
    ['O', 'O', 'X'],
    ['X', 'O', 'O'],
];

// Case du milieu
echo $morpion[1][1];

// Les tableaux associatifs, indexés manuellement, notion de "clé" / "valeur"

// Là on va pouvoir mélanger les types

$moi = [
    'prenom' => 'Arthur',
    'nom' => 'Weill',
    'age' => 36
];

// $moi = ['Arthur', 'Claude', 36]; // Techniquement ça marche

echo '<pre>';
print_r($moi);
echo '</pre>';

// echo $moi[2];
echo $moi['age']; // Je réutilise les index (ou "les clés") utilisés lors de la déclaration du tableau

// Je peux créer de nouveaux index 
$moi['profession'] = 'Directeur';

$languages = ['PHP', 'Javascript'];

$moi['languages'] = $languages;

// Rajouter une valeur à un tableau dans un tableau
$moi['languages'][] = 'HTML';

echo '<pre>';
print_r($moi);
echo '</pre>';

// Expérimentation, à ne pas faire à la maison -------------
$nombres = [];

$nombres[0] = 1;
$nombres[10] = 10;
$nombres[5] = 5;

$nombres[5] = 6;

$nombres[] = 777;

echo '<pre>';
print_r($nombres);
echo '</pre>';
// ----------------------------------------------------------


$moi = [
    'prenom' => 'Arthur',
    'nom' => 'Weill',
    'age' => 36,
    'languages' => ['PHP']
];

$toi = [
    'prenom' => 'Louis',
    'nom' => 'Steinmann',
    'age' => 20,
    'languages_informatiques' => ['HTML']
];

$quelquun = [
    'prenom' => 'Louis',
    'nom' => 'Steinmann',
    'age' => 20,
];


// Enlever valeur

// Vérifie qu'une clé existe

// Vérifier qu'une valeur est dans un tableau