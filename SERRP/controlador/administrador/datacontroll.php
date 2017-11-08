<?php
	 require_once "../../ruta.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/accmenu.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/administrador/acciones.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/session.class.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/objetos/administrador/loginobj.php";
	 $bo = new boacciones();
	 $se = new session();
	 $resal = 'noOperacion';
	 switch($_REQUEST['accion']){
		case 'encabezado':
			$resal = $bo->getEncabezadoData($se->getDNI());
		break;
		case 'menu':
			$resal = $bo->getMenuData($se->getDNI());
		break;
	}
	print($resal);
?>
