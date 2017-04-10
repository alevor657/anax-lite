<?php

$app->session->set('count', $app->session->get('count', 0) + 1);
header("Location: " . $_SERVER['HTTP_REFERER']);
