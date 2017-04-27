<?php
$data = $app->content->getBlockData();
?>

<div class="block">
    <h3><?=$data->title?></h3>
    <?=$data->data?>
</div>
