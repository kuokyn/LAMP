<?php


function merge_sort($my_array)
{
    if (count($my_array) == 1) return $my_array; // если в массиве один элемент
    $mid = count($my_array) / 2; // делим массив на подмассивы до тех пор, пока не останется 1 или 2 элемента
    $left = array_slice($my_array, 0, $mid); // первый массив
    $right = array_slice($my_array, $mid); // второй массив
    $left = merge_sort($left); // сортируем первый массив
    $right = merge_sort($right); // сортируем второй массив
    return merge($left, $right); // слияние отсортированных массивов
}

function merge($left, $right)
{
    $res = array();
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] > $right[0]) {
            $res[] = $right[0];
            $right = array_slice($right, 1); // удаляем первый элемент
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
    return $res; // отсортированные элементы массивов
}

$array = $_GET["array"];
if (empty($array)) {
    echo "Массив не передан";
} else if (count($array) === count(array_filter($array, 'is_numeric'))) {
    echo "Переданный массив :  ";
    echo implode(' ', $array); // implode — Объединяет элементы массива в строку
    echo '<br><br>';
    echo "Отсортированный массив :  ";
    echo implode(' ', merge_sort($array));
} else {
    echo "Массив должен быть только из чисел";
}


