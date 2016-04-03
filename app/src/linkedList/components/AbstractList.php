<?php

namespace app\src\linkedList\components;

abstract class AbstractList implements ListInterface, \Iterator
{
    /**
     * The count of elements in the list
     * @var integer
     */
    protected $size = 0;

    /**
     * Link to first node in the list
     * @var ListNodeInterface
     */
    protected $firstNode = null;

    /**
     * Link to last node in the list
     * @var ListNodeInterface
     */
    protected $lastNode = null;

    /**
     * Link to current node in the list (for Iterator interface)
     * @var ListNodeInterface
     */
    protected $currentNode = null;

    /**
     * Number of current position in the list (for Iterator interface)
     * @var integer
     */
    protected $currentPosition = 0;

    /**
     * Return count of elements in the list
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
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

    /**
     * @inheritdoc
     */
    public function getFirst()
    {
        return $this->firstNode;
    }

    /**
     * @inheritdoc
     */
    public function setFirst(ListNodeInterface $node = null)
    {
        $this->firstNode = &$node;
    }

    /**
     * @inheritdoc
     */
    public function getLast()
    {
        return $this->lastNode;
    }

    /**
     * @inheritdoc
     */
    public function setLast(ListNodeInterface $node = null)
    {
        $this->lastNode = &$node;
    }

    /**
     * @inheritdoc
     */
    public function addFirst($value = null)
    {
        return $this->add($value, 0);
    }

    /**
     * @inheritdoc
     */
    public function addLast($value = null)
    {
        return $this->add($value, $this->getSize());
    }

    /**
     * @inheritdoc
     */
    public function addBefore($value = null, $queue)
    {
        $position = $this->getPosition($queue);

        if ($position === null) {
            return false;
        }

        return $this->add($value, $position);
    }

    /**
     * @inheritdoc
     */
    public function addAfter($value = null, $queue)
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
        $this->currentNode = &$this->getFirst();
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
        $this->currentNode = &$this->currentNode->getNext();
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return !empty($this->currentNode);
    }
}
