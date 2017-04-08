<?php
namespace Tests\LinkedList;

require('vendor/autoload.php');

use DataStructures\LinkedList\LinkedList;

class LinkedListTest extends \PHPUnit_Framework_TestCase
{
    private $underTest;

    public function setUp()
    {
        $this->underTest = new LinkedList();
    }

    public function testDefaultValues()
    {
        $this->assertNull($this->underTest->first());
    }

    public function valueDataProvider()
    {
        return [
            [[123]],
            [[456, 123]],
            [[789, 123, 456]],
            [[321, 654, 987, 123, 456, 789]]
        ];
    }

    /**
     * @dataProvider valueDataProvider
     */
    public function testAddFirst($values)
    {
        foreach($values as $value) {
            $this->underTest->addFirst($value);
        }

        $currentNode = $this->underTest->first();
        foreach(array_reverse($values) as $value) {
            $this->assertEquals($value, $currentNode->value());
            $currentNode = $currentNode->next();
        }
    }

    /**
     * @dataProvider valueDataProvider
     */
    public function testAddLast($values)
    {
        foreach($values as $value) {
            $this->underTest->addLast($value);
        }

        $currentNode = $this->underTest->first();
        foreach($values as $value) {
            $this->assertEquals($value, $currentNode->value());
            $currentNode = $currentNode->next();
        }
    }

    /**
     * @dataProvider valueDataProvider
     */
    public function testRemoveFirst($values)
    {
        foreach($values as $value) {
            $this->underTest->addFirst($value);
        }

        $this->underTest->removeFirst();

        $values = array_reverse($values);
        unset($values[0]);

        $currentNode = $this->underTest->first();
        foreach($values as $value) {
            $this->assertEquals($value, $currentNode->value());
            $currentNode = $currentNode->next();
        }
    }

    /**
     * @dataProvider valueDataProvider
     */
    public function testRemoveLast($values)
    {
        foreach($values as $value) {
            $this->underTest->addFirst($value);
        }

        $this->underTest->removeLast();

        unset($values[0]);

        $currentNode = $this->underTest->first();
        foreach(array_reverse($values) as $value) {
            $this->assertEquals($value, $currentNode->value());
            $currentNode = $currentNode->next();
        }
    }

}
