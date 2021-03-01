<?php

namespace App\Controller;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS');
header('Access-Control-Allow-Credentials: true');

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\MakerBundle\Validator;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiPostController extends AbstractController
{
    /**
     * @Route("/api/user/get", name="api_user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository)
    {
       // transformation les objets en tableaux 
        return $this->json($userRepository->findAll(), 200, []);
    }

     /**
     * @Route("/api/user/post", name="api_user_post", methods={"POST"})
     */
    public function post(Request $request, SerializerInterface $serializerInterface, EntityManagerInterface $entityManagerInterface,
    ValidatorInterface $validatorInterface)
    {
        
        try {
        $jsonRecu = $request->getContent();

        $post = $serializerInterface->deserialize($jsonRecu, User::class, 'json');
        
        $error = $validatorInterface->validate($post);

        if (count($error) > 0) {
            return $this->json($error, 400);
        }

        $entityManagerInterface->persist($post);
        $entityManagerInterface->flush();

        return $this->json($post, 201, []);
    
    } catch(NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
