<?php

namespace app\src\linkedList\components;

interface ListHelperInterface
{
    /**
     * @param  ListInterface $list
     * @return array
     */
    public static function toArray(ListInterface $list);

    /**
     * @param  ListInterface $list
     * @return ListInterface
     */
    public static function reverse(ListInterface $list);

    /**
     * @param  ListInterface $list
     * @return ListInterface
     */
    public static function findMax(ListInterface $list);

    /**
     * @param  ListInterface $list
     * @return ListInterface
     */
    public static function findMin(ListInterface $list);

    /**
     * @param  ListInterface $list
     * @param  string        $order
     * @return ListInterface
     */
    public static function sort(ListInterface $list, $order = SORT_ASC);
}
