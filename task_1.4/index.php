<?php

session_start();

$filename = __DIR__ . "/data.json";
$result = [];

if (file_exists($filename)) {
    try {
        $result = json_decode(file_get_contents($filename), true, 512, JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
}

if (isset($_GET['set_viewed'])) {
    foreach ($result as &$post) {
        if ($post['id'] === $_GET['set_viewed'] && ($_COOKIE[$post['id']] !== 'is_viewed')) {
            $post['viewed']++;
            setcookie($post['id'], 'is_viewed', time() - 0x7FFFFFFF);
        }
    }
    unset($post);

    try {
        file_put_contents($filename, json_encode($result, JSON_THROW_ON_ERROR));
    } catch (JsonException $e) {
    }
}

?>

<?php
foreach ($result as $item): ?>
    <div>
        <b><?= $item['name'] ?></b><br>
        <small>Viewed: <?= $item['viewed'] ?></small><br>
        <?= $item['text'] ?><br><br>
        <a href="?set_viewed=<?= $item['id'] ?>">I watched</a>
        <hr>
    </div>
<?php
endforeach; ?>
