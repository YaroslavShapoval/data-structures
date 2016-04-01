<?php

namespace app\src\linkedList\components;

interface ListInterface
{
    /**
     * Add new value to the needed position of the list
     * @param   mixed    $value
     * @param   integer  $position
     * @return  boolean  adding success
     */
    public function add($value, $position = 0);

    /**
     * Add new value to the begiining of the list
     * @param   mixed    $value
     * @return  boolean  successfully removed?
     */
    public function addFirst($value);

    /**
     * Add new value to the end of the list
     * @param   mixed    $value
     * @return  boolean  successfully removed?
     */
    public function addLast($value);

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
     * Moving list to array.
     * @return array
     */
    public function toArray();

    /**
     * Clear list
     */
    public function clear();
}
