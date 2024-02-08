<?php

namespace Challenges\SURVIVAL_1;

class Calcul
{
    // Pas de constructeur

    // Va fonctionner avec n'importe quel MapPoint (Plane, Island, Boat, etc.)
    public static function distance(MapPoint $mp1, MapPoint $mp2): float
    {
        $X = $mp1->x - $mp2->x;
        $Y = $mp1->y - $mp2->y;

        return sqrt(
            pow($X,2) + pow($Y,2)
        );
    }
}

// On l'utilisera comme ça : 
// $distance = Calcul::distance($plane, $island);

/*
// Version d'avant, contextualisée
function distance(int $islandX, int $islandY, int $avionX, int $avionY) : float
{ 
   $X = $avionX - $islandX;
   $Y = $avionY - $islandY;

    return sqrt(
        pow($X,2) + pow($Y,2)
        );
};
 */