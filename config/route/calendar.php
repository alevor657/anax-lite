<?php

$app->router->add("calendar/next", function () use ($app) {
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
});

$app->router->add("calendar/prev", function () use ($app) {
    $date = $app->session->get('date', date('F-Y'));
    $app->session->set('date', date('F-Y', strtotime("-1 month")));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
});
