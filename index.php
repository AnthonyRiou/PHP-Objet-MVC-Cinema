<?php 
require_once "vendor/autoload.php";

use cinema\controller\FrontController; 
use cinema\controller\BackController;


// installer Twig en installant par le terminal en faisant  : composer require twig/twig.

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/src/view');
$twig = new Environment($loader, ['cache' => false, 'debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$fc = new FrontController($twig); 
$bc = new BackController(); 

$base  = dirname($_SERVER['PHP_SELF']);

if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}
// echo "<pre>";
// print_r($_SERVER);


$route = new \Klein\Klein();

$route->respond('GET', '/', function() use ($fc) {
   $fc->films();
});

$route->respond('GET','/acteurs', function() use($fc) {
   $fc->acteurs(); 
});

$route->respond('GET','/acteur/[:id]', function($request) use($fc) {
    $fc->acteur($request->id); 
 });

 $route->respond('GET','/realisateurs', function() use($fc) {
   $fc->realisateurs(); 
 });

 $route->respond('GET','/realisateur/[:id]', function($request) use($fc) {
    $fc->realisateur($request->id); 
 });

 $route->respond('GET','/genres', function() use($fc) {
  $fc->genres(); 
});

$route->respond('GET','/genre/[:id]', function($request) use($fc) {
   $fc->genre($request->id); 
});

$route->respond('GET','/films', function() use($fc) {
  $fc->films(); 
});

$route->respond('GET','/film/[:id]', function($request) use($fc) {
   $fc->film($request->id); 
});

$route->respond('GET','/addacteur', function() use($fc) {
   $fc->addacteur();  // affichage d'un formulaire de creation de acteur
});

$route->respond('GET','/addgenre', function() use($fc) {
   $fc->addgenre();  // affichage d'un formulaire de creation de genre
});

$route->respond('GET','/addrealisateur', function() use($fc) {
   $fc->addrealisateur();  // affichage d'un formulaire de creation de realisateur
});
$route->respond('GET','/addfilm', function() use($fc) {
   $fc->addfilm();  // affichage d'un formulaire d'ajout de realisateur
});
$route->respond('GET','/modiffilm/[:id]', function($request,$response) use($fc) {
   $fc->modiffilm($request->id); 
 
});
$route->respond('GET','/ajouteacteur/[:id]', function($request,$response) use($fc) {
   $fc->ajouteacteur($request->id); 
 
});




// Vers BackController


$route->respond('POST','/addacteur', function($request,$response) use($bc) {
   $bc->addacteur($request->paramsPost()); // ajout d'un acteur
   $response->redirect(".$base./cinema/films")->send();
   // $reponse->send('ok'); 
});


$route->respond('POST','/addgenre', function($request,$reponse) use($bc){
   $bc->addgenre($request->paramsPost()); // ajout d'un genre
   $response->redirect(".$base./cinema/films")->send();
   // $reponse->send('ok');
});

$route->respond('POST','/addrealisateur', function($request,$response) use($bc){
   $bc->addrealisateur($request->paramsPost()); // ajout d'un realisateur
   $response->redirect(".$base./cinema/films")->send(); 
   // $reponse->send('ok');
});
$route->respond('POST','/addfilm', function($request,$response) use($bc){
   $bc->addfilm($request->paramsPost()); // ajout d'un film
   $response->redirect(".$base./cinema/films")->send();
   // $reponse->send('ok');
});
$route->respond('POST','/modif_film/[:id]', function($request,$response) use($bc){
   $bc->modif_film($request->id, $request->paramsPost() ); // modification d'un film
   $response->redirect(".$base./cinema/films")->send(); 
});
$route->respond('POST','/addacteur_film', function($request,$response) use($bc){
   $bc->addacteur_film ($request->paramsPost()); // ajout d'un acteur
   $response->redirect(".$base./cinema/films")->send(); 
   // $response->send('ok');
});

$route->dispatch();

?>