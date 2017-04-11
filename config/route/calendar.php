<?php



$app->router->add("calendar/next", function () use ($app) {
    $app->session->set(
        'dateOffset',
        $app->session->get('dateOffset', 0) + 1
    );

    header('Location: ' . $_SERVER['HTTP_REFERER']);
});



$app->router->add("calendar/prev", function () use ($app) {
    $app->session->set(
        'dateOffset',
        $app->session->get('dateOffset', 0) - 1
    );

    header('Location: ' . $_SERVER['HTTP_REFERER']);
});
