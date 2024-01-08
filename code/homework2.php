<?php
//1. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами – два параметра это числа.
//Обязательно использовать оператор return. Проверьте деление на ноль и верните текст , ошибка деления на ноль.

function sum($a, $b)
{
    return $a + $b;
}

function diff($a, $b)
{
    return $a - $b;
}

function mult($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
    if ($b === 0) return 'Division by zero :(';
    return $a / $b;
}

$a = 3;
$b = 2;

echo sum(3, 2) . "\n";
echo diff(3, 2) . "\n";
echo mult(3, 2) . "\n";
echo div(3, 2) . "\n";


//2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
//где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от
//переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3)
//и вернуть полученное значение (использовать switch). Используйте функции из п.1

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case '+':
            return sum($arg1, $arg2);
            break;
        case '-':
            return diff($arg1, $arg2);
            break;
        case '*':
            return mult($arg1, $arg2);
            break;
        case '/':
            return div($arg1, $arg2);
            break;
        default:
            return 'Unknown operator';
    }
}

echo mathOperation(2, 3, '+') . "\n";

//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей,
//а в качестве значений – массивы с названиями городов из соответствующей области.
//Вывести в цикле значения массива, чтобы результат был таким:
//Московская область: Москва, Зеленоград, Клин
//Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт
//Рязанская область … (названия городов можно найти на maps.yandex.ru).

$array = array(
    "Московская область" => ["Москва", "Раменское", "Домодедово", "Жуковский", "Котельники", "Краногорск"],
    "Орловская область" => ["Орел", "Мценск", "Ливны", "Болхов"],
    "Ленинградская область" => ["Санкт-Петербург", "Кронштадт", "Выборг", "Всеволожск", "Павловск"],
);

foreach ($array as $key => $value) {
    $result = "$key: ";
    foreach ($value as $city) {
        $result .= "$city, ";
    }
    echo rtrim($result, ', ') . "\n";
}

//4. Объявить массив, индексами которого являются буквы русского языка, а значениями –
//соответствующие латинские буквосочетания
//(‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк.

function tranliterate(string $text): string
{
    $alphabet = array(
        "а" => "a",
        "б" => "b",
        "в" => "v",
        "г" => "g",
        "д" => "d",
        "е" => "e",
        "ё" => "yo",
        "ж" => "zh",
        "з" => "z",
        "и" => "i",
        "й" => "y",
        "к" => "k",
        "л" => "l",
        "м" => "m",
        "н" => "n",
        "о" => "o",
        "п" => "p",
        "р" => "r",
        "с" => "s",
        "т" => "t",
        "у" => "u",
        "ф" => "f",
        "х" => "kh",
        "ц" => "ts",
        "ч" => "ch",
        "ш" => "sh",
        "щ" => "shch",
        "ъ" => "",
        "ы" => "y",
        "ь" => "'",
        "э" => "e",
        "ю" => "yu",
        "я" => "ya",
        " " => " "
    );
    return strtr($text, $alphabet);


}

echo tranliterate('привет, мир') . "\n";

//5. *С помощью рекурсии организовать функцию возведения числа в степень.
//Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

function recursionPow($val, $pow)
{
    if ($pow === 0) return 1;
    if ($pow == 1) return $val;
    return $val * recursionPow($val, --$pow);
}

echo recursionPow(2, 10) . "\n";

//6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
//22 часа 15 минут
//21 час 43 минуты.

function getPostfix($number, $titles)
{
    $cases = [2, 0, 1, 1, 1, 2];
    $index = ($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)];

    return $titles[$index];
}


function getTime($tz = 'Europe/Moscow'): string
{
    date_default_timezone_set($tz);
    $time = date("H:i");
    $hours = (int)$time[0] * 10 + (int)$time[1];
    $minutes = (int)$time[3] * 10 + (int)$time[4];

    $hoursPostfix = getPostfix($hours, ['час', 'часа', 'часов']);
    $minutesPostfix = getPostfix($minutes, ['минута', 'минуты', 'минут']);

    return "Московское время: $hours $hoursPostfix $minutes $minutesPostfix";
}

echo getTime();
