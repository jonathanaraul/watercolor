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
use Proyecto\PrincipalBundle\Entity\Autores;

class PrincipalController extends Controller
{
	 public function editarAction()
    {
    	//access to database
		$parameters = UtilitiesAPI::getParameters($this);
		$menu = UtilitiesAPI::getMenu('Listado',$this);
		$user = UtilitiesAPI::getActiveUser($this);
		$notifications = UtilitiesAPI::getNotifications($user);

		//$user->setDescripcion(html_entity_decode($user->getDescripcion()));
		$info = 'Seleccione el archivo a editar';
		
        return $this->render('ProyectoPrincipalBundle:Principal:editar.html.twig', 
        array('parameters' => $parameters,'menu' => $menu,'user' => $user, 'info' => $info, 'notifications' => $notifications
			  ));
    }
	 public function nuevoAction()
    {
    	//access to database
		$parameters = UtilitiesAPI::getParameters($this);
		$menu = UtilitiesAPI::getMenu('Nuevo',$this);
		$user = UtilitiesAPI::getActiveUser($this);
		$notifications = UtilitiesAPI::getNotifications($user);

		$info = 'Para comenzar por favor rellene el formulario';
		
        return $this->render('ProyectoPrincipalBundle:Principal:nuevo.html.twig', 
        array('parameters' => $parameters,'menu' => $menu,'user' => $user, 'info' => $info, 'notifications' => $notifications
			  ));
    }
    public function indexAction()
    {
    	//access to database
		$parameters = UtilitiesAPI::getParameters($this);
		$menu = UtilitiesAPI::getMenu('Panel de Control',$this);
		$user = UtilitiesAPI::getActiveUser($this);
		$notifications = UtilitiesAPI::getNotifications($user);

		$info = 'Bienvenido seleccione su categoría';

        return $this->render('ProyectoPrincipalBundle:Principal:index.html.twig', 
        array('parameters' => $parameters,'menu' => $menu,'user' => $user, 'info' => $info, 'notifications' => $notifications
			  ));
    }
    public function acercaAction()
    {
    	//access to database
		$parameters = UtilitiesAPI::getParameters($this);
		$menu = UtilitiesAPI::getMenu('Acerca',$this);
		$user = UtilitiesAPI::getActiveUser($this);
		$notifications = UtilitiesAPI::getNotifications($user);
		$autors = UtilitiesAPI::getAutors($this);
		$auxiliar = array('descripcionusuario'=>stripcslashes(html_entity_decode($user->getDescripcion())));


		$info = $parameters->getNombre().' '.$parameters->getVersion();

        return $this->render('ProyectoPrincipalBundle:Principal:acerca.html.twig', 
        array('parameters' => $parameters,'menu' => $menu,'user' => $user, 'info' => $info, 'notifications' => $notifications, 'auxiliar'=>$auxiliar,
			  'autors'=>$autors
			  ));
    }
}
