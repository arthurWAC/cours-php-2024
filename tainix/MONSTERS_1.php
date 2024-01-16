<?php
//== NE PAS TOUCHER
$weight = 2;
$formula = "2R1";
$foods = "GRRWFGRGGGGRWFFGRFGFWWFFW";
//== NE PAS TOUCHER

// Accéder aux éléments d'une chaine de caractères
// Comme on accède aux éléments d'un tableau
$coefficientA = $formula[0];
$coefficientB = $formula[2];
$typeDeNourriture = $formula[1];

// 1. Parcourir $foods
// Pour parcourir $foods, on peut utiliser un for
$longueurFoods = strlen($foods); // STRing LENgth
for ($i = 0; $i < $longueurFoods; $i++) {
    $food = $foods[$i];
    
    // 2. Comparer le type de nourriture
    if ($typeDeNourriture === $food) {
        
        // 3. Calculer le gain de masse
        $gainMasse = $coefficientA * 1 + $coefficientB; // *1 juste pour coller à l'énoncé
        
        // 4. Incrémenter $weight
        $weight += $gainMasse;
    }
}

echo $weight;