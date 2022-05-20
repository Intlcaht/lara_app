<?php

namespace App\Utils;

interface Acceptor {
    public function accept(Visitor $v, $args = emptyArray());
}
