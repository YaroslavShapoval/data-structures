<?php

namespace app\src\linkedList\singly;

use app\src\linkedList\components\ListHelperInterface;

class LinkedListHelper implements ListHelperInterface
{
    /**
     * @inheritdoc
     */
    public static function reverse(LinkedList $linkedList)
    {
        return $linkedList;
    }

    /**
     * @inheritdoc
     */
    public static function findMax(LinkedList $linkedList)
    {
        return $linkedList->current();
    }

    /**
     * @inheritdoc
     */
    public static function findMin(LinkedList $linkedList)
    {
        return $linkedList->current();
    }

    /**
     * @inheritdoc
     */
    public static function sort(LinkedList $list, $order = SORT_ASC)
    {
        return $list;
    }
}
