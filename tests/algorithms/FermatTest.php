<?php

namespace Tests\Algorithms;

include('vendor/autoload.php');

use Algorithms\Fermat;

class FermatTest extends \PHPUnit_Framework_TestCase
{
    private $underTest;

    public function setUp()
    {
        $this->underTest = new Fermat();
    }

    public function primeNumberDataProvider()
    {
        return [
            [11], [13], [17], [19], [23], [29], [31], [37], [41],
            [43], [47], [53], [59], [61], [67], [71], [73], [79],
            [83], [89], [97], [101], [103], [107], [109], [113], [127]
        ];
    }

    /**
     * @dataProvider primeNumberDataProvider
     */
    public function testPrimeNumbersReturnTrue($check)
    {
        $this->assertTrue($this->underTest->isPrime($check));
    }

    public function notPrimeNumberGenerator()
    {
        return [
            [12], [15], [18], [45], [46], [50], [100],
            [123], [250]
        ];
    }

    /**
     * @dataProvider notPrimeNumberGenerator
     */
    public function testNotPrimeNumberReturnsFales($check)
    {
        $this->assertNotTrue($this->underTest->isPrime($check));
    }
}
