<?php

namespace app;

use function Sodium\compare;

class ComplexMain
{

    public float $first; //real
    public float $second; //complex

    function __construct($first = 0, $second = 0)
    {
        $this->first = $first;
        $this->second = $second;
    }

    function __toString()
    {
        return "({$this->first},{$this->second})";
    }

    function getReal(): float
    {
        return $this->first;
    }

    function getComplex(): float
    {
        return $this->second;
    }

    function add(ComplexMain $complexMain): void
    {
        $this->first += $complexMain->getReal();
        $this->second += $complexMain->getComplex();
    }

    function sub(ComplexMain $complexMain): void
    {
        $this->first -= $complexMain->getReal();
        $this->second -= $complexMain->getComplex();
    }

    function mult(ComplexMain $complexMain): void
    {
        $helperNum = $this->first;
        $this->first = $this->first * $complexMain->getReal() - $this->second * $complexMain->getComplex();
        $this->second = $helperNum * $complexMain->getComplex() + $this->second * $complexMain->getReal();
    }

    function div(ComplexMain $complexMain): void
    {
        if ($complexMain->getReal() != 0 && $complexMain->getComplex() != 0) {
            $helperNum = $this->first;

            $this->first = (($this->first * $complexMain->getReal()) + ($this->second * $complexMain->getComplex()))
                /
                (pow($complexMain->getReal(), 2) + pow($complexMain->getComplex(), 2));

            $this->second = (($this->second * $complexMain->getReal()) - ($helperNum * $complexMain->getComplex()))
                /
                (pow($complexMain->getReal(), 2) + pow($complexMain->getComplex(), 2));
        } else echo "Div 0";
    }

    function abs(): float
    {
        return sqrt(pow($this->first, 2) + pow($this->second, 2));
    }
}