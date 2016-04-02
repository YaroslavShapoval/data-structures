<?php

namespace app\src\linkedList\components;

interface ListInterface
{
    /**
     * Get first item from the list
     * @return ListNodeInterface
     */
    public function getFirst();

    /**
     * Set new first node.
     * @param ListNodeInterface $node
     */
    public function setFirst(ListNodeInterface $node);

    /**
     * Get last item from the list
     * @return ListNodeInterface
     */
    public function getLast();

    /**
     * Set new last node.
     * @param ListNodeInterface $node
     */
    public function setLast(ListNodeInterface $node);

    /**
     * Add new value to the needed position of the list
     * @param   mixed    $value
     * @param   integer  $position
     * @return  boolean  successfully added?
     */
    public function add($value, $position = 0);

    /**
     * Add new value to the begiining of the list
     * @param   mixed    $value
     * @return  boolean  successfully added?
     */
    public function addFirst($value);

    /**
     * Add new value to the end of the list
     * @param   mixed    $value
     * @return  boolean  successfully added?
     */
    public function addLast($value);

    /**
     * Add new value before the $queue value in the list.
     * If $queue value not found, item does not added, return null.
     * @param   mixed    $value
     * @return  boolean  successfully removed?
     */
    public function addBefore($value, $queue);

    /**
     * Add new value after the $queue value in the list.
     * If $queue value not found, item does not added, return null.
     * @param   mixed    $value
     * @return  boolean  successfully removed?
     */
    public function addAfter($value, $queue);

    /**
     * Remove value from the list
     * @param   mixed    $value
     * @param   integer  $position
     * @return  boolean  successfully removed?
     */
    public function remove($value);

    /**
     * Remove first node from the list
     * @return  boolean  successfully removed?
     */
    public function removeFirst();

    /**
     * Remove last node from the list
     * @return  boolean  successfully removed?
     */
    public function removeLast();

    /**
     * Get position of the searchable element.
     * If item not found return null.
     * @param mixed $queue   
     */
    public function getPosition($queue);

    /**
     * Clear list
     */
    public function clear();
}
