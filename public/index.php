<?php
use App\Models\EmailModel;
use App\Core\Main;

define('ROOT', dirname(__DIR__));

require_once ROOT.'/vendor/autoload.php';
require ROOT."/altorouter/AltoRouter.php";

// premier problem mon projet ne fonction pas sans ces require 
require_once ROOT."/src/Controllers/Controller.php";
// require_once ROOT."/src/Controllers/AnnoncesController.php";
// require_once ROOT."/src/Controllers/AjoutController.php";
// require_once ROOT."/src/Controllers/ShowController.php";
//require_once ROOT."/src/Controllers/DeleteController.php";
// require_once ROOT."/src/Controllers/UpdateController.php";
// require_once ROOT."/src/Controllers/ErrorController.php";
require_once ROOT."/src/Core/Main.php";
require_once ROOT."/src/Core/Db.php";
require_once ROOT."/src/Models/Model.php";
require_once ROOT."/src/Models/AnnoncesModel.php";
require_once ROOT."/src/Models/EmailModel.php";
require_once ROOT."/src/Models/PhotoModel.php";

$app = new Main();
$router = new AltoRouter();
// $app->start();
// $uri=$_SERVER['REQUEST_URI'];

// map homepage
// $router->map( 'GET', '/Otroc', function() {
// 	require __DIR__ . '/views/acceuil.php';
// });
$router->map('GET|POST', '/Otroc/','annonces','annonces');// GET,URL,ADDRESSE,NOM
$router->map('GET|POST', '/Otroc/ajout','ajout','ajout');
$router->map('GET|POST', '/Otroc/update', 'update', 'update');
$router->map('GET|POST','/Otroc/delete','delete', 'delete');
$router->map('GET|POST', '/Otroc/show', 'show', 'show');
$router->map('GET|POST', '/Otroc/error','error','error');
$router->map('GET|POST', '/Otroc/validation','validation','validation');

// $router->map( 'GET|POST', '/Otroc/[*:slug]','annonce','annoncePerso');
$router->map('GET|POST', '/Otroc/ajout/[*:slug]','ajout','ajoutPerso');
$router->map('GET|POST', '/Otroc/update/[*:slug]', 'update', 'updatePerso');
$router->map('GET|POST', '/Otroc/delete/[*:slug]', 'delete', 'deletePerso');
$router->map('GET|POST', '/Otroc/show/[*:slug]', 'show', 'showPerso');
$router->map('GET|POST', '/Otroc/error/[*:slug]','error');
$router->map('GET|POST', '/Otroc/validation/[*:slug]','validation','validationPerso');

$match = $router->match();
$app->router($match);