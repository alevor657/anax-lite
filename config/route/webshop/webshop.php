<?php
/**
 * Webshop
 *
 */
$app->router->add("webshop/**", function () use ($app) {
    if (!$app->users->isAdmin()) {
        $app->response->redirect($app->url->create(''));
    }
});


$app->router->add("webshop", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Webshop"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("webshop/side-block");
    $app->view->add("webshop/webshop", ["data" => $app->shop->getStockData()]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("webshop/edit/", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Webshop"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("webshop/side-block");
    $app->view->add("webshop/edit", ["data" => $app->shop->getStockDataById($app->request->getGet('edit'))]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("webshop/edit/updateStock", function () use ($app) {
    $app->shop->updateData($app->request->getPost());
    $app->response->redirect($app->url->create('webshop'));
});

$app->router->add("webshop/edit/delete", function () use ($app) {
    $app->shop->delete($app->request->getGet('delete'));
    $app->response->redirect($app->url->create('webshop'));
});

$app->router->add("webshop/edit/addItem", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Webshop"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("webshop/side-block");
    $app->view->add("webshop/add");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("webshop/edit/addToStock", function () use ($app) {
    $app->shop->add($app->request->getPost());
    $app->response->redirect($app->url->create('webshop'));
});

$app->router->add("webshop/cart", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Webshop"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("webshop/cart", ["data" => $app->shop->getCart()]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("webshop/checkout", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Webshop"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("webshop/checkout", ["data" => $app->shop->getOrderDetails()]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("webshop/cart/addToCart", function () use ($app) {
    $app->shop->addToCart($app->request->getGet('add'));
    $app->response->redirect($app->url->create('webshop'));
});

$app->router->add("webshop/cart/delete", function () use ($app) {
    $app->shop->deleteFromCart($app->request->getGet('delete'));
    $app->response->redirect($app->url->create('webshop/cart'));
});
