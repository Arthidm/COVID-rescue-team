<?php
/**
* @package CovidResQ
*/

class CovidResQActivate
{
  public static function activate() {
    // flush rewrite rules
    flush_rewrite_rules();
  }
}
