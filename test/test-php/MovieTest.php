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
      $this->movie = new Movie('Titre film', 35);
  }

  public function testGetPriceCode(): void {
      $this->assertEquals(35, $this->movie->getPriceCode());
  }

  public function testSetPriceCode(): void {
    $this->movie->setPriceCode(305);
    $this->assertEquals(305, $this->movie->getPriceCode());
  }

  public function testGetTitle(): void {
    $this->assertEquals('Titre film', $this->movie->getTitle());
  }
}