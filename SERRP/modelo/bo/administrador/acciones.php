<?php
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/accmenu.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/administrador/dataUserDao.php";
	class boacciones{
		private $vista;
		private $dao;
		function __construct(){
			$this->vista = new accVista();
			$this->dao = new daousuario(); //nueva instancia
		}
		function getEncabezadoData($modulo){
			$encabezado = $this->dao->getDataUsuario($modulo);
			$vencabezado = $this->vista->getEncabezado($encabezado);
			return $vencabezado;
		}
		function getMenuData($modulo){
			$encabezado = $this->dao->getDataUsuario($modulo);
			$vmenu = $this->vista->getMenu($encabezado);
			return $vmenu;
		}
	}
?>
