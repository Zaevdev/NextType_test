<?php

$array = [
    [
        'sort' => '20',
        'name' => 'Mike'
    ],
    [
        'sort' => '10',
        'name' => 'Adam'
    ],
    [
        'sort' => '40',
        'name' => 'Steve'
    ],
    [
        'sort' => '300',
        'name' => 'Jane'
    ],

];
usort($array, static function ($a, $b) {
    return ((int)$b['sort'] - (int)$a['sort']);
});

var_dump($array);
