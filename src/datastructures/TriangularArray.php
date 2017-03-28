<?php

namespace DataStructures;

/**
 * Class TriangularArray
 * @package DataStructures
 *
 * This matrix:
 *
 *           |London|Manchester|Liverpool|Newcastle|Edinburgh
 * London    |  0   |   336    |   355   |   456   |   666
 * Manchester| 336  |    0     |   56    |   234   |   353
 * Liverpool | 355  |    56    |   0     |   280   |   356
 * Newcastle | 456  |   234    |   280   |   0     |   193
 * Edinburgh | 666  |   353    |   356   |   193   |   0
 *
 * Becomes:
 *
 * [336, 355, 56, 456, 234, 280, 666, 353, 356, 193]
 */

class TriangularArray
{
    private $values = [];

    public function setValue($row, $column, $value)
    {
        $this->values[$this->findRowColumn($row, $column)] = $value;
    }

    public function getValue($row, $column)
    {
        return $this->values[$this->findRowColumn($row, $column)];
    }

    private function findRowColumn($row, $column)
    {
        if ($row < $column) {
            $oldRow = $row;
            $oldColumn = $column;

            $row = $oldColumn;
            $column = $oldRow;
        }

        return $row * ($row - 1) / 2 + $column;
    }
}
