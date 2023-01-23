<?php

use PHPUnit\Framework\TestCase;

include_once('../../php/1-easy/cyclomatic-complexity.php');
include_once('../../php/1-easy/config-magic-variable.php');

class cyclomaticComplexityTest extends TestCase
{
  public function testBytes(): void {
      $this->assertEquals('1 B', convertBytesSize(1));
  }

  public function testKiloBytes(): void {
      $this->assertEquals('1 KB', convertBytesSize(constant('sizeLimitForConversion')));
  }

  public function testMegaBytes(): void {
      $this->assertEquals('1 MB', convertBytesSize(pow(constant('sizeLimitForConversion'), 2)));
  }

  public function testGigaBytes(): void {
      $this->assertEquals('1 GB', convertBytesSize(pow(constant('sizeLimitForConversion'), 3)));
  }

  public function testTeraBytes(): void {
      $this->assertEquals('1 TB', convertBytesSize(pow(constant('sizeLimitForConversion'), 4)));
  }

  public function testPetaBytes(): void {
      $this->assertEquals('1 PB', convertBytesSize(pow(constant('sizeLimitForConversion'), 5)));
  }

  public function testExaBytes(): void {
      $this->assertEquals('1 EB', convertBytesSize(pow(constant('sizeLimitForConversion'), 6)));
  }

  public function testZettaBytes(): void {
      $this->assertEquals('1 ZB', convertBytesSize(pow(constant('sizeLimitForConversion'), 7)));
  }

  public function testYottaBytes(): void {
      $this->assertEquals('1 YB', convertBytesSize(pow(constant('sizeLimitForConversion'), 8)));
  }

  public function testHellaBytes(): void {
      $this->assertEquals('1 HB', convertBytesSize(pow(constant('sizeLimitForConversion'), 9)));
  }
}