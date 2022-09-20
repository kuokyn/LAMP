<?php

function merge_sort($my_array)
{
    if (count($my_array) == 1) return $my_array;
    $mid = count($my_array) / 2;
    $left = array_slice($my_array, 0, $mid);
    $right = array_slice($my_array, $mid);
    $left = merge_sort($left);
    $right = merge_sort($right);
    return merge($left, $right);
}

function merge($left, $right)
{
    $res = array();
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] > $right[0]) {
            $res[] = $right[0];
            $right = array_slice($right, 1);
        } else {
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
    }
    while (count($left) > 0) {
        $res[] = $left[0];
        $left = array_slice($left, 1);
    }
    while (count($right) > 0) {
        $res[] = $right[0];
        $right = array_slice($right, 1);
    }
    return $res;
}

$array = $_GET["array"];
if (empty($array)) {
    echo "Массив не передан";
}
else {
    if ( count( $array ) === count( array_filter( $array, 'is_numeric' ) ) ) {
        echo "Переданный массив :  ";
        echo implode(', ', $array);
        echo '<br><br>';
        echo "Отсортированный массив :  ";
        echo implode(', ', merge_sort($array));
    }
    else {
        echo "Массив должен быть из чисел";
    }

}

