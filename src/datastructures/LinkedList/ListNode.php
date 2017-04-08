<?php

namespace DataStructures\LinkedList;

class ListNode {

    private $value;
    private $next;

    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
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
}
