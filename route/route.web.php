<?php


use App\Config\Core\Router;


Router::$routes = [
    "/login" => [
        "controller" => "App\\Controller\\SecurityController",
        "action" => $_SERVER['REQUEST_METHOD'] === 'POST' ? 'login' : 'index'

    ],
    "/commande" => [
        "controller" => "App\\Controller\\CommandeController",
        "action" => "create",
        "middlewares" => ['auth', 'isVendeur']
    ],
    "/list" => [
        "controller" => "App\\Controller\\CommandeController",
        "action" => "index",
        // "middlewares" => ['auth']
        
    ],
    "/facture" => [
        "controller" => "App\\Controller\\FactureController",
        "action" => "show",
        "middlewares" => ['auth', 'isVendeur']
    ],
    "/logout" => [
        "controller" => "App\\Controller\\SecurityController",
        "action" => "logout"
    ]
];


Router::resolve();
