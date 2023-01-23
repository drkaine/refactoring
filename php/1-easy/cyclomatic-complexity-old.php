<?php

// Je crée des tests unitaires pour chacun des cas possibles de la fonction

function convertSize($bytes, $precision = 2) {
  $kilobytes = $bytes / 1024;

  if ($kilobytes < 1024) {
    return round($bytes, $precision) . ' KB';
  }

  $megabytes = $kilobytes / 1024;

  if ($megabytes < 1024) {
    return round($megabytes, $precision) . ' MB';
  }

  $gigabytes = $megabytes / 1024;

  if ($gigabytes < 1024) {
    return round($gigabytes, $precision) . ' GB';
  }

  $terabytes = $gigabytes / 1024;

  if ($terabytes < 1024) {
    return round($terabytes, $precision) . ' TB';
  }

  $petabytes = $terabytes / 1024;

  if ($petabytes < 1024) {
    return round($petabytes, $precision) . ' TB';
  }

  $exabytes = $petabytes / 1024;

  if ($exabytes < 1024) {
    return round($exabytes, $precision) . ' EB';
  }

  $zettabytes = $exabytes / 1024;

  if ($zettabytes < 1024) {
    return round($zettabytes, $precision) . ' ZB';
  }

  $yottabytes = $zettabytes / 1024;

  if ($yottabytes < 1024) {
    return round($yottabytes, $precision) . ' ZB';
  }

  $hellabyte = $yottabytes / 1024;

  if ($hellabyte < 1024) {
    return round($hellabyte, $precision) . ' HB';
  }
  
  return $bytes . ' B';
}

// D'abord j'ai remplacé les "variables magiques" dans un fichier de configuration
// J'utilise des constantes dans le fichier de configuration, car il y en a peu
// Une autre solution est de faire un fichier composé juste d'un fichier
// return ["nomVariable" => "valeurVariable"];
// J'ai aussi fait du renommage pour avoir des noms plus clair
// Ajout aussi du typage fort de sortie de la fonction et des arguments

require('config-magic-variable.php');

function convertBytesSize(float $bytes, int $roundNumberPrecision = 2): string {
  $kilobytes = $bytes / constant('sizeLimitForConversion');

  if ($kilobytes < constant('sizeLimitForConversion')) {
    return round($bytes, $roundNumberPrecision) . ' KB';
  }

  $megabytes = $kilobytes / constant('sizeLimitForConversion');

  if ($megabytes < constant('sizeLimitForConversion')) {
    return round($megabytes, $roundNumberPrecision) . ' MB';
  }

  $gigabytes = $megabytes / constant('sizeLimitForConversion');

  if ($gigabytes < constant('sizeLimitForConversion')) {
    return round($gigabytes, $roundNumberPrecision) . ' GB';
  }

  $terabytes = $gigabytes / constant('sizeLimitForConversion');

  if ($terabytes < constant('sizeLimitForConversion')) {
    return round($terabytes, $roundNumberPrecision) . ' TB';
  }

  $petabytes = $terabytes / constant('sizeLimitForConversion');

  if ($petabytes < constant('sizeLimitForConversion')) {
    return round($petabytes, $roundNumberPrecision) . ' TB';
  }

  $exabytes = $petabytes / constant('sizeLimitForConversion');

  if ($exabytes < constant('sizeLimitForConversion')) {
    return round($exabytes, $roundNumberPrecision) . ' EB';
  }

  $zettabytes = $exabytes / constant('sizeLimitForConversion');

  if ($zettabytes < constant('sizeLimitForConversion')) {
    return round($zettabytes, $roundNumberPrecision) . ' ZB';
  }

  $yottabytes = $zettabytes / constant('sizeLimitForConversion');

  if ($yottabytes < constant('sizeLimitForConversion')) {
    return round($yottabytes, $roundNumberPrecision) . ' ZB';
  }

  $hellabyte = $yottabytes / constant('sizeLimitForConversion');

  if ($hellabyte < constant('sizeLimitForConversion')) {
    return round($hellabyte, $roundNumberPrecision) . ' HB';
  }
  
  return $bytes . ' B';
}

// J'ai aggloméré les différents if en une boucle foreach sur la liste des différentes tailles
// Je garde la condition if avec le return pour éviter un else superflu
// Si elle n'est pas remplie, je divise la variable $bytes, comme dans les versions précédentes

function convertBytesSize(float $bytes, int $roundNumberPrecision = 2): string {
  foreach(constant('listOfSize') as $size) {
    
    if($bytes < constant('sizeLimitForConversion')) {
      return round($bytes, $roundNumberPrecision) . $size;
    }

    $bytes /= constant('sizeLimitForConversion');
  }

  return round($bytes, $roundNumberPrecision) . array_pop(constant('listOfSize'));
}

// Je sépare la boucle dans une autre fonction pour que chaque fonction ne fassent qu'une seule chose
// convertBytesSize renvoit la convertion
// Et getBytesSize qui donne la conversion

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