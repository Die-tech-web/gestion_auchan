<?php
namespace App\Controller;
use App\Config\Core\AbstractController;
use App\Service\CommandeService;

class CommandeController extends AbstractController
{
    private CommandeService $commandeService;

    public function __construct()
    {
        $this->commandeService = new CommandeService();
    }

    public function index()
    {
        $commandes = $this->commandeService->listerCommandes();
        // var_dump($commandes); die; // Ajoute ceci temporairement
        $this->renderHtml('commande/list.html.php', ['commandes' => $commandes]);
    }

    public function store()
    {
        // À compléter pour l'enregistrement d'une commande
    }

    public function create()
    {
        $this->renderHtml('commande/form.html.php');
    }

    public function destroy() {}
    public function show() {}
    public function edit() {}
    public function update() {}
}