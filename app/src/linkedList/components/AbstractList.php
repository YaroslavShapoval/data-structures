<?php

namespace app\src\linkedList\components;

abstract class AbstractList implements ListInterface, \Iterator
{
    /**
     * @var integer
     */
    protected $size = 0;

    /**
     * @var ListNodeInterface
     */
    protected $firstNode = null;

    /**
     * @var ListNodeInterface
     */
    protected $lastNode = null;

    /**
     * @var ListNodeInterface
     */
    protected $currentNode = null;

    /**
     * @var integer
     */
    protected $currentPosition = 0;

    /**
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @inheritdoc
     */
    public function toArray()
    {
        $array = [];

        if ($this->firstNode === null) {
            return $array;
        }

        foreach ($this as $node) {
            $array[] = $node->getData();
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function clear()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->size = 0;
    }

    // Add item to the begiining of the list
    public function addFirst($value)
    {
        return $this->add($value, 0);
    }

    // Add item to the end of the list
    public function addLast($value)
    {
        return $this->add($value, $this->getSize());
    }

    // Add item before the first found node, which data equals of $queue
    // If node with search value does not found, item does not adding
    public function addBefore($value, $queue)
    {
        $position = $this->getPosition($queue);

        if ($position === null) {
            return false;
        }

        return $this->add($value, $position);
    }

    // Add item after the first found node, which data equals of $queue
    // If node with search value does not found, item does not adding
    public function addAfter($value, $queue)
    {
        $position = $this->getPosition($queue);

        if ($position === null) {
            return false;
        }

        return $this->add($value, ++$position);
    }

    /**
     * Implements Iterator interface
     */
    
    /**
     * @inheritdoc
     */
    public function rewind()
    {
        $this->currentPosition = 0;
        $this->currentNode = $this->firstNode;
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return $this->currentPosition;
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        return $this->currentNode;
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        $this->currentPosition++;
        $this->currentNode = $this->currentNode->getNext();
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return !empty($this->currentNode) && $this->currentNode->getData() !== null;
    }
}
