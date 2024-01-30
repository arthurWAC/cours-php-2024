<?php
//== NE PAS TOUCHER
$tweets = [
    "49123;ArtisticSamurai,ArtisticNerd,ArtisticSuperstar,ArtisticEnthusiast",
    "25731;ArtisticGuru,FunkyFreshArt,PopCultureScribe,PopCulturePalooza",
    "31314;PopCulturePundit,ArtisticSuperstar,DigitalArtistHub,PopCultureScribe",
    "7256;DigitalDabbler,ArtisticEnthusiast,ArtisticNerd,ArtisticHero,FunLovingArtist",
    "21333;FunkyFreshArt,ArtisticEnthusiast,FunCreativeGal,ArtisticSuperstar","19596;ArtisticGuru,PopCultureScribe",
    "18020;ArtisticSamurai,PopCulturePalooza,ArtisticNinja,DigitalDabbler",
    "1729;PopCultureScribe,ArtisticNinja,MangaMermaid",
    "1973;DigitalMaven,FunLovingArtist",
    "46243;ArtisticSuperstar,PopCultureScribe,ArtisticNinja",
    "14790;FunCreativeGal,DigitalDabbler,DigitalDreamer",
    "41357;ArtisticNerd,FunkyFreshArt",
    "2816;MangaMermaid,PopCulturePundit,FunLovingArtist,ArtisticSuperstar",
    "44363;ArtisticWarrior,DigitalDabbler,DigitalArtistHub,PopCulturePundit,MangaMermaid",
    "24103;FunCreativeGal,DigitalDreamer,ArtisticEnthusiast,ArtisticWarrior","20051;ArtisticSuperstar,ArtisticEnthusiast,FunkyFreshArt","3225;DigitalDreamer,DigitalMaven,DigitalDabbler,FunLovingArtist,PopCulturePundit","29990;DigitalMaven,FunCreativeGal,DigitalWizardry","9006;FunCreativeGal,DigitalDreamer,ArtisticSamurai","4530;MangaMermaid,DigitalDabbler,ArtisticEnthusiast,ArtisticWarrior","5006;ArtisticSuperstar,ArtisticGuru,PopCulturePundit,ArtisticWarrior","33651;PopCultureScribe,ArtisticGuru,ArtisticNerd,FunCreativeGal,ArtisticSamurai","21362;DigitalWizardry,PopCulturePundit,DigitalDabbler,FunLovingArtist,PopCulturePalooza","39151;ArtisticNerd,FunLovingArtist,PopCultureScribe","22654;FunLovingArtist,DigitalMaven","13784;ArtisticWarrior,PopCultureScribe,ArtisticEnthusiast","35500;FunLovingArtist,ArtisticEnthusiast,ArtisticGuru","3045;FunkyFreshArt,FunLovingArtist,FunCreativeGal,ArtisticNinja,PopCultureScribe","45736;ArtisticSamurai,ArtisticNinja,ArtisticNerd,PopCultureScribe","27956;ArtisticSamurai,ArtisticNerd,DigitalDabbler,ArtisticWarrior,DigitalMaven","26846;FunLovingArtist,DigitalWizardry","36367;FunLovingArtist,DigitalArtistHub","33167;ArtisticNinja,FunCreativeGal,ArtisticSuperstar","2934;MangaMermaid,ArtisticEnthusiast","29160;FunCreativeGal,ArtisticNinja,DigitalMaven","22892;DigitalArtistHub,DigitalDabbler,FunCreativeGal,ArtisticWarrior,ArtisticGuru","3426;DigitalArtistHub,ArtisticSuperstar,PopCulturePalooza,DigitalWizardry","14624;ArtisticGuru,ArtisticSamurai,ArtisticWarrior,ArtisticHero,ArtisticNinja","42993;ArtisticWarrior,ArtisticGuru,DigitalWizardry,DigitalDabbler","15641;ArtisticSamurai,ArtisticHero,DigitalDabbler","25694;ArtisticHero,ArtisticGuru,PopCulturePalooza","30653;PopCultureScribe,DigitalWizardry,FunkyFreshArt,DigitalDreamer,DigitalDabbler","45843;ArtisticSuperstar,ArtisticWarrior,MangaMermaid,ArtisticNinja,DigitalWizardry","16707;ArtisticHero,ArtisticSamurai,DigitalMaven","39430;ArtisticNerd,ArtisticSamurai,FunkyFreshArt,FunLovingArtist,DigitalDreamer","12479;FunLovingArtist,MangaMermaid","18144;DigitalWizardry,DigitalMaven","25519;DigitalArtistHub,ArtisticWarrior,PopCultureScribe","11772;PopCultureScribe,ArtisticWarrior,DigitalDreamer,PopCulturePalooza","24412;PopCulturePundit,DigitalMaven,ArtisticHero,FunkyFreshArt","40692;ArtisticNerd,DigitalWizardry,ArtisticGuru,MangaMermaid","12538;ArtisticNinja,ArtisticEnthusiast,ArtisticSuperstar,DigitalMaven,DigitalDreamer","29127;ArtisticSuperstar,DigitalDabbler,PopCulturePundit","25749;DigitalMaven,FunCreativeGal","32041;DigitalMaven,ArtisticSuperstar,DigitalDreamer,ArtisticGuru,PopCultureScribe","29668;ArtisticSuperstar,PopCulturePundit,ArtisticGuru,FunkyFreshArt","49883;ArtisticHero,DigitalDabbler,ArtisticSamurai","34662;ArtisticGuru,ArtisticEnthusiast,FunCreativeGal,FunLovingArtist","3499;ArtisticSuperstar,ArtisticEnthusiast","26664;DigitalDabbler,ArtisticWarrior,DigitalArtistHub,ArtisticSuperstar","40767;ArtisticNerd,DigitalMaven,MangaMermaid,DigitalDreamer,DigitalDabbler"];
