<?php

namespace app\tests\linkedList;

use app\src\linkedList\singly\LinkedList;
use app\src\linkedList\singly\LinkedListHelper;
use app\src\linkedList\singly\Node;

class SinglyLinkedListTest extends \PHPUnit_Framework_TestCase
{
    public function testNode()
    {
        // New node
        $node1 = new Node('value1');
        $this->assertEquals('value1', $node1->getData());
        $this->assertNull($node1->getNext());

        $node2 = new Node('value2');
        $this->assertEquals('value2', $node2->getData());
        $this->assertNull($node2->getNext());

        // Connect nodes
        $node1->setNext($node2);
        $this->assertNotNull($node1->getNext());
        $this->assertNull($node2->getNext());
        $this->assertEquals('value1', $node1->getData());
        $this->assertEquals('value2', $node2->getData());
        $this->assertEquals('value2', $node1->getNext()->getData());
    }

    public function testFirstNode()
    {
        $list = new LinkedList();

        // Getting first element in empty list should be null
        $this->assertNull($list->getFirst());

        // Non-null value in empty list
        $firstNode = new Node('abc');
        $list->setFirst($firstNode);
        $node = $list->getFirst();
        $this->assertEquals('abc', $node->getData());

        // Null in empty list
        $list = new LinkedList();
        $firstNode = new Node();
        $list->setFirst($firstNode);
        $node = $list->getFirst();
        $this->assertNotNull($node);
        $this->assertNull($node->getData());

        // Null in non-empty list
        $firstNode = new Node();
        $list->setFirst($firstNode);
        $node = $list->getFirst();
        $this->assertNotNull($node);
        $this->assertNull($node->getData());

        // Non-null value in non-empty list
        $firstNode = new Node('value');
        $list->setFirst($firstNode);
        $node = $list->getFirst();
        $this->assertNotNull($node);
        $this->assertEquals('value', $node->getData());
    }

    public function testLastNode()
    {
        $list = new LinkedList();

        // Getting last node in an empty list
        $this->assertNull($list->getLast());

        // Setting non-null item as last in empty list
        $lastNode = new Node('abc');
        $list->setLast($lastNode);
        $node = $list->getLast();
        $this->assertEquals('abc', $node->getData());

        // Setting null item as last in empty list
        $list = new LinkedList();
        $lastNode = new Node();
        $list->setLast($lastNode);
        $node = $list->getLast();
        $this->assertNotNull($node);
        $this->assertNull($node->getData());

        // Null in non-empty list
        $lastNode = new Node();
        $list->setLast($lastNode);
        $node = $list->getLast();
        $this->assertNotNull($node);
        $this->assertNull($node->getData());

        // Non-null value in non-empty list
        $lastNode = new Node('value');
        $list->setLast($lastNode);
        $node = $list->getLast();
        $this->assertNotNull($node);
        $this->assertEquals('value', $node->getData());
    }

    public function testToArrayHelperMethod()
    {
        $list = new LinkedList();

        // Empty array should be returned from empty list
        $this->assertEquals([], LinkedListHelper::toArray($list));

        // Non-empty array should be returned from non-empty list
        $node1 = new Node('value1');
        $node2 = new Node('value2');
        $node1->setNext($node2);
        $list->setFirst($node1);
        $this->assertEquals(['value1', 'value2'], LinkedListHelper::toArray($list));
    }

