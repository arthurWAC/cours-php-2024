<?php
//== NE PAS TOUCHER
$orders = ["69,noir,piment,epice_surprise","73,au_lait,cannelle,epice_surprise","77,noir,piment,tasse_froide","78,noir,muscade","67,noir,piment","78,melange,piment,chocolat_brule","63,noir,muscade","65,noir,piment,chocolat_brule","69,noir,piment,epice_surprise","68,noir,piment,epice_surprise","71,blanc,piment,chocolat_brule","70,au_lait,piment,tasse_froide","61,au_lait,muscade","65,noir,vanille,chocolat_brule","74,au_lait,piment,epice_surprise","71,blanc,vanille","72,au_lait,vanille,epice_surprise"];
//== NE PAS TOUCHER

// Configurations

// Chocolat noir : Monter la température de 5° "noir"
// Chocolat au lait : Monter la température de 10° "au_lait"
// Chocolat blanc : Monter la température de 15° "blanc"
// Mélange de chocolats : Monter la température de 12° "melange"
$temperaturesSelonTypeDeChocolat = [
    'noir' => 5,
    'au_lait' => 10,
    'blanc' => 15,
    'melange' => 12,
];

// Cannelle : Monter la température de 4°
// Muscade : Monter la température de 7°
// Piment : Monter la température de 9°
// Vanille : Monter la température de 1°
$temperaturesSelonTypeDEpice = [
    'cannelle' => 4,
    'muscade' => 7,
    'piment' => 9,
    'vanille' => 1
];

// Résultat attendu : 158
$sommeDesTemperatures = 0;

foreach ($orders as $order) {

    $detailsDeMaCommande = explode(',', $order);

    // Température :
    $temperature = (int) $detailsDeMaCommande[0]; // "34" => 34

    // Le type de chocolat :
    $typeDeChocolatDeMaCommande = $detailsDeMaCommande[1];
    $temperature += $temperaturesSelonTypeDeChocolat[$typeDeChocolatDeMaCommande] ?? 0;

    // Le type d’épices ajoutée(s) :
    $typeDEpicesDeMaCommande = $detailsDeMaCommande[2];
    $temperature += $temperaturesSelonTypeDEpice[$typeDEpicesDeMaCommande] ?? 0;

    // Evènements
    if (array_key_exists(3, $detailsDeMaCommande)) {
        $evenementParticulier = $detailsDeMaCommande[3];
        
        $temperature = match($evenementParticulier) {
            'chocolat_brule' => $temperature - 10,
            'epice_surprise' => $temperature + 10,
            'tasse_froide' => $temperature * 2,
            default => $temperature
        };
    }
    
    $sommeDesTemperatures += $temperature;
}

$moyenne = $sommeDesTemperatures / count($orders); // Attention à la division par zéro !
echo ceil($moyenne);