<?php

namespace app\src\linkedList\components;

interface ListNodeInterface
{
    public function getData();

    public function setNext(self $node);

    public function getNext();
}
