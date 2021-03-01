<?php

namespace App\Controller;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS');
header('Access-Control-Allow-Credentials: true');

use App\Repository\Test1Repository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class AccueilController extends AbstractController
{

     /**
     * @Route("/api", name="api")
     * @return JsonResponse
     */
    
    public function test()
    {
        $data = [
            [
                "title" => "Connexion établie entre React et la 9ème",
                "description" => "Ce n'est pas enccore au point pour relier avec la bdd"
            ]
        ];
        return new JsonResponse($data);
    }

}
