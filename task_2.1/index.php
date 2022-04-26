<?php

include_once(__DIR__ . "/classes/autoload.php");

try {
    echo CBase::getParam('message');
} catch (Exception $e) {
}