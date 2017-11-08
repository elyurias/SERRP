<?php
	class adminABC{
		static function sqlGetDataAdmCall(){
			return "SELECT getusuario(?) as tipo;";
		}
		static function sqlGetStatusCall(){
			return "SELECT getusuarioestado(?) as estado;";
		}
		static function sqlGetData(){
			return "SELECT * FROM getdatausuario WHERE VidentiQR_usuario = ?;";
		}
	}
?>
