<?php
/**
* @package CovidResQ
*/

class CovidResQDeactivate
{
  public static function deactivate() {
    // flush rewrite rules
    flush_rewrite_rules();
  }
}
