<?php

namespace Challenges\SURVIVAL_1;

/**
 * Classe parent de Island et Plane
 */
class MapPoint
{
    public function __construct(
        public readonly int $x,
        public readonly int $y,
    ) {}
}