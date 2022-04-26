<?php

function convertFullName($string): string
{
    $result = '';

    $arr = explode(' ', $string);
    foreach ($arr as $key => $value) {
        if ($key === 0) {
            $result .= $value . ' ';
        } else {
            $result .= mb_strtoupper(mb_substr($value, 0, 1)) . '.';
        }
    }

    return $result; // Либо  return $arr[0] . ' ' . mb_strtoupper(mb_substr($arr[1], 0, 1)) . '.' . mb_strtoupper(mb_substr($arr[2], 0, 1)) . '.';
}

echo convertFullName('Заев Александр Валерьевич'); // Результат - Заев А.В.