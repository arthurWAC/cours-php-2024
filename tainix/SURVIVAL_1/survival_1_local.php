<?php
namespace Challenges\SURVIVAL_1;

use Tainix\Html;

// ECHANTILLON ------------------------
$islandX = 24;
$islandY = 51;
$planes = ['P:15,69C:EPG', 'P:2,93C:FZI', 'P:18,94C:INV', 'P:19,98C:LBP', 'P:54,94C:OZW', 'P:91,74C:QQQ', 'P:17,12C:OGB', 'P:98,3C:OEC'];

Html::debug($islandX, '$islandX');
Html::debug($islandY, '$islandY');
Html::debug($planes, '$planes');

// CODE DU CHALLENGE ------------------

$island = new Island($islandX, $islandY);

$lostPerson = new LostPerson($island);
$lostPerson->scanSky($planes);
$lostPerson->sortPlanes();

$reponse = $lostPerson->getCodesPlanes(3);

Html::debug($reponse, 'Ma réponse');

// REPONSE ATTENDUE -------------------
Html::debug('EPGOGBINV', 'Réponse attendue', 'success');