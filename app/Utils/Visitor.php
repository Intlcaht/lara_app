<?php

namespace App\Utils;
/**
 * Undocumented interface
 */
interface Visitor {
    /**
     * Undocumented function
     *
     * @param [type] $t
     * @param [type] $args
     */
   public function visit($t, $args = emptyArray());
}
