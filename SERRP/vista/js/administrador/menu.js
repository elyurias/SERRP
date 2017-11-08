var stSession;
$(document).ready(function(){
	try{
		ve({accion:'login',accion:getParam()['accion'],DNI:getParam()['DNI']});
	}catch(err){
		ve({accion:'login'});
	}
});
function closeSession(){
	ve({accion:'lout'});
}
function res_url(){
	setTimeout(function(){window.location = 'http://tesch.edu.mx/';},5000);
}
function ve(doc){
	$.post(
		"../../controlador/administrador/logincontroll.php",
		doc).done(function(data){
		usr = menu(data);
	});
}
function encabezado(doc){
	$.post(
		"../../controlador/administrador/datacontroll.php",
		doc).done(function(data){
		$('.encabezado').html(data);
	});
}
function menuD(doc){
	$.post(
		"../../controlador/administrador/datacontroll.php",
		doc).done(function(data){
	}).done(function(data){
		$('.menu').html(data);
		$(".button-collapse").sideNav();
	});
}
function menu(data){
	switch(data.trim()){
		case 'siSess':
			encabezado({accion:'encabezado'});
			menuD({accion:'menu'});
			return 1;
			//alert('Configurar menu');
		break;
		case 'siVali':
			$('#msgData').html("<div id='modal1' class='modal modal-fix-footer'><div class='modal-content'><h4>Mensaje del Sistema</h4><p>Bienvenido al Sistema de Entrega y Revision de Residencias Profesionales</p></div><div class='modal-footer'><a href='#!' class='modal-action modal-close waves-effect waves-blue btn-flat'>OK</a></div></div>");
			$('#modal1').modal();
			$('#modal1').modal('open');
			encabezado({accion:'encabezado'});
			menuD({accion:'menu'});
			return 2;
			//alert('Bienvenido');
			//alert('Configurar menu');
		break;
		case 'soSess':
			encabezado({accion:'encabezado'});
			menuD({accion:'menu'});
			return 3;
			//alert('Cierre sesion para acceder a otra cuenta');
		break;
		case 'ltend':
			$('#msgData').html("<div id='modal1' class='modal modal-fix-footer'><div class='modal-content'><h4>Mensaje del Sistema</h4><p>Sesion expirada</p></div></div>");
			$('#modal1').modal();
			$('#modal1').modal('open');
			res_url();
			return 4;
			//setTset ver data object
			//alert('Tempo caduro');
		break;
		case 'logout':
			$('#msgData').html("<div id='modal1' class='modal modal-fix-footer'><div class='modal-content'><h4>Mensaje del Sistema</h4><p>Sesion cerrada</p></div></div>");
			$('#modal1').modal();
			$('#modal1').modal('open');
			res_url();
			return 4;
		break;
		default:
			$('#msgData').html(data);
			$('#modal1').modal();
			$('#modal1').modal('open');
			return 5;
		break;
	}
}
function getParam(){
	var link = document.location.href;
	if(link.indexOf('?')>0){
		var getString = link.split('?')[1];
		//alert(getString);
		var GET = getString.split('&');
		var data = {};
		for (i = 0, l = GET.length; i < l; i++){
			var tmp = GET[i].split('=');
			data[tmp[0]] = unescape(decodeURI(tmp[1]));
		}
		return data;
	}else{	
	}
}
var n = 300000;
var timeS;
function getDataTime(){
	clearTimeout(timeS);
	timeS = setTimeout(function(){ve({accion:'ltend'});},n);
}
