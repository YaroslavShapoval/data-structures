<?php

namespace app\src\linkedList\components;

interface ListInterface
{
    /**
     * Getting first item from the list
     * @return ListNodeInterface
     */
    public function getFirst();

    /**
     * Setting new first node.
     * @param ListNodeInterface $node
     */
    public function setFirst(ListNodeInterface $node);

    /**
     * Getting last item from the list
     * @return ListNodeInterface
     */
    public function getLast();

    /**
     * Setting new last node.
     * @param ListNodeInterface $node
     */
    public function setLast(ListNodeInterface $node);

    /**
     * Adding new value to the needed position of the list
     * @param   mixed    $value
     * @param   integer  $position
     * @return  boolean  successfully added?
     */
    public function add($value, $position = 0);

    /**
     * Adding new value to the begiining of the list
     * @param   mixed    $value
     * @return  boolean  successfully added?
     */
    public function addFirst($value);

    /**
     * Adding new value to the end of the list
     * @param   mixed    $value
     * @return  boolean  successfully added?
     */
    public function addLast($value);

    /**
     * Adding new value before the $queue value in the list.
     * If $queue value not found, item does not added, return null.
     * @param   mixed    $value
     * @return  boolean  successfully removed?
     */
    public function addBefore($value, $queue);

    /**
     * Adding new value after the $queue value in the list.
     * If $queue value not found, item does not added, return null.
     * @param   mixed    $value
     * @return  boolean  successfully removed?
     */
    public function addAfter($value, $queue);

    /**
     * Removing value from the list
     * @param   mixed    $value
     * @param   integer  $position
     * @return  boolean  successfully removed?
     */
    public function remove($value);

    /**
     * Removing first node from the list
     * @return  boolean  successfully removed?
     */
    public function removeFirst();

    /**
     * Removing last node from the list
     * @return  boolean  successfully removed?
     */
    public function removeLast();

    /**
     * Getting position of the searchable element.
     * If item not found return null.
     * @param mixed $queue   
     */
    public function getPosition($queue);

    /**
     * Clear the list
     */
    public function clear();
}
