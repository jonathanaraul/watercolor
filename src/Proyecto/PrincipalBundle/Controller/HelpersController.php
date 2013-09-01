<?php

namespace Proyecto\PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Proyecto\PrincipalBundle\Entity\User;

class HelpersController extends Controller
{

    public function listaNavegacionAction($menu,$user)
    {
        return $this->render('ProyectoPrincipalBundle:Helpers:listaNavegacion.html.twig', array('menu' => $menu,'user'=>$user));
    }
    public function statsAction()
    {
		$alertanormal = 'probando';
        return $this->render('ProyectoPrincipalBundle:Helpers:estadisticas.html.twig', array('alertanormal'=>$alertanormal));
    }
}
