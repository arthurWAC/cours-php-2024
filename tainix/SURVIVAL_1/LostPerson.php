<?php

namespace Challenges\SURVIVAL_1;

class LostPerson
{
    /**
     * @var Plane[] $planes
     */
    private array $planes = [];

    public function __construct(
        public readonly Island $island,
    ) {}

    public function scanSky(array $planesInformations): void
    {
        // C'est là qu'on va faire le parsing
        foreach ($planesInformations as $informations) {

            // Parsing (déjà fait)
            $informations = str_replace('P:', '', $informations);
            $informations = str_replace('C:', ',', $informations);
            
            // 85,48,UPM => explode(',') et terminé !
            [$planeX, $planeY, $planeCode] = explode(',', $informations);

            // Je crée mon Plane
            // Je mets mon nouveau Plane dans $this->planes
            $this->planes[] = new Plane((int) $planeX, (int) $planeY, $planeCode);
        }
    }

    public function sortPlanes(): void
    {
        // On va travailler sur $this->planes
        // On va devoir utiliser usort (cf. doc PHP)
        // On va introduire la notion de "callable" (ça veut dire "fonction")
        usort($this->planes, function(Plane $plane1, Plane $plane2) {

            // Calcul des distances par rapport à l'île
            $distance1 = Calcul::distance($plane1, $this->island);
            $distance2 = Calcul::distance($plane2, $this->island);

            // "Spaceship" operator <=>
            return $distance1 <=> $distance2; // -1, 0 ou 1
        });
    }

    public function getCodesPlanes(int $nbPlanes): string
    {
        $reponse = '';
        $compteur = 0;

        foreach ($this->planes as $plane) {
            $reponse .= $plane->code;

            $compteur++;
            if ($compteur === $nbPlanes) {
                break;
            }
        }

        return $reponse;
    }
}