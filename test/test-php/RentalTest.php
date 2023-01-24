<?php

use PHPUnit\Framework\TestCase;
use App\Rental;
use App\Movie;

require('../../php/3-hard/Movie.php');
require('../../php/3-hard/Rental.php');

class RentalTest extends TestCase
{
  protected $rental;
  protected $movie;

  public function setUp() :void
  {
      parent::setUp();
      $this->movie = new Movie('Titre film', 35);
      $this->rental = new Rental($this->movie, 3);
  }

  public function testGetDaysRented(): void {
      $this->assertEquals(3, $this->rental->getDaysRented());
  }

  public function testGetMovie(): void {
    $this->assertEquals($this->movie, $this->rental->getMovie());
  }
}