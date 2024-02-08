<?php

namespace Challenges\SURVIVAL_1;

class Plane extends MapPoint
{
    /**
     * Cette propriété ne sert que à Plane
     */
    public readonly string $code;

    public function __construct(
        int $x,
        int $y,
        string $code,
    ) {
        /**
         * Je fais appel au constructeur du parent
         */
        parent::__construct($x, $y);

        /**
         * Je gère après ce qui est propre à l'objet Plane
         */
        $this->code = $code;
    }
}