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
use Proyecto\PrincipalBundle\Entity\Usuario;

class UsersController extends Controller {

	public function registroAction() {

    	//access to database
		$parameters = UtilitiesAPI::getParameters($this);
		$menu = UtilitiesAPI::getMenu('Registro',$this);
		$user = UtilitiesAPI::getActiveUser($this);
		$notifications = UtilitiesAPI::getNotifications($user);

		$info = 'Rellene los siguientes campos para acceder al sistema';
		
		return $this -> render('ProyectoPrincipalBundle:Users:registro.html.twig', 
		array('parameters' => $parameters,'menu' => $menu,'user' => $user, 'info' => $info, 'notifications' => $notifications,
		));
	}

	public function registroGuardarAction() {
		$peticion = $this -> getRequest();
		$doctrine = $this -> getDoctrine();
		$post = $peticion -> request;
		//INICIALIZAR VARIABLES
		$nombre = trim(strtolower($post -> get("nombre")));
		$apellido = trim(strtolower($post -> get("apellido")));
		$nombreusuario = trim($post -> get("nombredeusuario"));
		$contrasenia = $post -> get("password");
		$sexo = $post -> get("sexomasculino");
		$email = $post -> get("email");

		$estado = false;
		UtilitiesAPI::crearUsuario($nombre, $apellido, $nombreusuario, $contrasenia, $sexo, $email, $this);
		$estado = true;
		$respuesta = new response(json_encode(array('estado' => $estado)));
		$respuesta -> headers -> set('content_type', 'aplication/json');
		return $respuesta;
	}

	public function accesoAction() {
		
    	//access to database
		$parameters = UtilitiesAPI::getParameters($this);
		$menu = UtilitiesAPI::getMenu('Acceso',$this);
		$user = UtilitiesAPI::getActiveUser($this);
		$notifications = UtilitiesAPI::getNotifications($user);

		$info = 'Ingrese su nombre de usuario y su contraseña';

		$error = NULL;
		$ultimo_nombreusuario = null;

		$peticion = $this -> getRequest();
		$sesion = $peticion -> getSession();
		// obtiene el error de inicio de sesión si lo hay
		if ($peticion -> attributes -> has(SecurityContext::AUTHENTICATION_ERROR))
			$error = $peticion -> attributes -> get(SecurityContext::AUTHENTICATION_ERROR);
		else
			$error = $sesion -> get(SecurityContext::AUTHENTICATION_ERROR);

		return $this -> render('ProyectoPrincipalBundle:Users:acceso.html.twig', 
		array('parameters' => $parameters,'menu' => $menu,'user' => $user, 'info' => $info, 'notifications' => $notifications,
			  'ultimo_nombreusuario' => $sesion -> get(SecurityContext::LAST_USERNAME), 'error' => $error));
	}

    public function perfilAction()
    {
    	//access to database
		$parameters = UtilitiesAPI::getParameters($this);
		$menu = UtilitiesAPI::getMenu('Acerca',$this);
		$user = UtilitiesAPI::getActiveUser($this);
		$notifications = UtilitiesAPI::getNotifications($user);

		$info = 'Lea o edite su perfil';

        return $this->render('ProyectoPrincipalBundle:Users:perfil.html.twig', 
        array('parameters' => $parameters,'menu' => $menu,'user' => $user, 'info' => $info, 'notifications' => $notifications,

			  ));
    }

}
