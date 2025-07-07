<?php

namespace App\Config\Core;

abstract class AbstractController

{
    protected Session $session;
    public function __construct()
    {
        $this->session = new Session();
    }
    abstract public function index();

    abstract public function store();

    abstract public function create();


    abstract public function destroy();

    abstract public function show();

    abstract public function edit();

    protected function renderHtml(String $view, array $params = [])
    {
        extract($params);
        ob_start();
        require_once '../template/' . $view;
        $contentForLayout = ob_get_clean();

        // Afficher le header sauf sur la page de connexion
        $showHeader = basename($view) !== 'login.html.php';
        require '../template/layout/base.layout.php';
    }
}
