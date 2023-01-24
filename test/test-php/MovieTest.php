<?php

use PHPUnit\Framework\TestCase;
use App\Movie;

require('../../php/3-hard/Movie.php');

class MovieTest extends TestCase
{
  protected $movie;

  public function setUp() :void
  {
      parent::setUp();
      $this->movie = new Movie('Titre film', 2);
  }

  public function testGetPriceCode(): void {
      $this->assertEquals(2, $this->movie->getPriceCode());
  }

  public function testSetPriceCode(): void {
    $this->movie->setPriceCode(0);
    $this->assertEquals(0, $this->movie->getPriceCode());
  }

  public function testGetTitle(): void {
    $this->assertEquals('Titre film', $this->movie->getTitle());
  }
}