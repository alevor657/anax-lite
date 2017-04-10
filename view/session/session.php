<?php
// echo $app->session->get('count');
?>

<div class="session-wrapper">
    <h1>Test session</h1>
    <h3>Current value: <?=$app->session->get('count', 0)?></h3>
    <div class="button-wrapper">
        <a class="session-button" href="<?= $app->url->create('session/increment') ?>">/increase</a>
        <a class="session-button" href="<?= $app->url->create('session/decrement') ?>">/decrease</a>
        <a class="session-button" href="<?= $app->url->create('session/status') ?>">/status</a>
        <a class="session-button" href="<?= $app->url->create('session/dump') ?>">/dump</a>
        <a class="session-button" href="<?= $app->url->create('session/destroy') ?>">/destroy</a>
    </div>
</div>
