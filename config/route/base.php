<?php



/**
 * Home
 *
 */
$app->router->add("", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Home"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("take1/home");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



/**
 * About
 *
 */
$app->router->add("about", function () use ($app) {
    $app->view->add("take1/header", ["title" => "About"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("take1/about");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



/**
 * Report
 *
 */
$app->router->add("report", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Report"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("take1/report");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



/**
 * Calendar
 *
 */
$app->router->add("calendar", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Calendar"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("calendar/calendar");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



$app->router->add("filter/sample", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Text filter sample"]);
    $app->view->add("navbar1/navbar");
    $app->view->add("take1/login_modal");
    $app->view->add("filter/textfilter");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



/**
 * Details
 */
$app->router->add("status", function () use ($app) {
    $data = [
        "Server" => php_uname(),
        "PHP version" => phpversion(),
        "Included files" => count(get_included_files()),
        "Memory used" => memory_get_peak_usage(true),
        "Execution time" => microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],
    ];

    $app->response->sendJson($data);
});
