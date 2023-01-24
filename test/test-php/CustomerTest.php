<?php

use PHPUnit\Framework\TestCase;
use App\Rental;
use App\Movie;
use App\Customer;

require('../../php/3-hard/Customer.php');
require('../../php/3-hard/Movie.php');
require('../../php/3-hard/Rental.php');

class CustomerTest extends TestCase
{
  protected $rental;
  protected $movie;
  protected $customer;

  public function setUp() :void
  {
      parent::setUp();
      $this->movie = new Movie('Titre film', 0);
      $this->rental = new Rental($this->movie, 3);
      $this->customer = new Customer('Customer Test');
  }

  public function testGetName(): void {
      $this->assertEquals('Customer Test', $this->customer->getName());
  }

  public function testAddRental(): void {
    $this->assertEquals([$this->rental], $this->customer->addRental($this->rental));
  }

  public function testResumeOfMoviesRentedWithNoRented(): void {
    $execptedResult = 'Rental Record for Customer Test\n';
    $this->assertEquals($execptedResult, $this->customer->resumeOfMoviesRented());
  }

  public function testResumeOfMoviesRented(): void {
    $execptedResult = 'Rental Record for Customer Test\n\tTitre film\t3.5\nYou owed 3.5\nYou earned 1 frequent renter points\n';
    $this->customer->addRental($this->rental);
    $this->assertEquals($execptedResult, $this->customer->resumeOfMoviesRented());
  }
}