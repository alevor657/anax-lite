<?php
/**
 * Register
 *
 */
$app->router->add("register", function () use ($app) {
    $app->users->register($_POST);
});

$app->router->add("wrongFormData", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Wrong form data!"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("users/wrongFormData");
    // $app->view->add("take1/home");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});
