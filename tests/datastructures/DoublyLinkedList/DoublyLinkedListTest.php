<?php
namespace Tests\DoublyLinkedList;

require('vendor/autoload.php');

use DataStructures\DoublyLinkedList\DoublyLinkedList;

class DoublyLinkedListTest extends \PHPUnit_Framework_TestCase
{
    private $underTest;

    public function setUp()
    {
        $this->underTest = new DoublyLinkedList();
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

    public function testGetPreviousNode()
    {
        $this->underTest->addFirst(999);
        $this->underTest->addFirst(432);

        // Get the first node
        $firstNode = $this->underTest->first();
        $this->assertEquals(432, $firstNode->value());

        // Then the second node
        $secondNode = $firstNode->next();
        $this->assertEquals(999, $secondNode->value());

        // This should be the same as the first node
        $previousNode = $secondNode->prev();
        $this->assertEquals(432, $previousNode->value());
    }

}
