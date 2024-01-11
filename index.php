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