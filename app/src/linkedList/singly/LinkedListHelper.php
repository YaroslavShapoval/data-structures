<?php

namespace app\src\linkedList\singly;

use app\src\linkedList\components;

class LinkedListHelper implements components\ListHelperInterface
{
    /**
     * @inheritdoc
     */
    public static function toArray(components\ListInterface $list)
    {
        $array = [];

        if ($list->getFirst() === null) {
            return $array;
        }

        foreach ($list as $node) {
            $array[] = $node->getData();
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public static function reverse(components\ListInterface $list)
    {
        $prev = null;
        $node = $list->getFirst();

        $list->setLast($node);

        while ($node !== null) {
            $next = $node->getNext();
            $node->setNext($prev);
            $prev = $node;
            $node = $next;
        }

        $list->setFirst($prev);

        return $list;
    }

    /**
     * @inheritdoc
     */
    public static function findMax(components\ListInterface $list)
    {
        $max = $list->getFirst() ? $list->getFirst()->getData() : null;

        foreach ($list as $node) {
            $data = $node->getData();
            if ($max === null || $max < $data) {
                $max = $data;
            }
        }

        return $max;
    }

    /**
     * @inheritdoc
     */
    public static function findMin(components\ListInterface $list)
    {
        $min = $list->getFirst() ? $list->getFirst()->getData() : null;

        foreach ($list as $node) {
            $data = $node->getData();
            if ($min === null || $min > $data) {
                $min = $data;
            }
        }

        return $min;
    }

    /**
     * @inheritdoc
     */
    public static function sort(components\ListInterface $list, $order = SORT_ASC)
    {
        $sortedData = self::toArray($list);
        sort($sortedData);

        if ($order === SORT_DESC) {
            $sortedData = array_reverse($sortedData);
        }

        $newList = new LinkedList();

        foreach ($sortedData as $value) {
            $newList->addLast($value);
        }

        return $newList;
    }
}
