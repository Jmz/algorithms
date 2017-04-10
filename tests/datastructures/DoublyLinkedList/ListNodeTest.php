<?php

namespace Tests\DoublyLinkedList;

require('vendor/autoload.php');

use DataStructures\DoublyLinkedList\ListNode;

class ListNodeTest extends \PHPUnit_Framework_TestCase
{
    private $underTest;

    public function setUp()
    {
        $this->underTest = new ListNode(99);
    }

    public function testGetValue()
    {
        $this->assertEquals(99, $this->underTest->value());
        $this->assertNull($this->underTest->next());
        $this->assertNull($this->underTest->prev());
    }

    public function testSetNextNode()
    {
        $newNode = new ListNode(88);
        $this->underTest->setNext($newNode);
        $this->assertEquals($newNode, $this->underTest->next());
    }

    public function testSetPrevNode()
    {
        $newNode = new ListNode(123);
        $this->underTest->setPrev($newNode);
        $this->assertEquals($newNode, $this->underTest->prev());
    }
}
