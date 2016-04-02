<?php

namespace app\src\linkedList\singly;

use app\src\linkedList\components\AbstractList;

class LinkedList extends AbstractList
{
    /**
     * @inheritdoc
     */
    public function add($value, $position = 0)
    {
        $node = new Node($value);

        if ($position === 0) {
            // First
            $node->setNext($this->getFirst());
            $this->setFirst($node);

            if ($this->getLast() === null) {
                $this->setLast($node);
            }
        } elseif ($position >= $this->getSize()) {
            // Last
            if ($this->getFirst() === null) {
                return $this->add($value);
            }

            $this->getLast()->setNext($node);
            $this->setLast($node);
        } else {
            // Somewhere in the middle
            $curr = $this->getFirst();
            $prev = $this->getFirst();

            for ($i = 0; $i < $position && $i < $this->getSize(); $i++) {
                $prev = $curr;
                $curr = $prev->getNext();
            }

            $prev->setNext($node);
            $node->setNext($curr);
        }

        $this->size++;

        return true;
    }

    /**
     * @inheritdoc
     */
    public function remove($value)
    {
        $prev = null;

        foreach ($this as $position => $node) {
            if ($node->getData() === $value) {
                if ($prev === null) {
                    return $this->removeFirst();
                }

                $next = $node->getNext();

                if ($next === null) {
                    $prev->setNext(null);
                    $this->setLast($prev);
                } else {
                    $prev->setNext($next);
                }

                $this->size--;

                return true;
            }

            $prev = $node;
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function removeFirst()
    {
        if ($this->getSize() === 0) {
            return false;
        }

        if ($this->getSize() === 1) {
            $this->clear();

            return true;
        }

        $this->setFirst($this->getFirst()->getNext());
        $this->size--;

        return true;
    }

    /**
     * @inheritdoc
     */
    public function removeLast()
    {
        if ($this->getSize() === 0) {
            return false;
        }

        if ($this->getSize() === 1) {
            $this->clear();

            return true;
        }

        $prev = $this->getFirst();
        $curr = $this->getFirst()->getNext();
 
        while ($curr->getNext() !== null) {
            $prev = $curr;
            $curr = $curr->getNext();
        }
 
        $prev->setNext(null);
        $this->setLast($prev);
        $this->size--;

        return true;
    }

    /**
     * @inheritdoc
     */
    public function getPosition($queue)
    {
        foreach ($this as $position => $value) {
            if ($value->getData() === $queue) {
                return $position;
            }
        }

        return null;
    }
}
