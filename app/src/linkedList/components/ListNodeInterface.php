<?php

namespace app\src\linkedList\components;

interface ListNodeInterface
{
    /**
     * Getting node data
     * @return mixed
     */
    public function getData();

    /**
     * Setting link to the next node
     * @param self $node
     */
    public function setNext(self $node);

    /**
     * Getting next node
     * @return self
     */
    public function getNext();
}
