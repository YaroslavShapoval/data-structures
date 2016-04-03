<?php

namespace app\src\linkedList\components;

interface ListHelperInterface
{
    /**
     * Convert list to array of values
     * @param  ListInterface $list
     * @return array
     */
    public static function toArray(ListInterface $list);

    /**
     * Reversing existing list
     * @param  ListInterface $list
     * @return ListInterface
     */
    public static function reverse(ListInterface $list);

    /**
     * Find maximum value in the list
     * @param  ListInterface $list
     * @return ListInterface
     */
    public static function findMax(ListInterface $list);

    /**
     * Find minimum value in the list
     * @param  ListInterface $list
     * @return ListInterface
     */
    public static function findMin(ListInterface $list);

    /**
     * Sorting list by the values
     * @param  ListInterface $list
     * @param  string        $order - sorting order (SORT_ASC or SORT_DESC)
     * @return ListInterface
     */
    public static function sort(ListInterface $list, $order = SORT_ASC);
}
