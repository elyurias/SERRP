<?php
	 require_once "../../ruta.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/msgModal.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/administrador/loginbo.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/session.class.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/objetos/administrador/loginobj.php";
	 $bo = new bologin();
	 $se = new session();
	 $resal = 'noOperacion';
	 switch($_REQUEST['accion']){
		 case 'login':
			if($se->isSession()){
				$resal = 'siSess';
				if($se->limit_session_time()){
					$resal = 'ltend';
					$se->sessionDef();
				}
				if(isset($_REQUEST['DNI']) and !empty($_REQUEST['DNI'])){
					$resal = 'soSess';
				}
			}else{
				if(isset($_REQUEST['DNI']) and !empty($_REQUEST['DNI'])){
					$formulario = new admdata();
					$formulario->DNI = $_REQUEST['DNI'];
					$r = $bo->consultaSession($formulario);
					if($r == 'noRegs' and !$e){
							$resal = msgModal::getErrorMsg('Usuario no registrado, pongase en contacto con el administrador');
					}else{
						$e = $bo->consultaStatus($formulario);
						if(!$e){
							$resal = msgModal::getErrorMsg('Usuario no activo, pongase en contacto con el administrador');
						}else{
							$se->setDNI($_REQUEST['DNI']);
							$se->setTipo($r[0]['tipo']);
							//$resal = msgModal::getModalMsg('Bienvenido','<h5>Tipo de usuario: '.$datat.'</h5>');
							$resal = 'siVali';
						}
					}
				}else{
					$resal = msgModal::getErrorMsg('Usuario no valido, pongase en contacto con el administrador');
				}
			}
		break;
		case 'lout':
			$resal = 'logout';
			$se->sessionDef();
		break;
		case 'ltend':
			$resal = 'ltend';
			$se->sessionDef();
		break;
	}
	print($resal);
?>
