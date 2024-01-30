<?php
//== NE PAS TOUCHER
$islandX = 27;
$islandY = 33;
$planes = ["P:85,48C:UPM","P:71,15C:GXX","P:4,72C:ZKY","P:14,85C:IJK","P:76,4C:XFU","P:1,1C:MEW","P:93,91C:TSN","P:10,76C:OGS","P:42,3C:WVP","P:0,15C:MLA"];
//== NE PAS TOUCHER

// DECLARATION de la fonction "distance"
function distance(int $islandX, int $islandY, int $planeX, int $planeY): float
{
    // 1. Calcul de la longueur du côté X
    $coteX = $planeX - $islandX;
    
    // 2. Calcul de la longueur du côté Y
    $coteY = $planeY - $islandY;
    
    // 3. Pythagore !
    return sqrt( pow($coteX, 2) + pow($coteY, 2) );
}

// Petit test : echo distance(0, 0, 3, 4); // Ca donne bien 5, c'est OK

// 0. Initialisation
$distancesDesAvions = [];

// 1. Parcourir les avions
foreach ($planes as $plane) {
    // 1.1 extraire les informations : $planeX, $planeY, $planeCode
    
    // P:85,48C:UPM => 85 48 et UPM
    // P: il doit partir
    // C: doit devenir une ','
    $plane = str_replace('P:', '', $plane);
    $plane = str_replace('C:', ',', $plane);
    
    // 85,48,UPM => explode(',') et terminé !
    [$planeX, $planeY, $planeCode] = explode(',', $plane);

    // 2. Calculer la distance, avec l'UTILISATION de la fonction "distance"
    // 3. Je range les distances
    $distancesDesAvions[$planeCode] = distance($islandX, $islandY, $planeX, $planeY);
}

echo '<pre>';
print_r($distancesDesAvions);
echo '</pre>';

// 4. Ordonner les avions par distance
asort($distancesDesAvions); // "a" => "associative" pour garder l'association des clés

echo '<pre>';
print_r($distancesDesAvions);
echo '</pre>';

// 5. Sortir les 3 + proches
// V1
$reponse = '';
$compteur = 0;
foreach ($distancesDesAvions as $code => $distance) {
    
    $reponse .= $code; // Equivalent de $reponse = $reponse . $code;
    $compteur++;

    if ($compteur === 3) {
        break;
    }
}

echo $reponse;
echo '<br />';

// V2 en 1 ligne, mais plutot illisible
echo implode(array_slice(array_keys($distancesDesAvions), 0, 3));

// V2 avec les fonctions natives
$codes = array_keys($distancesDesAvions);
echo '<pre>';
print_r($codes);
echo '</pre>';

$premiersCodes = array_slice($codes, 0, 3);
echo '<pre>';
print_r($premiersCodes);
echo '</pre>';

echo implode($premiersCodes);





