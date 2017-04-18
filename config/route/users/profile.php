<?php

/**
 * Profile
 *
 */
$app->router->add("profile", function () use ($app) {
    if (!$app->session->has('user')) {
        header('Location: ' . $app->url->create(''));
        exit;
    }

    $app->view->add("take1/header", ["title" => "Home"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("take1/profile", ["data" => $app->users->getUserData($app->session->get('user'))]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



$app->router->add("updateProfile", function () use ($app) {
    $app->users->updateProfile($_POST);
    header("Location: " . $app->url->create('profile'));
});



$app->router->add("dashboard", function () use ($app) {
    if (!($app->session->has('user') && $app->users->isAdmin())) {
        header('Location: ' . $app->url->create(''));
        exit;
    }

    $app->view->add("take1/header", ["title" => "Home"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("take1/dashboard");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

// updateAllUsers

$app->router->add("updateProfileDashboard", function () use ($app) {
    if (!($app->session->has('user') && $app->users->isAdmin())) {
        header('Location: ' . $app->url->create(''));
        exit;
    }

    if (!empty($_GET['delete'])) {
        $app->users->removeUser($_GET['delete']);
    }

    // var_dump($_POST);
    // exit;
    $app->users->updateProfile($_POST);
    header("Location: " . $app->url->create('dashboard'));
});