    public function testBaseAddMethod()
    {
        $list = new LinkedList();

        // Add first value
        $this->assertTrue($list->add('value1'));
        $this->assertEquals(['value1'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value1', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value1', $list->getLast()->getData());

        // Add second value
        $this->assertTrue($list->add('value2'));
        $this->assertEquals(['value2', 'value1'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value2', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value1', $list->getLast()->getData());
    }

    public function testBaseListActions()
    {
        $list = new LinkedList();

        // Getting position of any element in empty list
        $this->assertNull($list->getPosition('value'));

        // Getting size of empty list
        $this->assertEquals(0, $list->getSize());

        // Getting size of non-empty list
        $this->assertTrue($list->add('value1'));
        $this->assertEquals(1, $list->getSize());
        $this->assertTrue($list->add('value2'));
        $this->assertEquals(2, $list->getSize());

        // Getting position of existing element in the list
        $this->assertEquals(0, $list->getPosition('value2'));
        $this->assertEquals(1, $list->getPosition('value1'));

        // Getting position of non-existing element in the list
        $this->assertNull($list->getPosition('non-existing value'));

        // Clear non-empty list
        $list->clear();
        $this->assertNull($list->getFirst());
        $this->assertNull($list->getLast());
        $this->assertEquals(0, $list->getSize());

        // Clear empty list
        $list->clear();
        $this->assertNull($list->getFirst());
        $this->assertNull($list->getLast());
        $this->assertEquals(0, $list->getSize());
    }

    public function testAddMethod()
    {
        $list = new LinkedList();

        // Add null value to an empty list
        $this->assertTrue($list->add(null));
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals([null], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertNull($list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertNull($list->getLast()->getData());

        // Add null value to non-empty list
        $this->assertTrue($list->add(null));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals([null, null], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertNull($list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertNull($list->getLast()->getData());

        // Add value to an empty list
        $list->clear();
        $this->assertTrue($list->add('value1'));
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals(['value1'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value1', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value1', $list->getLast()->getData());

        // Add value to non-empty list
        $this->assertTrue($list->add('value2'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['value2', 'value1'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value2', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value1', $list->getLast()->getData());

        // Add another type value to non-empty list
        $this->assertTrue($list->add(35));
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals([35, 'value2', 'value1'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals(35, $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value1', $list->getLast()->getData());

        // Add value to non-empty list to specific position
        $this->assertTrue($list->add('value3', 1));
        $this->assertEquals(4, $list->getSize());
        $this->assertEquals([35, 'value3', 'value2', 'value1'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals(35, $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value1', $list->getLast()->getData());

        // Add value to non-empty list to specific position that larger then size of list
        $this->assertTrue($list->add('value4', 99));
        $this->assertEquals(5, $list->getSize());
        $this->assertEquals([35, 'value3', 'value2', 'value1', 'value4'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals(35, $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value4', $list->getLast()->getData());
    }

    public function testAddFirstMethod()
    {
        $list = new LinkedList();

        // Add new first null value to empty list
        $this->assertTrue($list->addFirst(null));
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals([null], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertNull($list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertNull($list->getLast()->getData());

        // Add new first null value to non-empty list
        $list->clear();
        $this->assertTrue($list->addFirst());
        $this->assertTrue($list->addFirst('value'));
        $this->assertTrue($list->addFirst(null));
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals([null, 'value', null], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertNull($list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertNull($list->getLast()->getData());

        // Add new first non-null value to empty list
        $list->clear();
        $this->assertTrue($list->addFirst('value1'));
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals(['value1'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value1', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value1', $list->getLast()->getData());

        // Add new first non-null value to non-empty list
        $this->assertTrue($list->addFirst('value2'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['value2', 'value1'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value2', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value1', $list->getLast()->getData());
    }

    public function testAddLastMethod()
    {
        $list = new LinkedList();

        // Add new last null value to empty list
        $this->assertTrue($list->addLast(null));
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals([null], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertNull($list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertNull($list->getLast()->getData());

        // Add new last null value to non-empty list
        $this->assertTrue($list->addLast(null));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals([null, null], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertNull($list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertNull($list->getLast()->getData());

        // Add new last non-value to empty list
        $list->clear();
        $this->assertTrue($list->addLast('value1'));
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals(['value1'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value1', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value1', $list->getLast()->getData());

        // Add new last non-value to non-empty list
        $this->assertTrue($list->addLast('value2'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['value1', 'value2'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value1', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value2', $list->getLast()->getData());
    }

    public function testAddBeforeMethod()
    {
        $list = new LinkedList();

        // Add new value before any element in empty list
        $this->assertFalse($list->addBefore('value', 'another value'));
        $this->assertEquals(0, $list->getSize());
        $this->assertEquals([], LinkedListHelper::toArray($list));
        $this->assertNull($list->getFirst());
        $this->assertNull($list->getLast());

        // Add new value before existing element
        $this->assertTrue($list->add('value'));
        $this->assertEquals(1, $list->getSize());
        $this->assertTrue($list->addBefore('another value', 'value'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['another value', 'value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('another value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());

        // Add new value before non-existing element
        $this->assertFalse($list->addBefore('value', 'non-existing value'));
        $this->assertEquals(2, $list->getSize());
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('another value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());

        // Add new value before first element
        $this->assertTrue($list->addBefore('first value', 'another value'));
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals(['first value', 'another value', 'value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('first value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());

        // Add new value before existing middle-positioning element
        $this->assertTrue($list->addBefore('middle value', 'another value'));
        $this->assertEquals(4, $list->getSize());
        $array = ['first value', 'middle value', 'another value', 'value'];
        $this->assertEquals($array, LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('first value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());

        // Add new value before last element in the list
        $this->assertTrue($list->addBefore('pre-last value', 'value'));
        $this->assertEquals(5, $list->getSize());
        $array = ['first value', 'middle value', 'another value', 'pre-last value', 'value'];
        $this->assertEquals($array, LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('first value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());
    }

    public function testAddAfterMethod()
    {
        $list = new LinkedList();

        // Add new value after any element in empty list
        $this->assertFalse($list->addAfter('value', 'another value'));
        $this->assertEquals(0, $list->getSize());
        $this->assertEquals([], LinkedListHelper::toArray($list));
        $this->assertNull($list->getFirst());
        $this->assertNull($list->getLast());

        // Add new value after existing element in the list
        $this->assertTrue($list->add('value'));
        $this->assertEquals(1, $list->getSize());
        $this->assertTrue($list->addAfter('another value', 'value'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['value', 'another value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('another value', $list->getLast()->getData());

        // Add new value after non-existing element in the list
        $this->assertFalse($list->addAfter('value', 'non-existing value'));
        $this->assertEquals(2, $list->getSize());
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('another value', $list->getLast()->getData());

        // Add new value after first list element
        $this->assertTrue($list->addAfter('post-first value', 'value'));
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals(['value', 'post-first value', 'another value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('another value', $list->getLast()->getData());

        // Add new value after some middle-positioning element in the list
        $this->assertTrue($list->addAfter('middle value', 'value'));
        $this->assertEquals(4, $list->getSize());
        $array = ['value', 'middle value', 'post-first value', 'another value'];
        $this->assertEquals($array, LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('another value', $list->getLast()->getData());

        // Add new value after last element in the list
        $this->assertTrue($list->addAfter('last value', 'another value'));
        $this->assertEquals(5, $list->getSize());
        $array = ['value', 'middle value', 'post-first value', 'another value', 'last value'];
        $this->assertEquals($array, LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('last value', $list->getLast()->getData());
    }

    public function testRemoveMethod()
    {
        $list = new LinkedList();

        // Remove any element from empty list
        $this->assertEquals(0, $list->getSize());
        $this->assertFalse($list->remove('some value'));
        $this->assertEquals(0, $list->getSize());

        // Remove some non-existing value from non-empty list
        $this->assertTrue($list->addFirst('value'));
        $this->assertEquals(1, $list->getSize());
        $this->assertFalse($list->remove('some value'));
        $this->assertEquals(1, $list->getSize());

        // Remove some existing value form non-empty list
        $this->assertTrue($list->addFirst('some value'));
        $this->assertEquals(['some value', 'value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('some value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());
        $this->assertEquals(2, $list->getSize());
        $this->assertTrue($list->remove('some value'));
        $this->assertEquals(1, $list->getSize());
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());

        // Remove some repeated value from the list
        $this->assertTrue($list->addFirst('another value'));
        $this->assertTrue($list->addFirst('value'));
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals(['value', 'another value', 'value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());
        $this->assertTrue($list->remove('value'));
        $this->assertEquals(2, $list->getSize());
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('another value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());
    }

    public function testRemoveFirstMethod()
    {
        $list = new LinkedList();

        // Remove first element from empty list
        $this->assertEquals(0, $list->getSize());
        $this->assertFalse($list->removeFirst());
        $this->assertEquals(0, $list->getSize());

        // Remove first element from list with single element
        $this->assertTrue($list->addFirst('value'));
        $this->assertEquals(1, $list->getSize());
        $this->assertTrue($list->removeFirst());
        $this->assertEquals(0, $list->getSize());
        
        // Remove first element from multi element list
        $this->assertTrue($list->addFirst('value'));
        $this->assertTrue($list->addFirst('some value'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['some value', 'value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('some value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());
        $this->assertTrue($list->removeFirst());
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals(['value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());

        // Remove first element after adding null value to the beginning of the list
        $this->assertTrue($list->addFirst());
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals([null, 'value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertNull($list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());
        $this->assertTrue($list->removeFirst());
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals(['value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());
        
        // Remove first element after adding null value to the end of the list
        $this->assertTrue($list->addLast());
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['value', null], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertNull($list->getLast()->getData());
        $this->assertTrue($list->removeFirst());
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals([null], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertNull($list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertNull($list->getLast()->getData());

        // Remove first value after cleaning the list
        $this->assertTrue($list->removeFirst());
        $this->assertNull($list->getFirst());
        $this->assertNull($list->getLast());
        $this->assertEquals(0, $list->getSize());
        $this->assertFalse($list->removeFirst());
        $this->assertEquals(0, $list->getSize());
    }

    public function testRemoveLastMethod()
    {
        $list = new LinkedList();

        // Remove last element from empty list
        $this->assertEquals(0, $list->getSize());
        $this->assertFalse($list->removeLast());
        $this->assertEquals(0, $list->getSize());

        // Remove last element from list with single value
        $this->assertTrue($list->addFirst('value'));
        $this->assertEquals(1, $list->getSize());
        $this->assertTrue($list->removeLast());
        $this->assertEquals(0, $list->getSize());
        
        // Remove last element from multi element list
        $this->assertTrue($list->addFirst('value'));
        $this->assertTrue($list->addFirst('some value'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['some value', 'value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('some value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value', $list->getLast()->getData());
        $this->assertTrue($list->removeLast());
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals(['some value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('some value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('some value', $list->getLast()->getData());

        // Remove last element after adding null value to the end of the list
        $this->assertTrue($list->addLast());
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['some value', null], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('some value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertNull($list->getLast()->getData());
        $this->assertTrue($list->removeLast());
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals(['some value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('some value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('some value', $list->getLast()->getData());

        // Remove last element after adding null value to the beginning of the list
        $this->assertTrue($list->addFirst());
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals([null, 'some value'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertNull($list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('some value', $list->getLast()->getData());
        $this->assertTrue($list->removeLast());
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals([null], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertNull($list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertNull($list->getLast()->getData());

        // Remove last element empty list
        $this->assertTrue($list->removeLast());
        $this->assertNull($list->getFirst());
        $this->assertNull($list->getLast());
        $this->assertEquals(0, $list->getSize());
        $this->assertFalse($list->removeLast());
        $this->assertEquals(0, $list->getSize());
    }

    public function testReverseHelperMethod()
    {
        $list = new LinkedList();

        // Reversing empty list
        $this->assertEquals(0, $list->getSize());
        $reversedList = LinkedListHelper::reverse($list);
        $this->assertEquals(0, $reversedList->getSize());

        // Reversing list with one value
        $this->assertTrue($list->add('value1'));
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals(['value1'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value1', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value1', $list->getLast()->getData());
        $reversedList = LinkedListHelper::reverse($list);
        $this->assertEquals(1, $reversedList->getSize());
        $this->assertEquals(['value1'], LinkedListHelper::toArray($reversedList));
        $this->assertNotNull($reversedList->getFirst());
        $this->assertEquals('value1', $reversedList->getFirst()->getData());
        $this->assertNotNull($reversedList->getLast());
        $this->assertEquals('value1', $reversedList->getLast()->getData());

        // Reversing multi-value list
        $this->assertTrue($list->addLast('value2'));
        $this->assertTrue($list->addFirst('value0'));
        $this->assertTrue($list->addLast('value3'));
        $this->assertEquals(4, $list->getSize());
        $this->assertEquals(['value0', 'value1', 'value2', 'value3'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value0', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value3', $list->getLast()->getData());
        $reversedList = LinkedListHelper::reverse($list);
        $this->assertEquals(4, $reversedList->getSize());
        $this->assertEquals(['value3', 'value2', 'value1', 'value0'], LinkedListHelper::toArray($reversedList));
        $this->assertNotNull($reversedList->getFirst());
        $this->assertEquals('value3', $reversedList->getFirst()->getData());
        $this->assertNotNull($reversedList->getLast());
        $this->assertEquals('value0', $reversedList->getLast()->getData());

        // Double reversing multi-value list
        $reversedList = LinkedListHelper::reverse($reversedList);
        $this->assertEquals(4, $reversedList->getSize());
        $this->assertEquals(['value0', 'value1', 'value2', 'value3'], LinkedListHelper::toArray($reversedList));
        $this->assertNotNull($reversedList->getFirst());
        $this->assertEquals('value0', $reversedList->getFirst()->getData());
        $this->assertNotNull($reversedList->getLast());
        $this->assertEquals('value3', $reversedList->getLast()->getData());
    }

    public function testSortHelperMethod()
    {
        $list = new LinkedList();

        // Sorting empty list
        $this->assertEquals(0, $list->getSize());
        $sortedList = LinkedListHelper::sort($list);
        $this->assertEquals(0, $sortedList->getSize());

        // Fill list with values
        $this->assertTrue($list->addLast('value3'));
        $this->assertTrue($list->addLast('value1'));
        $this->assertTrue($list->addLast('value2'));
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals(['value3', 'value1', 'value2'], LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value3', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value2', $list->getLast()->getData());

        // Sorting non-empty list (ASC)
        $sortedList = LinkedListHelper::sort($list);
        $this->assertEquals(3, $sortedList->getSize());
        $this->assertEquals(['value1', 'value2', 'value3'], LinkedListHelper::toArray($sortedList));
        $this->assertNotNull($sortedList->getFirst());
        $this->assertEquals('value1', $sortedList->getFirst()->getData());
        $this->assertNotNull($sortedList->getLast());
        $this->assertEquals('value3', $sortedList->getLast()->getData());
        
        // Sorting non-empty list (DESC)
        $sortedList = LinkedListHelper::sort($list, SORT_DESC);
        $this->assertEquals(3, $sortedList->getSize());
        $this->assertEquals(['value3', 'value2', 'value1'], LinkedListHelper::toArray($sortedList));
        $this->assertNotNull($sortedList->getFirst());
        $this->assertEquals('value3', $sortedList->getFirst()->getData());
        $this->assertNotNull($sortedList->getLast());
        $this->assertEquals('value1', $sortedList->getLast()->getData());

        // Sorting already sorted list
        $sortedList = LinkedListHelper::sort($sortedList);
        $this->assertEquals(3, $sortedList->getSize());
        $this->assertEquals(['value1', 'value2', 'value3'], LinkedListHelper::toArray($sortedList));
        $this->assertNotNull($sortedList->getFirst());
        $this->assertEquals('value1', $sortedList->getFirst()->getData());
        $this->assertNotNull($sortedList->getLast());
        $this->assertEquals('value3', $sortedList->getLast()->getData());
    }

    public function testFindMinMaxHelperMethods()
    {
        $list = new LinkedList();

        // Min and max values not exists in empty list
        $this->assertEquals(0, $list->getSize());
        $this->assertNull(LinkedListHelper::findMax($list));
        $this->assertNull(LinkedListHelper::findMin($list));

        // Fill list
        $this->assertTrue($list->addLast('value3'));
        $this->assertTrue($list->addLast('value1'));
        $this->assertTrue($list->addLast('value2'));
        $this->assertTrue($list->addLast('value0'));
        $this->assertTrue($list->addLast('value99'));
        $this->assertTrue($list->addLast('value45'));

        // Check default data
        $this->assertEquals(6, $list->getSize());
        $array = ['value3', 'value1', 'value2', 'value0', 'value99', 'value45'];
        $this->assertEquals($array, LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value3', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value45', $list->getLast()->getData());

        // Testing min and max
        $this->assertNotNull(LinkedListHelper::findMax($list));
        $this->assertEquals('value99', LinkedListHelper::findMax($list));
        $this->assertNotNull(LinkedListHelper::findMin($list));
        $this->assertEquals('value0', LinkedListHelper::findMin($list));

        // Data should not be changed
        $this->assertEquals(6, $list->getSize());
        $array = ['value3', 'value1', 'value2', 'value0', 'value99', 'value45'];
        $this->assertEquals($array, LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('value3', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('value45', $list->getLast()->getData());

        // Testing when all values are the same
        $list->clear();
        $this->assertTrue($list->addLast('repeated value'));
        $this->assertTrue($list->addLast('repeated value'));
        $this->assertTrue($list->addLast('repeated value'));
        $this->assertTrue($list->addLast('repeated value'));
        $this->assertEquals(4, $list->getSize());
        $array = ['repeated value', 'repeated value', 'repeated value', 'repeated value'];
        $this->assertEquals($array, LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('repeated value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('repeated value', $list->getLast()->getData());

        $this->assertNotNull(LinkedListHelper::findMax($list));
        $this->assertEquals('repeated value', LinkedListHelper::findMax($list));
        $this->assertNotNull(LinkedListHelper::findMin($list));
        $this->assertEquals('repeated value', LinkedListHelper::findMin($list));

        // Data should not be changed
        $this->assertEquals(4, $list->getSize());
        $array = ['repeated value', 'repeated value', 'repeated value', 'repeated value'];
        $this->assertEquals($array, LinkedListHelper::toArray($list));
        $this->assertNotNull($list->getFirst());
        $this->assertEquals('repeated value', $list->getFirst()->getData());
        $this->assertNotNull($list->getLast());
        $this->assertEquals('repeated value', $list->getLast()->getData());
    }

    public function testFullSinglyLinkedList()
    {
        $list = new LinkedList();
        
        $this->assertTrue($list->addFirst('1one'));
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals(['1one'], LinkedListHelper::toArray($list));

        $this->assertTrue($list->addFirst('2two'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(1, $list->getPosition('1one'));
        $this->assertNull($list->getPosition('nothing'));
        $this->assertEquals(['2two', '1one'], LinkedListHelper::toArray($list));

        $this->assertTrue($list->addFirst('3three'));
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals(['3three', '2two', '1one'], LinkedListHelper::toArray($list));

        $this->assertTrue($list->addLast('4four'));
        $this->assertEquals(4, $list->getSize());
        $this->assertEquals(['3three', '2two', '1one', '4four'], LinkedListHelper::toArray($list));

        $this->assertTrue($list->removeFirst());
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals(['2two', '1one', '4four'], LinkedListHelper::toArray($list));

        $this->assertTrue($list->removeLast());
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['2two', '1one'], LinkedListHelper::toArray($list));

        $this->assertTrue($list->addFirst('first'));
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals(['first', '2two', '1one'], LinkedListHelper::toArray($list));        

        $this->assertTrue($list->addLast('last'));
        $this->assertEquals(4, $list->getSize());
        $this->assertEquals(['first', '2two', '1one', 'last'], LinkedListHelper::toArray($list));        

        $this->assertTrue($list->remove('2two'));
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals(['first', '1one', 'last'], LinkedListHelper::toArray($list));

        $this->assertTrue($list->remove('last'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['first', '1one'], LinkedListHelper::toArray($list));

        $this->assertFalse($list->remove('last'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['first', '1one'], LinkedListHelper::toArray($list));

        $this->assertTrue($list->remove('first'));
        $this->assertEquals(1, $list->getSize());
        $this->assertEquals(['1one'], LinkedListHelper::toArray($list));

        $this->assertTrue($list->addLast('5five'));
        $this->assertEquals(2, $list->getSize());
        $this->assertEquals(['1one', '5five'], LinkedListHelper::toArray($list));

        $this->assertTrue($list->add('4four', 1));
        $this->assertEquals(3, $list->getSize());
        $this->assertEquals(['1one', '4four', '5five'], LinkedListHelper::toArray($list));

        $this->assertEquals(0, $list->getPosition('1one'));
        $this->assertTrue($list->addAfter('2two', '1one'));
        $this->assertEquals(4, $list->getSize());
        $this->assertEquals(['1one', '2two', '4four', '5five'], LinkedListHelper::toArray($list));

        $this->assertEquals(2, $list->getPosition('4four'));
        $this->assertTrue($list->addBefore('3three', '4four'));
        $this->assertEquals(5, $list->getSize());
        $array = ['1one', '2two', '3three', '4four', '5five'];
        $this->assertEquals($array, LinkedListHelper::toArray($list));

        $this->assertEquals(null, $list->getPosition('6six'));
        $this->assertTrue($list->addBefore('6six', '4four'));
        $this->assertEquals(6, $list->getSize());
        $array = ['1one', '2two', '3three', '6six', '4four', '5five'];
        $this->assertEquals($array, LinkedListHelper::toArray($list));

        $this->assertEquals('6six', LinkedListHelper::findMax($list));
        $this->assertEquals('1one', LinkedListHelper::findMin($list));

        $array = ['5five', '4four', '6six', '3three', '2two', '1one'];
        $this->assertEquals($array, LinkedListHelper::toArray(LinkedListHelper::reverse($list)));

        $array = ['1one', '2two', '3three', '4four', '5five', '6six'];
        $this->assertEquals($array, LinkedListHelper::toArray(LinkedListHelper::sort($list)));

        $array = ['6six', '5five', '4four', '3three', '2two', '1one'];
        $this->assertEquals($array, LinkedListHelper::toArray(LinkedListHelper::sort($list, SORT_DESC)));
    }
}
