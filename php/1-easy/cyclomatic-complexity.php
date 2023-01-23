<?php

require('config-magic-variable.php');

function convertBytesSize(float $bytes, int $roundNumberPrecision = 2): string {
  return getBytesSize($bytes, $roundNumberPrecision);
}

function getBytesSize(float $bytes, int $roundNumberPrecision): string {
  foreach(constant('listOfSize') as $size) {
    
    if($bytes < constant('sizeLimitForConversion')) {
      return round($bytes, $roundNumberPrecision) . $size;
    }

    $bytes /= constant('sizeLimitForConversion');
  }

  return round($bytes, $roundNumberPrecision) . array_pop(constant('listOfSize'));
}