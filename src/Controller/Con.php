<!-- Строки -->
<!-- Задача №1 -->

<?php

function isPalindrome($str) {
    $str = strtolower($str); 
    $str = preg_replace('/\W+/', '', $str);

    $left = 0;
    $right = strlen($str) - 1;

    while ($left < $right) {
        if ($str[$left]!= $str[$right]) {
            return false;
        }
        $left++;
        $right--;
    }

    return true;
}

// Задача №2

function removeDuplicates($str) {
    $charCount = array();

    foreach (str_split($str) as $char) {
        if (!isset($charCount[$char])) {
            $charCount[$char] = 1;
        }
    }

    $result = implode('', array_keys($charCount));

    return $result;
}

echo removeDuplicates("abracadabra");
echo "\n";

// Валидация
// Задача №3

function validateEmail($email) {
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    if (preg_match($pattern, $email)) {
        return true;
    } else {
        return false;
    }
}

// Задача №4

function validateNumber($number) {
    $phoneNumber = preg_replace('/\D+/', '', $number);
    if (strlen($number) >= 10) {
        return true;
    } else {
        return false;
    }
}

// Задача №4 - Вариант 2

function validatePhoneNumber($phoneNumber) {
    $phoneNumber = str_replace([' ', '-', '+'], '', $phoneNumber);
    $phoneNumber = str_split($phoneNumber); 
    $phoneNumber = array_filter($phoneNumber, function($char) {
        return is_numeric($char); 
    });
    $phoneNumber = implode('', $phoneNumber); 
    if (strlen($phoneNumber) >= 10) {
        return true;
    } else {
        return false;
    }
}

// Задача №5

function validateURL($url) {
    $reg = '/^(http|https):\/\/[a-zA-Z0-9.-]+(\.[a-zA-Z0-9.-]+)*\/?(\:\d+)?\/?([a-zA-Z0-9\/\.\_\-]+)*$/';
    if(preg_match($reg, $url)) {
        return true;
    } else {
        return false;
    }
}

// Array
// Задача №6

$array = [5, 2, 9, 1, 7];

function findSecondMax($array) {
    $max = PHP_INT_MIN;
    $secondMax = PHP_INT_MIN;
    foreach ($array as $element) {
        if ($element > $max) {
            $secondMax = $max;
            $max = $element;
        } elseif ($element > $secondMax && $element < $max) {
            $secondMax = $element;
        }
    }
    if ($secondMax == PHP_INT_MIN) {
        return null;
    } else {
        return $secondMax;
    }
}

echo findSecondMax($array);

// Задача №7

$array = [1, 2, 2, 3, 3, 3, 4];

function findMostFrequentElement($array) {
    $count = array_count_values($array);
    arsort($count);
    return key($count);
}

echo findMostFrequentElement($array);

