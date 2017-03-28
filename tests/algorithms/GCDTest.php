<?php

include('vendor/autoload.php');

use Algorithms\GCD;

class GCDTest extends PHPUnit_Framework_TestCase
{
    private $underTest;

    public function setUp()
    {
        $this->underTest = new GCD();
    }

    public function gcdTestProvider()
    {
        return [
            [10, 20, 10],
            [100, 80, 20],
            [36, 99, 9],
            [130, 583, 1],
            [19200, 6850, 50]
        ];
    }

    /**
     * @dataProvider gcdTestProvider
     */
    public function testGetGCD($a, $b, $result)
    {
        $this->assertEquals($result, $this->underTest->find($a, $b));
    }
}
