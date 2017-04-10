<?php

namespace DataStructures\DoublyLinkedList;

class DoublyLinkedList
{
    private $first;

    public function __construct()
    {
        $this->first = null;
    }

    public function first()
    {
        return $this->first;
    }

    public function addFirst($value)
    {
        // Create a new node from the supplied value
        $node = new ListNode($value);

        // Get the current first node
        $currentFirst = $this->first();

        if ($currentFirst !== null) {
            // Set the prev value of the current first node to be the new node
            $currentFirst->setPrev($node);
        }

        // Set the next param of the new node to the current first node
        $node->setNext($currentFirst);

        // Set the first node of the linked list to be the new node
        $this->first = $node;
    }

    public function addLast($value)
    {
        // If there aren't any nodes then the last node is also the first
        if ($this->first() === null) {
            $this->addFirst($value);
            return;
        }

        // Get the current first node
        $currentNode = $this->first();

        // Create our new node
        $newNode = new ListNode($value);

        // Loop through until we find the last node
        while($currentNode->next() !== null) {
            $currentNode = $currentNode->next();
        }

        // Add the new node after the last node
        $currentNode->setNext($newNode);

        // Set the previous value of the new node to be the existing last node
        $newNode->setPrev($currentNode);
    }

    public function removeFirst()
    {
        // Get the current first node
        $currentFirst = $this->first();

        // Get the current second node
        // which will be the new first node
        $newFirst = $currentFirst->next();

        if ($newFirst !== null) {
            // Remove the previous link from the new first node
            $newFirst->setPrev(null);
        }

        // Make the second node the first node
        $this->first = $newFirst;
    }

    public function removeLast()
    {
        // Get the current first node
        $currentNode = $this->first();

        // If the first node is the last then we're clearing all items from our list
        if ($currentNode->next() === null) {
            $this->first = null;
            return;
        }

        // Find the last node, but keep a reference to the previous node too
        // This is so we know which node was the second last node
        while($currentNode->next() !== null) {
            $previousNode = $currentNode;
            $currentNode = $currentNode->next();
        }

        // Set the next parameter of our second last node to be null
        // effectively removing the current last node from our list
        $previousNode->setNext(null);
    }
}
