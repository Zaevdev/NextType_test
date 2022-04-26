<?php

$url = 'https://nextype.ru';
$data = file_get_contents($url);

$DOM = new DOMDocument();
$DOM->loadHTML($data);

$list = $DOM->getElementsByTagName('a');
$link_array = array();
foreach ($list as $link) {
    $href = $link->getAttribute('href');
    if (str_starts_with($href, 'javascript') || in_array($href, $link_array, true)) {
        continue;
    }
    if (str_starts_with($href, 'http') && filter_var($href, FILTER_VALIDATE_URL)) {
        $link_array[] = $href;
    } elseif (filter_var($url . $href, FILTER_VALIDATE_URL)) {
        $link_array[] = $url . $href;
    }
}
$link_array = array_unique($link_array);

echo "<pre>";
print_r($link_array);
echo "</pre>";
