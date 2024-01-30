<?php
//== NE PAS TOUCHER
$ennemis = ["x:22 pv:65","x:19 pv:21","x:13 pv:67","x:26 pv:71","x:20 pv:68","x:5 pv:43","x:28 pv:121","x:31 pv:106","x:23 pv:87","x:7 pv:78","x:39 pv:111"];
//== NE PAS TOUCHER

// 0. Initialisation
define('BATMOBILE_PUISSANCE', 10);
define('INSTRUCTION_DEPLACEMENT', 'D');
define('INSTRUCTION_FEU', 'F');

// Fonction qui trie les ennemis par position
// En entrée ["x:22 pv:65","x:19 pv:21","x:13 pv:67"]
// En sortie [13 => 67, 19 => 21, 22 => 65]
function triEnnemisParPosition(array $ennemis): array
{
    // Initialisation
    $ennemisTries = [];

    foreach ($ennemis as $ennemi) {
        [$x, $pv] = sscanf($ennemi, 'x:%f pv:%f'); // %d ou %f ok pour les entiers
        // sscanf($ennemi, 'x:%d pv:$d', $x, $pv); // Alternative

        $ennemisTries[$x] = $pv;
    }

    // Tri selon les clés
    ksort($ennemisTries); // Par référence, pas possible de faire le return ici

    return $ennemisTries;
}

if (triEnnemisParPosition(["x:22 pv:65","x:19 pv:21","x:13 pv:67"]) == [13 => 67, 19 => 21, 22 => 65]) {
    echo '<p style="color: green;">Fonction triEnnemisParPosition bien codée !</p>';
} else {
    echo '<p style="color: red;">Fonction triEnnemisParPosition MAL codée !</p>';
}

// Fonction qui donne les instructions de tir pour 1 ennemi
// En entrée : points de vie, par exemple 35
// En sortie : les instruction : "FFFF"
function tir(int $pointsDeVie): string
{
    // V1 (Attention, bien faire un bloqueur quand on construit son while)
    // $nbFire = 0;

    // V1. 1
    // while ($pointsDeVie > 0) {
    //     $nbFire++;
    //     $pointsDeVie -= BATMOBILE_PUISSANCE;
    // }

    // V1.2
    // while ($pointsDeVie - ($nbFire * BATMOBILE_PUISSANCE) > 0) {
    //     $nbFire++;
    // }

    // V2, avec un calcul
    $nbFire = ceil($pointsDeVie / BATMOBILE_PUISSANCE);
    
    return str_repeat(INSTRUCTION_FEU, $nbFire);
}

if (tir(8) == 'F' && tir(11) == 'FF' && tir(19) == 'FF' && tir(20) == 'FF' && tir(21) == 'FFF' && tir(35) == 'FFFF' && tir(40) == 'FFFF') {
    echo '<p style="color: green;">Fonction tir bien codée !</p>';
} else {
    echo '<p style="color: red;">Fonction tir MAL codée !</p>';
}

// Fonction qui donne les instruction de déplacement
// En entrée, le nombre de cases à parcourir, par exemple 3
// En sortie, les instructions : "DDD"
function deplacement(int $nbCases): string
{
    // En 1 ligne avec str_repeat
    return str_repeat(INSTRUCTION_DEPLACEMENT, $nbCases);

    // Version avec une boucle : 
        // Initialisation
        // $instructions = '';

        // // Je dois mettre autant de "D" que j'ai de $nbCases
        // for ($i = 1; $i <= $nbCases; $i++) {
        //     $instructions .= INSTRUCTION_DEPLACEMENT;
        // }

        // return $instructions;
}

if (deplacement(3) == 'DDD' && deplacement(4) == 'DDDD' && deplacement(5) == 'DDDDD') {
    echo '<p style="color: green;">Fonction deplacement bien codée !</p>';
} else {
    echo '<p style="color: red;">Fonction deplacement MAL codée !</p>';
}






// 0. Initialisation
$batmobilePosition = 0;
$batmobileInstructions = '';

// 3 fonctions disponibles : triEnnemisParPosition(), tir(), deplacement()

// 1. Parcourir mes ennemis triés
$ennemis = triEnnemisParPosition($ennemis);

foreach ($ennemis as $position => $pointsDeVie) {

    // 2. Instructions de déplacement
    $batmobileInstructions .= deplacement($position - $batmobilePosition);
    $batmobilePosition = $position;

    // 3. Instructions de tir
    $batmobileInstructions .= tir($pointsDeVie);
}


// 4. Affichage final
echo "Instructions complètes : $batmobileInstructions";