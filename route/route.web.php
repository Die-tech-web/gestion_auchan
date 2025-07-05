<?php

//route/route.web.php
use App\Config\Core\Router;

// Définition des routes
Router::$routes = [
    "/login" => [
        "controller" => "App\\Controller\\SecurityController",
        //"action" => $_SERVER['REQUEST_METHOD'] === 'POST' ? 'login' : 'index'
        "action" => $_SERVER['REQUEST_METHOD'] === 'POST' ? 'login' : 'index'

    ],
    "/commande" => [
        "controller" => "App\\Controller\\CommandeController",
        "action" => "create"
    ],
    "/list" => [
        "controller" => "App\\Controller\\CommandeController",
        "action" => "index"
    ],
    "/facture" => [
        "controller" => "App\\Controller\\FactureController",
        "action" => "show"
    ],
    "/logout" => [
        "controller" => "App\\Controller\\SecurityController",
        "action" => "logout"
    ]
];

// Appel du routeur
Router::resolve();
