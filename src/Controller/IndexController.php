<?php

namespace App\Controller;

use App\Entity\Tache;
use App\Form\TacheType;
use App\Repository\TacheRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/taches', name: 'app_taches', methods: ['GET'])]
    public function taches(TacheRepository $tacheRepository): Response
    {
        return $this->render('taches.html.twig', [
            "tachesN" => $tacheRepository->findByEtat(1),
            "tachesEC" => $tacheRepository->findByEtat(2),
            "tachesT" => $tacheRepository->findByEtat(3)
        ]);
    }
}