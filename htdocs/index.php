<?php
/**
 * Bootstrap the framework.
 */
// Where are all the files? Booth are needed by Anax.
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/.."));
define("ANAX_APP_PATH", ANAX_INSTALL_PATH);

// Include essentials
require ANAX_INSTALL_PATH . "/config/error_reporting.php";

// Get the autoloader by using composers version.
require ANAX_INSTALL_PATH . "/vendor/autoload.php";

// Add all resources to $app
$app           = new \Alvo16\App\App();
$app->request  = new \Anax\Request\Request();
$app->url      = new \Anax\Url\Url();
$app->router   = new \Anax\Route\RouterInjectable();
$app->response = new \Anax\Response\Response();
$app->view     = new \Anax\View\ViewContainer();
$app->navbar   = new \Alvo16\Navbar\Navbar();
$app->session  = new \Alvo16\Session\Session();
$app->db       = new \Anax\Database\DatabaseConfigure();
$app->users    = new \Alvo16\Users\Users();
$app->cookie   = new \Alvo16\Cookie\Cookie();
$app->dashboard = new \Alvo16\Dashboard\Dashboard();
$app->filter   = new \Mos\TextFilter\CTextFilter();
$app->content  = new \Alvo16\Content\Content();
$app->shop     = new \Alvo16\Shop\Shop();

$app->navbar->setApp($app);
$app->content->setApp($app);
$app->shop->setApp($app);
$app->navbar->configure("navbar.php");


$app->db->configure('database.php');
$app->db->setDefaultsFromConfiguration();

$app->session->start();

// Inject $app into the view container for use in view files.
$app->view->setApp($app);

$app->users->setApp($app);

$app->cookie->setApp($app);

$app->dashboard->setApp($app);

// Update view configuration with values from config file.
$app->view->configure("view.php");

// Init the object of the request class.
$app->request->init();

// Init the url-object with default values from the request object.
$app->url->setSiteUrl($app->request->getSiteUrl());
$app->url->setBaseUrl($app->request->getBaseUrl());
$app->url->setStaticSiteUrl($app->request->getSiteUrl());
$app->url->setStaticBaseUrl($app->request->getBaseUrl());
$app->url->setScriptName($app->request->getScriptName());

// Update url configuration with values from config file.
$app->url->configure("url.php");
$app->url->setDefaultsFromConfiguration();

// Load the routes
require ANAX_INSTALL_PATH . "/config/route.php";

// Leave to router to match incoming request to routes
$app->router->handle($app->request->getRoute());
