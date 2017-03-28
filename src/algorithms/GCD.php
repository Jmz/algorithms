<?php

namespace Algorithms;

class GCD
{
    public function find($a, $b)
    {
        while($b != 0) {
            $remainder = $a % $b;

            $a = $b;
            $b = $remainder;
        }

        return $a;
    }
}
