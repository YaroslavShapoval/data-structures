<?php

namespace app\tests;

use app\src\LinkedList;

class LinkedListTest extends \PHPUnit_Framework_TestCase
{
    public function testExample()
    {
        $list = new LinkedList();
        $this->assertEquals($list->sayHello(), "Hello, world!");
    }
}
