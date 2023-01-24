<?php

use PHPUnit\Framework\TestCase;
use App\Rover;

require('../../php/2-medium/Rover.php');

class RoverTest extends TestCase
{
  protected $rover;

  public function setUp() :void
  {
      parent::setUp();
      $this->rover = new Rover(3, 3, 'N');
  }

  public function testPlayCommandsSequence(): void {
      $this->assertEquals(true, $this->rover->playCommandsSequence('tfrllrrttf'));
  }

  public function testPlayCommandsSequenceVoid(): void {
    $this->assertEquals(true, $this->rover->playCommandsSequence(''));
  }

  public function testPlayCommandsSequenceFalse(): void {
    $rover = new Rover(3, 3, 'l');
    $this->assertEquals(false, $rover->playCommandsSequence('opkjn'));
  }
}