<?php

declare(strict_types=1);

namespace App;

class Customer
{
    private string $name;
    private array $listOfPriceCode;
    
    public function __construct(String $name)
    {
        $this->name = $name;
        $this->listOfPriceCode = require('config-magic-variable.php');
    }

    public function getName(): string
    {
        return $this->name;
    }

    private array $listOfRentals;

    public function addRental(Rental $rental): array
    {
        $this->listOfRentals[] = $rental;
        return $this->listOfRentals;
    }

    public function resumeOfMoviesRented(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $resume = 'Rental Record for ' . $this->name . '\n';

        if(!empty($this->listOfRentals)) {
            return $this->createResumeOfMoviesRented($totalAmount, $frequentRenterPoints, $resume);
        }
        return $resume;
    }

    private function createResumeOfMoviesRented(float $totalAmount, int $frequentRenterPoints, string $resume): string {
        foreach ($this->listOfRentals as $rental){
            $thisRentalAmount = 0.0;
            $movie = $rental->getMovie();
            $daysRented = $rental->getDaysRented();

            $thisRentalAmount = $this->calculThisRentalAmount($thisRentalAmount, $movie, $daysRented);

            $frequentRenterPoints = $this->calculFrequentRenterPoints($frequentRenterPoints, $movie, $daysRented);

            $resume .= '\t' . $movie->getTitle() . '\t' . number_format($thisRentalAmount, 1) . '\n';
            $totalAmount += $thisRentalAmount;

        }

        $resume .= 'You owed ' . number_format($totalAmount, 1)  . '\n';
        $resume .= 'You earned ' . $frequentRenterPoints . ' frequent renter points\n';

        return $resume;
    }

    private function calculThisRentalAmount(float $thisRentalAmount, Movie $movie, int $daysRented): float {
        switch($movie->getPriceCode()) {
            case $this->listOfPriceCode['REGULAR']:
                $thisRentalAmount += 2;
                if($daysRented > 2)
                    $thisRentalAmount += ($daysRented - 2) * 1.5;
                break;
            case $this->listOfPriceCode['NEW_RELEASE']:
                $thisRentalAmount += $daysRented * 3;
                break;
            case $this->listOfPriceCode['CHILDREN']:
                $thisRentalAmount += 1.5;
                if($daysRented > 3) {
                    $thisRentalAmount += ($daysRented - 3) * 1.5;
                }
                break;
        }

        return $thisRentalAmount;
    }

    private function calculFrequentRenterPoints(int $frequentRenterPoints, Movie $movie, int $daysRented): int {
        $frequentRenterPoints ++;

        if($movie->getPriceCode() == $this->listOfPriceCode['NEW_RELEASE'] && $daysRented > 1) {
            $frequentRenterPoints ++;
        }

        return $frequentRenterPoints;
    }
}