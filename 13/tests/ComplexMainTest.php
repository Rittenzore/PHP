<?php
namespace tests;

use app\ComplexMain;
use PHPUnit\Framework\TestCase;

require_once "..\app\ComplexMain.php";

class ComplexMainTest extends TestCase {

    function testAdd() {
        $main = new ComplexMain(1, 2);
        $main2 = new ComplexMain(3, 4);
        $main->add($main2);
        self::assertEquals("(6,7)", $main->__toString());
    }

    function testSub() {
        $main = new ComplexMain(1, 2);
        $main2 = new ComplexMain(5, 0);
        $main->sub($main2);
        self::assertFalse("(30,30)" == $main->__toString());
    }

    function testMult() {
        $main = new ComplexMain(1, 2);
        $main2 = new ComplexMain(2, 3);
        $main->mult($main2);
        self::assertTrue("(-3,10)" == $main->__toString());
    }

    function testDiv() {
        $main = new ComplexMain(1, 5);
        $main2 = new ComplexMain(2, 6);
        $main->div($main2);
        self::assertFalse("(0.7,0.3)" != $main->__toString());
    }

    function testAbs() {
        $main = new ComplexMain(2, 2);
        self::assertTrue("1" != $main->abs());
    }

    function testDiv0() {
        $main = new ComplexMain(1, 1);
        $main2 = new ComplexMain(0, 0);
        $main->div($main2);
        self::expectOutputString("Div 0");
    }

    function testToString() {
        $main = new ComplexMain(1, 1);
        self::assertTrue("(1,1)" == $main->__toString());
    }
}