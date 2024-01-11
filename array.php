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

echo 'count morpion : ' . count($morpion); // 3, ne fait pas tous les niveaux
echo '<br />';

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
$nombres[12] = null;

echo '<pre>';
print_r($nombres);
echo '</pre>';
// ----------------------------------------------------------


// Enlever valeur
unset($nombres[5]); // Je précise la clé
unset($nombres[3]); // Particularité, si ça n'existe pas, ça ne crée pas d'erreur pour autant


// Vérifie qu'une clé existe
if (isset($nombres[12])) { // isset => "is set"
    echo 'La clé 12 existe';
} else {
    echo 'La clé 12 n\'existe pas';
}

echo '<br />';

// Variante à privilégier, risque d'effet de bord avec isset
if (array_key_exists(12, $nombres)) {
    echo 'La clé 12 existe';
} else {
    echo 'La clé 12 n\'existe pas';
}

// Vérifier qu'une valeur est dans un tableau
$objets = ['stylo', 'gobelet', 'ordinateur', 'souris', 'echarpe', 'pochette'];

// Comment savoir si 'souris' et 'adaptateur' sont dans le tableau $objets ?
// On peut faire avec une boucle... mais il y a une fonction qui existe : in_array

if (in_array('souris', $objets)) {
    echo '<p>La souris est là</p>';
}

if (in_array('adaptateur', $objets)) {
    echo '<p>L\'adaptateur est là</p>'; // Ne s'affiche pas
}

// Compter le nombre d'éléments
echo 'Il y a ' . count($objets) . ' sur la table';

// Exemple d'une fonction de tri, sort
// Les fonctions de tri qui fonctionnent par référence
echo '<pre>';
print_r($objets);
echo '</pre>';

sort($objets); // Tri par ordre alphabétique

echo '<pre>';
print_r($objets);
echo '</pre>';

// Fonctions clés : count, in_array, array_key_exists, unset

// A retenir, il y a énormément de fonctions natives à PHP pour manipuler des tableaux
// => https://www.php.net/manual/fr/function.array.php
// Tri, fusion des tableaux, recherche d'éléments avancée, 