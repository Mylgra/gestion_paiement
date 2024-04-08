<?php

use App\Controllers\Home;
use App\Controllers\EtudiantController;
use App\Controllers\PaiementController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index'], ['as' => 'home']);

$routes->get('/paiement', [PaiementController::class, 'index'], ['as' => 'paiement']);
$routes->post('/paiement/store', [PaiementController::class, 'enregistrer'], ['as' => 'paiement_create']);


$routes->get('/etudiant', [EtudiantController::class, 'index'] ,['as'=> 'etudiant']);
$routes->post('/etudiant/store', [EtudiantController::class, 'enregistrer'] ,['as'=> 'enregistrement_etudiant']);

$routes->get('/etudiant/voir/(:num)', [EtudiantController::class, 'voir'] ,['as'=> 'voir_etudiant']);


$routes->get('/etudiant/edition/(:num)', [EtudiantController::class, 'editer'] ,['as'=> 'editer_etudiant']);
$routes->put('/etudiant/update/(:num)', [EtudiantController::class, 'update'], ['as'=> 'update_etudiant']);


$routes->delete('/etudiant/delete/(:num)', [EtudiantController::class, 'supprimer'] ,['as'=> 'supprimer_etudiant']);


// systeme de filtrage 
$routes->get('/filtrage/date', [Home::class, 'parDate'], ['as' => 'pardate']); 
$routes->get('/filtrage/etudiant', [Home::class, 'parEtudiant'], ['as' => 'paretudiant']); 
$routes->get('/filtrage/promotion', [Home::class, 'parPromotion'], ['as' => 'parpromotion']); 