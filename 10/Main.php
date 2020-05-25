<?php


class Main
{
    function start()
    {
        $goodClass = new GoodClass();
        try {
            $goodClass->first();
        } catch (\exceptions\FirstException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (\exceptions\SecondException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }

        try {
            $goodClass->second();
        } catch (\exceptions\ThirdException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (\exceptions\FourthException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }

        try {
            $goodClass->third();
        } catch (\exceptions\FifthException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (\exceptions\ThirdException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }

        try {
            $goodClass->four();
        } catch (\exceptions\SecondException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (\exceptions\ThirdException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }
}