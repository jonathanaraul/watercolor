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

class DefaultController extends Controller {
	public function acercaAction() {
		$parameters = UtilitiesAPI::getParameters($this);
		$user = UtilitiesAPI::getActiveUser($this);
		$autors = UtilitiesAPI::getAutors($this);
		$auxiliar = array('descripcionusuario' => stripcslashes(html_entity_decode($user -> getDescripcion())));

		$firstArray = UtilitiesAPI::getDefaultContent('Acerca', $parameters -> getNombre() . ' ' . $parameters -> getVersion(), $this);
		$secondArray = array('autors' => $autors, 'auxiliar' => $auxiliar);

		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProyectoPrincipalBundle:Principal:acerca.html.twig', $array);
	}

	public function editarAction() {
		$firstArray = UtilitiesAPI::getDefaultContent('Listado', 'Seleccione el archivo a editar', $this);
		$secondArray = array();

		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProyectoPrincipalBundle:Principal:editar.html.twig', $array);
	}

	public function indexAction() {
		$firstArray = UtilitiesAPI::getDefaultContent('Panel de Control', 'Bienvenido seleccione su categoría', $this);
		$secondArray = array();

		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProyectoPrincipalBundle:Principal:index.html.twig', $array);
	}

	public function nuevoAction() {
		$firstArray = UtilitiesAPI::getDefaultContent('Nuevo', 'Para comenzar por favor rellene el formulario', $this);
		$secondArray = array();

		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProyectoPrincipalBundle:Principal:nuevo.html.twig', $array);
	}

}
