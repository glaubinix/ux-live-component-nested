<?php declare(strict_types=1);

namespace App\Controller;

use App\Type\PizzaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route("/")]
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'form' => $this->createForm(PizzaType::class)->createView(),
        ]);
    }
}
