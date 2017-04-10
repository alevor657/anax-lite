<?php
$calendar = new \Alvo16\Calendar\Calendar();
$calendar->setApp($app);
echo $calendar->getHTMLCalendar();

$app->session->dump();

?>

<a href="<?= $app->url->create('calendar/next') ?>" class="next pagination">
    >
</a>

<a href="<?= $app->url->create('calendar/prev') ?>" class="prev pagination">
    <
</a>
