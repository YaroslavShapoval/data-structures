<?php

namespace app\src\linkedList\singly;

use app\src\linkedList\components\ListNodeInterface;

class Node implements ListNodeInterface
{
    /**
     * @var midex
     */
    protected $data;

    /**
     * @var Node
     */
    protected $next;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @inheritdoc
     */
    public function setNext(ListNodeInterface $node = null)
    {
        $this->next = $node;
    }

    /**
     * @inheritdoc
     */
    public function getNext()
    {
        return $this->next;
    }
}
