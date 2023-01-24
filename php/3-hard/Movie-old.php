<?php

declare(strict_types=1);


namespace App;


class Movie
{
    // Déplacement des constantes dans un fichier de configuration
    // Les constantes n'étant pas utilisés ici et appelé en statique il n'y a pas d'intérêt 
    public const CHILDREN = 2;
    public const REGULAR = 0; 
    public const NEW_RELEASE = 1;

    private string $title;
    private int $priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $code)
    {
        return $this->priceCode = $code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}