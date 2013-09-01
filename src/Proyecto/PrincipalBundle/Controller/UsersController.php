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
use Symfony\Component\Security\Core\Util\StringUtils;
use Proyecto\PrincipalBundle\Entity\User;

class UsersController extends Controller {

	public function registroAction() {

    	//access to database
		$parameters = UtilitiesAPI::getParameters($this);
		$menu = UtilitiesAPI::getMenu('Registro',$this);
		$user = UtilitiesAPI::getActiveUser($this);
		$notifications = UtilitiesAPI::getNotifications($user);

		$info = 'Rellene los siguientes campos para acceder al sistema';
		
		return $this -> render('ProyectoPrincipalBundle:Users:cuenta.html.twig', 
		array('parameters' => $parameters,'menu' => $menu,'user' => $user, 'info' => $info, 'notifications' => $notifications,
		));
	}

	public function cuentaGuardarAction() {
		$peticion = $this -> getRequest();
		$doctrine = $this -> getDoctrine();
		$post = $peticion -> request;
		//INICIALIZAR VARIABLES
		$tipo = $post -> get("tipo");//Saber si se actualiza o si se crea
		$nombre = trim(strtolower($post -> get("nombre")));
		$apellido = trim(strtolower($post -> get("apellido")));
		$nombreusuario = trim($post -> get("nombredeusuario"));
		$contrasenia = $post -> get("password");
		$contrasenia2 = $post -> get("password2");
		$sexo = intval($post -> get("sexomasculino"));
		$email = $post -> get("email");
		$descripcion = htmlentities(addslashes($post -> get("descripcion")));
		$path = "images/avatar-man.png";
		
		if($sexo == 1 ) $path = "images/avatar-woman.png";

		$estado = StringUtils::equals($contrasenia, $contrasenia2);
		if($estado == true)UtilitiesAPI::procesaUsuario($tipo, $nombre, $apellido, $nombreusuario, $contrasenia, $sexo, $email, $descripcion, $path, $this);
		
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
		$menu = UtilitiesAPI::getMenu('Perfil',$this);
		$user = UtilitiesAPI::getActiveUser($this);
		$auxiliar = array('descripcionusuario'=>stripcslashes(html_entity_decode($user->getDescripcion())));
		 
	
		$notifications = UtilitiesAPI::getNotifications($user);

		$info = 'Lea o edite su perfil';

        return $this->render('ProyectoPrincipalBundle:Users:cuenta.html.twig', 
        array('parameters' => $parameters,'menu' => $menu,'user' => $user, 'info' => $info, 'notifications' => $notifications, 'auxiliar'=>$auxiliar,

			  ));
    }

}
