<?php

function getItemsFromDate($date): array
{
    $filename = __DIR__ . "/data.json";
    $result = [];
    if (file_exists($filename)) {
        try {
            $result = json_decode(file_get_contents($filename), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
        }
    }
    // Отлавливаем ошибки возникшие при превращении
    $data_error = match (json_last_error()) {
        JSON_ERROR_NONE => '',
        JSON_ERROR_DEPTH => 'Достигнута максимальная глубина стека',
        JSON_ERROR_STATE_MISMATCH => 'Неверный или не корректный JSON',
        JSON_ERROR_CTRL_CHAR => 'Ошибка управляющего символа, возможно верная кодировка',
        JSON_ERROR_SYNTAX => 'Синтаксическая ошибка',
        JSON_ERROR_UTF8 => 'Некорректные символы UTF-8, возможно неверная кодировка',
        default => 'Неизвестная ошибка',
    };

    // Выводим ошибки, если они есть
    if ($data_error !== '') {
        echo $data_error;
    }

    return array_filter($result, static function ($value) use ($date) {
        return ((int)strtotime($value['created']) >= (int)strtotime($date));
    });
}

echo "<pre>";
print_r(getItemsFromDate("20.01.2020 12:00:00"));
echo "</pre>";