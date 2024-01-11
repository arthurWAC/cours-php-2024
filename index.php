<?php

// Variable
// Une variable en PHP commence par le signe $
// Une variable, on la nomme bien !

// Une variable ça peut stocker plusieurs choses, plusieurs types

// Une variable ça peut stocker un nombre
$age = 36;

// Une variable ça peut stocker un nombre décimal
$pi = 3.14;

// Une variable ça peut stocker une chaine de caractères
$prenom = 'Arthur'; // Côte simple
$nom = "Weill"; // Côte double

// Dans les cotes doubles, je peux passer des variables

$prenomNom = "$prenom Weill"; // => Afficher "Arthur Weill"
$prenomNomBis = '$prenom Weill'; // => Afficher "$prenom Weill"

// Pour coller des variables textuelles entre elles, on utilise la concaténation, avec le point
$prenomNomConcatene = $prenom . ' ' . $nom; // => Afficher "Arthur Weill"
$prenomNom = "$prenom $nom"; // => Afficher "Arthur Weill"

$paragraphe = "<p>$prenom $nom</p>";

echo $paragraphe;

echo "Je m'appelle $prenom et j'ai $age ans";

echo '<br />';

echo $prenomNom;

// Calculs

// Opérateurs simples

$a = 1;
$b = 2;

$calcul = $a + $b; // Addition
$calcul = $b - $a; // Soustraction

$calcul = $a * $b; // Multiplication "*" "étoile"
$calcul = $a / $b; // Division "/" "slash"

$modulo = $b % $a; // Modulo, le reste de la division euclidienne
// Sert beaucoup pour savoir si un nombre est pair ou impair
// Ou multiple de X ?

// On peut tout mélanger en même temps

// On suit les règles classiques de priorité des calculs
$calculComplexe = $a * $b + 23 - 12 * $b + $a + $calcul;

// On peut utiliser des parenthèses
$calculComplexe = $a * ($b + 23) - 12 * ($b + ($a + $calcul));

$puissance = $b ** 2;
$puissance = pow($b, 2);

// Opérateurs condensés

$start = 1;

$start += 3; // Equivaut à $start = $start + 3;
$start -= 2;
$start *= 5;
$start /= 3;

// Opérateurs d'incrémentation/décrementation

// Ajouter 1
$start = 1;

// Les 3 lignes sont équivalentes
$start = $start + 1;
$start += 1;
$start++;

// Idem avec --
$start = $start - 1;
$start -= 1;
$start--;



// Les booléens

// On les écrit en minuscule
$vrai = true;
$faux = false;

// Opérations booléennes
// ET => && "double esperluette"
// OU => || "double pipe" (touche 6 sur Windows)
// On utilise pas "and" et "or"

$vrai && $vrai; // => true
$vrai && $faux; // => false
$faux && $faux; // => false
// && sont des multiplications 1 x 1 x 1 x 0 x 1 => 1 seul zéro et c'est false

$vrai || $vrai; // => true
$vrai || $faux; // => true
$faux || $faux; // => false
// || sont des additions : 1 + 1 + 1 + 0 + 1 + 1 => 5 != 0 donc c'est vrai


// Les constantes

// Ce sont des "super variables" dont la valeur ne change pas au fil du programme
// On utilise une fonction pour définir la valeur
// On nomme la constante en UPPER_CASE (convention)
define('TAUX_TVA', 1.2);

// Utilisation
$prixHT = 10;
$prixTTC = $prixHT * TAUX_TVA; // Pas de $

// Les constantes sont accessibles dans la totalité du programme (fonctions, objets, etc.)