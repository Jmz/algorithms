<?php

require('vendor/autoload.php');

use DataStructures\TriangularArray;

/**
 * Class TriangularArrayTest
 *           |London|Manchester|Liverpool|Newcastle|Edinburgh
 * London    |  0   |   336    |   355   |   456   |   666
 * Manchester| 336  |    0     |   56    |   234   |   353
 * Liverpool | 355  |    56    |   0     |   280   |   356
 * Newcastle | 456  |   234    |   280   |   0     |   193
 * Edinburgh | 666  |   353    |   356   |   193   |   0
 */
class TriangularArrayTest extends PHPUnit_Framework_TestCase
{
    private $underTest;

    public function setUp()
    {
        $this->underTest = new TriangularArray();

        $this->underTest->setValue(1, 2, 336);
        $this->underTest->setValue(1, 3, 355);
        $this->underTest->setValue(1, 4, 456);
        $this->underTest->setValue(1, 5, 666);

        $this->underTest->setValue(2, 3, 56);
        $this->underTest->setValue(2, 4, 234);
        $this->underTest->setValue(2, 5, 353);

        $this->underTest->setValue(3, 4, 280);
        $this->underTest->setValue(3, 5, 356);

        $this->underTest->setValue(4, 5, 193);
    }

    public function getValuesDataProvider()
    {
        return [
            [1, 2, 336],
            [1, 3, 355],
            [1, 4, 456],
            [1, 5, 666],

            [2, 1, 336],
            [3, 1, 355],
            [4, 1, 456],
            [5, 1, 666],

            [3, 2, 56],
            [3, 4, 280],
            [3, 5, 356],

            [4, 5, 193],
        ];
    }

    /**
     * @dataProvider getValuesDataProvider
     */
    public function testGetValues($row, $col, $expected)
    {
        $this->assertEquals($expected, $this->underTest->getValue($row, $col));
    }
}
