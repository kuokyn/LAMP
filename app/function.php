<?php

function drawer() {
    $num = $_GET["num"]*100;
    $hex = substr(floathex($num), 0, 6);
    $radius = $num * 0.5;
    echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ' .$num. ' ' .$num. '" width="' .$num. '" height="' .$num. '">
    <circle cx="50%" cy="50%" r="' .$radius. '" fill="#' .$hex. '" /></svg>';
    /*
    if ($_GET["num"]==1) {
        echo '<svg  width="900" height="80">
        <line x1="0" y1="0" x2="200" y2="70" stroke-width="1" stroke="rgb(0,0,0)"/>
        </svg>';
    }

    if ($_GET["num"]==2) {
        echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" width="200" height="200">
        <circle cx="100" cy="100" r="80" fill="red" />
        </svg>';
    }

    if ($_GET["num"]==3) {
        echo '<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <polygon points="50 15, 100 100, 0 100"/>
    </svg>';
    }

    if ($_GET["num"]==5) {
        echo '<svg viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
        <polygon points="26,86 11.2,40.4 50,12.2 88.8,40.4 74,86"/>
    </svg>';
    }*/
}
function floathex($number)
{
    return strrev(unpack('h*', pack('d', $number))[1]);
}

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

function sorting() {
    $test_array = $_GET["array"];
    echo "Original Array :  ";
    echo implode(', ', $test_array);
    echo '<br><br>';
    echo "Sorted Array :  ";
    echo implode(', ', merge_sort($test_array));
}

function info() {
    echo exec('pwd');
    echo exec('ls');
    echo exec('ps');
    echo exec('whoami');
    echo exec('id');
    echo exec('hostname');


}
