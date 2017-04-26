<?php

/**
 * Content
 *
 */
$app->router->add("content", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Content"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("pages/pages");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



/**
 *
 *
 */
$app->router->add("content/edit/**", function () use ($app) {
    if (!$app->users->isAdmin()) {
        $app->response->redirect($app->url->create(''));
    }
});



$app->router->add("content/edit/", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Content"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("pages/edit");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



/**
 *
 *
 */
$app->router->add("content/edit/updateContent", function () use ($app) {
    $app->content->updateContent($app->request->getPost());
    $app->response->redirect($app->url->create('content'));
});
