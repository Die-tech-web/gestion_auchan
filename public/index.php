<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../route/route.web.php';

// use App\Config\Core\Router;

// // Définition des routes
// Router::$routes = [
//     "/commande" => [
//         "controller" => "App\\Controller\\CommandeController",
//         "action" => "form"
//     ],
//     "/list" => [
//         "controller" => "App\\Controller\\CommandeController",
//         "action" => "list"
//     ]
// ];

// // Appel du routeur
// Router::resolve();

//logique de gestion du routage 
// donner a chasue lien une uri 
// tableau correspondance 
// uri = controller + action 
//identidier uri et le mapper au controlleur et l'action a executer tableau (routage)
// tableau met en relation uri contoller et action 
// fonction resolve qui defini le tableau ecris lalgo qui recupere l'uri si rien list


//nom communs des functions pour le controller index,store,show,create,edit,destroy
// index = list
// store = form
// show = facture
// create = form
// edit = form
// destroy = delete

// creer abstract controller dans core avec ces methodes


//Apporter listes des commandes chargés dynamiquement a rendre demain sinon wann di na niou ray !!
//in
//integrer page de conncexion controller securityController qui le charge
// layout le code commun entre plusieurs pages

