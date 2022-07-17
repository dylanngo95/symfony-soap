<?php

namespace App\Controller;

use App\Controller\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 */
class UserController extends AbstractController
{
    #[Route('/user')]
    public function soap(UserService $userService): Response
    {
        $wsdlPath = __DIR__ . '/../../public/static/hello.wsdl';
        $soapServer = new \SoapServer($wsdlPath);
        $soapServer->setObject($userService);

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $soapServer->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }
}