<?php

class GoodClass {

    function first() {
        $x = rand(0, 1);
        if (!$x) {
            throw new \exceptions\FirstException("Division by zero");
        }
        if ($x % 2 != 0) {
            throw new \exceptions\SecondException('Odd number');
        }
    }

    function third() {
        $x = rand(1, 2);
        if ($x == 1) {
            throw new \exceptions\ThirdException("Found NULL");
        }
        if ($x == 2) {
            throw new \exceptions\FifthException('The string must contain at least one uppercase letter');
        }
    }

    function second() {
        $x = rand(1, 2);
        if ($x == 1) {
            throw new \exceptions\ThirdException("Found NULL");
        }
        if ($x == 2) {
            throw new \exceptions\FourthException("File not found");
        }
    }

    function four() {
            $x = rand(1, 2);
            if ($x == 1) {
                throw new \exceptions\SecondException('Odd number');
            }
            if ($x == 2) {
                throw new \exceptions\ThirdException("Found NULL");
            }
        }
}