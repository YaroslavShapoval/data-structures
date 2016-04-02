<?php

namespace app\tests;

use app\src\linkedList\singly\LinkedList;
use app\src\linkedList\singly\LinkedListHelper;

class LinkedListTest extends \PHPUnit_Framework_TestCase
{
    public function testSinglyLinkedList()
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
