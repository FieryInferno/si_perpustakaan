<?php

namespace App\Helpers;

class Helper
{
  public function IDGenerator($model, $trow, $length = 6, $prefix)
  {
    $num = $model::orderBy('id', 'desc')->first();
    if (!$num) {
      $og_length = $length;
      $last_number = '';
    } else {
      $code = substr($num->$trow, strlen($prefix) + 1);
      $actial_last_number = ($code / 1) * 1;
      $increment_last_number = $actial_last_number + 1;
      $last_number_length = strlen($increment_last_number);
      $og_length = $length - $last_number_length;
      $last_number = $increment_last_number;
    }
    $zeros = "";
    for ($i = 0; $i < $og_length; $i++) {
      $zeros .= "0";
    }
    return $prefix . '' . $zeros . $last_number;
  }

  public function InvoiceGenerator($model, $trow, $length = 12, $prefix)
  {
    $num = $model::orderBy('no_transaksi', 'desc')->first();
    if (!$num) {
      $og_length = $length;
      $last_number = '';
    } else {
      $code = substr($num->$trow, strlen($prefix) + 1);
      $actial_last_number = ($code / 1) * 1;
      $increment_last_number = $actial_last_number + 1;
      $last_number_length = strlen($increment_last_number);
      $og_length = $length - $last_number_length;
      $last_number = $increment_last_number;
    }
    $zeros = "";
    for ($i = 0; $i < $og_length; $i++) {
      $zeros .= "0";
    }
    return $prefix . '' . $zeros . $last_number;
  }
}
