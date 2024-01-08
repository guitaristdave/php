<?php
//$arr1 = [1, 4, 6, 6, 8];
//$arr2 = [2, 5, 7, 9];
//
//function mergeSort($arr1, $arr2)
//{
//    $result = [];
//
//    $i1 = 0;
//    $i2 = 0;
//
//    while ($i1 < count($arr1) and $i2 < count($arr2)) {
//        if ($arr1[$i1] <= $arr2[$i2]) {
//            $result[] = $arr1[$i1];
//            $i1++;
//        } else {
//            $result[] = $arr2[$i2];
//            $i2++;
//        }
//    }
//
//    if ($i1 < count($arr1)) {
//        for (; $i1 < count($arr1); $i1++) {
//            $result[] = $arr1[$i1];
//        }
//    }
//    if ($i2 < count($arr2)) {
//        for (; $i2 < count($arr2); $i2++) {
//            $result[] = $arr2[$i2];
//        }
//    }
//
//    return $result;
//}

function isPrime(int $number): bool
{
    for ($i = 2; $i <= $number / 2 + 1; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function isCorrectBrackets(string $text): bool
{
    $counter = 0;
    if ($text[0] == ')') return false;

    for ($i = 0; $i < strlen($text); $i++) {
        if ($text[$i] == '(') {
            $counter++;
        } else if ($text[$i] == ')') {
            $counter--;
        }
        if ($counter < 0) return false;
    }
    return !$counter;
}

$test = '()()(())(';
print_r(isCorrectBrackets($test));