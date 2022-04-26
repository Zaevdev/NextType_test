<?php
/*
 * Include all classes
 */

$arAutoload = [
    "cbase.php",
];

foreach ($arAutoload as $file)
{
    if (file_exists(__DIR__ . "/" . $file))
    {
        require_once(__DIR__ . "/" . $file);
    }
}

/**
 * Initial base instance
 */

CBase::getInstance([
    'message' => 'This is a task'
]);