//== NE PAS TOUCHER

// 0. Initialisation un tableau qui va stocker toutes les portees
$porteesDesComptes = [];
/**
 * [
 *  'ArtisticSamurai' => 13456,
 *  'ArtisticSuperstar' => 5442,
 *  'ArtisticEnthusiast' => 536867
 * ]
 */

// 1. Parcourir les tweets
foreach ($tweets as $tweet) {
    // 2. Récupérer les différentes informations du tweet
    $informations = explode(';', $tweet); // => ['49123', 'ArtisticSamurai,ArtisticNerd,ArtisticSuperstar,ArtisticEnthusiast']
    
    $portee = $informations[0]; // 49123
    $comptes = explode(',', $informations[1]); // => ['ArtisticSamurai', 'ArtisticNerd', 'ArtisticSuperstar', 'ArtisticEnthusiast']
    
    // Cool, j'ai toutes les informations bien rangées
    
    // 3. Je parcours chaque compte pour faire la somme des portées
    foreach ($comptes as $compte) {
        // Sur une itération, j'ai 'ArtisticSamurai' dans $compte
        // La valeur de $portee ne change pas

        // Initialisation de la portée
        if (! isset($porteesDesComptes[$compte])) {
            $porteesDesComptes[$compte] = 0; // $porteDesComptes['ArtisticSamurai'] = 0;
        }

        $porteesDesComptes[$compte] += $portee; // $porteDesComptes['ArtisticSamurai'] += 49123;
    }
}

// 4. Recherche du maximum en analysant $porteesDesComptes
// V1 : avec le max
$max = max($porteesDesComptes);
$compteMax = array_search($max, $porteesDesComptes);
echo $compteMax . ':' . $max;

echo '<br />';

// V2 : avec un tri
arsort($porteesDesComptes); // "a" => "associative", "r" => "reverse"
$compteMax = array_key_first($porteesDesComptes); // 'DigitalDabbler'
$max = $porteesDesComptes[$compteMax];

echo $compteMax . ':' . $max;

echo '<pre>';
print_r($porteesDesComptes);
echo '</pre>';