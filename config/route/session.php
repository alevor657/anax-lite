<?php

/**
 * Session
 */
$app->router->add("session", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Home"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("session/session");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



$app->router->add("session/increment", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Home"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("session/session-increment");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



$app->router->add("session/decrement", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Home"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("session/session-decrement");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



$app->router->add("session/status", function () use ($app) {
    $data = [
        "Session status" => session_status(),
        "Session save path" => session_save_path(),
        "Session id" => session_id(),
    ];

    $app->response->sendJson($data);
});



$app->router->add("session/dump", function () use ($app) {
    $app->session->dump();
});



$app->router->add("session/destroy", function () use ($app) {
    $app->session->destroy();
    header("Location: ../session/dump");
});
