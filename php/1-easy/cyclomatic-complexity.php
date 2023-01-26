<?php
/* 
Plutot que de faire une vérification pour chaque unité, on peut faire une boucle
qui va vérifier si la valeur est supérieure à 1024, et si oui, on divise par 1024
et on incrémente l'index de l'unité, et ce tant que la valeur est supérieure ou égale à 1024
ou que l'index de l'unité est inférieur à la taille du tableau - 1.
Puis on utilise round pour arrondire le résultat à la précision voulue.
*/
function convertSize($bytes, $precision = 2) {
    $units = array("B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB");
    $index = 0;
    while ($bytes >= 1024 && $index < count($units) - 1) {
        $bytes /= 1024;
        $index++;
    }
    return round($bytes, $precision) . " " . $units[$index];
}

/* function convertSize($bytes, $precision = 2) {
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
} */




