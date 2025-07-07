<?php

$middlewares = [
    'commande' => ['auth', 'isVendeur'],
    'facture' => ['auth', 'isClient'],
   
];

 function auth()
{

    if (!isset($_SESSION['user'])) {
        header('Location: /login');
        exit();
    }
}

function isVendeur()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'vendeur') {
        header('Location: /forbidden');
        exit();
    }
}

function isClient()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'client') {
        header('Location: /forbidden');
        exit();
    }
}

function runMiddlewares(array $names)
{
    global $middlewares;
    foreach ($names as $name) {
        if (isset($middlewares[$name])) {
            call_user_func($middlewares[$name]);
        }
    }
}