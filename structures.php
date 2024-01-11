<?php
// Les if

$pokemon1PointsDeVie = 100;
$pokemon2PointsDeVie = 100;

$attaquePokemon1 = 10;
$defensePokemon2 = 5;

// Souvent une comparaison, mais on recherche toujours une expression booléenne
if ($attaquePokemon1 > $defensePokemon2) {
    // On considère que l'attaque a réussi
    $pokemon2PointsDeVie -= ($attaquePokemon1 - $defensePokemon2);
} else {
    $pokemon1PointsDeVie -= 2;
    $pokemon2PointsDeVie += 5;

    // Autant de code que je veux ici
}

// Comparaison : < > <= >=
// Egalité : == ou ===. Toujours privilégier ===

if (1 === '1') {
    echo 'OK';
} else {
    echo 'PAS OK';
}

// Attention à la "magie" de PHP
// 0 => false
// '0' => false
// '' => false
// [] => false
// null => false



// Le else est pas obligatoire
if ($attaquePokemon1 > $defensePokemon2) {
    // On considère que l'attaque a réussi
    $pokemon2PointsDeVie -= ($attaquePokemon1 - $defensePokemon2);
}


// Je peux enchainer les conditions

if (($attaquePokemon1 - $defensePokemon2) >= 20) {
    // Situation 1
} elseif (($attaquePokemon1 - $defensePokemon2) >= 10) {
    // Situation 2
} else {
    // Situation 3
}

// On utilise rarement les if/elseif/elseif/else/...


// switch
$attaquePokemon1 = 10;

$typePokemon2 = 'Eau';

switch ($typePokemon2) {

    case 'Feu':
        $attaquePokemon1 -= 10;
    break;

    case 'Glace':
        $attaquePokemon1 += 5;
    break;

    case 'Herbe':
        $attaquePokemon1 += 2;
    break;

    // Etc.

    default: // Si on est pas encore sorti du switch
        $attaquePokemon1++;
    break;
}



// On peut grouper les cas 
$jourDeLaSemaine = 'Jeudi';

switch ($jourDeLaSemaine) {

    case 'Lundi':
    case 'Mardi':
    case 'Mercredi':
    case 'Jeudi':
    case 'Vendredi':
        echo 'Je suis à l\'école';
    break;

    case 'Samedi':
    case 'Dimanche':
        echo 'C\'est le weekend';
    break;
}

$attaquePokemon1 = 10;
$typePokemon2 = 'Feu';

// Version + moderne avec match
// A privilégier, notamment pour la notion de retour, et pour la comparaison stricte par défaut
$attaquePokemon1 = match($typePokemon2) {
    'Feu', 'Insecte' => $attaquePokemon1 + 10,
    'Glace' => $attaquePokemon1 + 5,
    'Herbe' => $attaquePokemon1 - 1,
    default => $attaquePokemon1
};

echo "<p>L'attaque est maintenant de $attaquePokemon1.</p>";
