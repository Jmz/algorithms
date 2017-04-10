<?php

namespace DataStructures\DoublyLinkedList;

class ListNode {

    private $value;
    private $next;
    private $prev;

    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
        $this->prev = null;
    }

    public function value()
    {
        return $this->value;
    }

    public function setNext(ListNode $nextNode = null)
    {
        $this->next = $nextNode;
    }

    public function next()
    {
        return $this->next;
    }

    public function setPrev(ListNode $prevNode = null)
    {
        $this->prev = $prevNode;
    }

    public function prev()
    {
        return $this->prev;
    }
}
