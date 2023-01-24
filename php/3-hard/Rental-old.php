<?php

// J'ai juste déplacé les variables movie et daysRented au début de la classe
// Au dessus de leur premier appel

declare(strict_types=1);

namespace App;

class Rental
{
    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented(): int
    {
        return $this->daysRented;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    private Movie $movie;
    private int $daysRented;
}