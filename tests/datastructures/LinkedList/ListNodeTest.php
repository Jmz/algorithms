<?php

namespace Tests\LinkedList;

require('vendor/autoload.php');

use DataStructures\LinkedList\ListNode;

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
    }

    public function testSetNextNode()
    {
        $newNode = new ListNode(88);
        $this->underTest->setNext($newNode);
        $this->assertEquals($newNode, $this->underTest->next());
    }
}
