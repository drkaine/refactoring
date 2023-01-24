<?php

declare(strict_types=1);


namespace App;


class Customer
{
    public function __construct(String $name)
    {
        $this->name = $name;
    }

    // Décomposition du return pour que le typage de retour ne fasse pas de warning

    public function addRental(Rental $rental)
    {
        return $this->rentals[] = $rental;
    }

    // Je déplace la méthode pour regrouper les appels de la variable name

    public function getName(): string
    {
        return $this->name;
    }

    // J'ai renommé des variables pour mieux exprimer leur but

    public function statement(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

        // J'ai passe le foreach dans une nouvelle méthode pour respecter le SRP

        foreach ($this->rentals as $each){
           $thisAmount = 0.0;


            // J'ai passe le switch dans une nouvelle méthode pour respecter le SRP
           /* @var $each Rental */
           // determines the amount for each line
           switch($each->getMovie()->getPriceCode()) {
               case Movie::REGULAR:
                   $thisAmount += 2;
                   if($each->getDaysRented() > 2)
                       $thisAmount += ($each->getDaysRented() - 2) * 1.5;
                   break;
               case Movie::NEW_RELEASE:
                   $thisAmount += $each->getDaysRented() * 3;
                   break;
               case Movie::CHILDREN:
                   $thisAmount += 1.5;
                   if($each->getDaysRented() > 3) {
                       $thisAmount += ($each->getDaysRented() - 3) * 1.5;
                   }
                   break;
           }

           // J'ai passe le calcul de $frequentRenterPoints dans une nouvelle méthode pour respecter le SRP
           $frequentRenterPoints++;

           if($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE
                && $each->getDaysRented() > 1)
               $frequentRenterPoints++;

            $result .= "\t" . $each->getMovie()->getTitle() . "\t"
                . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;

        }

        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }

    // Déplacement des variables au niveau de leur premier appel

    private string $name;
    private array $rentals = [];
}