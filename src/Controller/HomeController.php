<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LivreRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(LivreRepository $lr)
    {
        $livres = $lr->findAll();
        return $this->render('home/index.html.twig', compact("livres"));
    }

    /**
     * @Route("/auteur/{auteur}", name="recherche_auteur")
     */
    public function search(LivreRepository $lr, $auteur)
    {
        $livres = $lr->findByAuteur($auteur);
        return $this->render('home/index.html.twig', compact("livres"));
    }

    /**
     * @Route("/titre/{titre}", name="recherche_titre")
     */
    public function searchTitre(LivreRepository $lr, $titre)
    {
        $livres = $lr->findByTitre($titre);
        return $this->render('home/index.html.twig', compact("livres"));
    }
}
