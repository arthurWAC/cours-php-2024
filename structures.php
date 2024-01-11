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


// Les boucles

// for, while, foreach

// La somme des 100 premiers nombres

$somme = 0;
for ($i = 1; $i <= 100; $i++) {
    $somme += $i;
}

echo "<p>Somme : $somme</p>";

// Attention au nombre d'itérations
// for ($i = 1; $i <= 100; $i++) // 100 itérations
// for ($i = 0; $i <= 100; $i++) // 101 itérations
// for ($i = 0; $i < 100; $i++) // 100 itérations
// for ($i = 1; $i < 100; $i++) // 99 itérations

// Incrémenter de 2 en 2
// for ($i = 0; $i <= 100; $i += 2) // 50 itérations

// Décrémenter
// for ($i = 100; $i > 0; $i--) // 99 itérations

// On peut utiliser d'autres variables
$array = [1, 2, 3];
$nbElements = count($array);
for ($key = 0; $key < $nbElements; $key++) { // On évite de faire des opérations dans les conditions de la boucle

}


// foreach, toujours sur un tableau

// foreach simple
$objets = ['stylo', 'gobelet', 'ordinateur', 'souris', 'echarpe', 'pochette', 'telephone'];

// Postulat de départ
$jAiTrouveLaSouris = false;

foreach ($objets as $objet) {
    
    if ($objet === 'souris') {
        $jAiTrouveLaSouris = true;
        // On peut utiliser un break
        break;
    }
}


// Postulat de départ
$jAiTrouveLAdaptateur = false;

foreach ($objets as $objet) {
    
    if ($objet === 'adaptateur') {
        $jAiTrouveLAdaptateur = true; // Je passe jamais ici
    }
}

// Postulat de départ
$jAiTrouveLAPochette = false;

foreach ($objets as $objet) {
    
    if ($objet !== 'pochette') {
        continue;
    }

    $jAiTrouveLAPochette = true;
}


// foreach "compliqué"

$moi = [
    'prenom' => 'Arthur',
    'nom' => 'Weill',
    'age' => 36
];

// Je récupère à la fois la valeur ET la clé
foreach ($moi as $key => $value) { // "$key =>" en plus
    echo "<p><b>$key</b> : $value</p>";
}


// While
// ATTENTION A LA BOUCLE INFINIE !!!!!!!!!!!

$value = 0;
$nbCoups = 0;

// Bloqueurs !
$bloqueur = 0;

while ($value != 6) {

    $nbCoups++;
    $value = rand(1, 6); // Nombre aléatoire entre 1 et 6


    // // Bloqueur -----
    // $bloqueur++;
    // if ($bloqueur > 10000) {
    //     break;
    // }
    // // --------------
}

echo '<p>Il me faut ' . $nbCoups . ' lancés pour tomber sur un 6</p>';

echo '<p>Bloqueur : ' . $bloqueur . '</p>';



// While true

// Bloqueurs !
$bloqueur = 0;
$nbCoups = 0;

while (true) {

    $nbCoups++;
    $value = rand(1, 6); // Nombre aléatoire entre 1 et 6

    if ($value === 6) {
        break;
    }
    
    // // Bloqueur -----
    // $bloqueur++;
    // if ($bloqueur > 10000) {
    //     break;
    // }
    // // --------------
}

echo '<p>Il me faut ' . $nbCoups . ' lancés pour tomber sur un 6</p>';

echo '<p>Bloqueur : ' . $bloqueur . '</p>';




// do while intéressant, quand quoi qu'il arrive, le code doit s'executer au moins 1 fois
// Comme pour générer un code secret, un token, etc.
$nbCoups = 0;

do {
    $de = rand(1, 6);
    $nbCoups++;

} while ($de != 6);


echo '<p>Il me faut ' . $nbCoups . ' lancés pour tomber sur un 6</p>';





// COMPLEXITE CYCLOMATIQUE


// V1 : continue
// Postulat de départ
$jAiTrouveLAPochette = false;

foreach ($objets as $objet) {
    
    if ($objet !== 'pochette') {
        continue;
    }

    $jAiTrouveLAPochette = true;
}


// V2 : break
// Postulat de départ
$jAiTrouveLAPochette = false;

foreach ($objets as $objet) {
    
    if ($objet == 'pochette') {
        $jAiTrouveLAPochette = true;
        break;
    }
}



// Trop d'imbrication des conditions
if ($userAutorisation) {

    if ($nbContenus >= 5) {

        // Code intéressant
        // ...
        // ----------------

    } else {
        // Erreur 2
    }
} else {
    // Erreur 1
}

// -----------------

// Logique "inverse" sur les controles, code + clair

if (! $userAutorisation) {
    // Erreur 1 et le programme s'arrête
}

if ($nbContenus < 5) {
    // Erreur 2 et le programme s'arrête
}

// Code intéressant
// ...
// ----------------
