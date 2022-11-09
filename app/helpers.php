<?php

use Carbon\Carbon;


 function umurReal($dt, $umur) {
      $now = Carbon::now();
      $thisYear = $now->year;
      dump($dt);
      //  $chiuTaoYear = $dt->year;
       $chiuTaoYear = 2000;
 
      // $y2 = thisYear.getFullYear();
      // $y1 = chiuTaoYear.getFullYear();
      $y2 = $thisYear;
      $y1 = $chiuTaoYear;
     return $y2 - $y1 + $umur;
 }