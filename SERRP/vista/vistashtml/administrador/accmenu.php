<?php
	class accVista{
		public function getEncabezado($data){
			echo "<div class='grid-container'>
					<div class='row'>
						<div class='col xl12 l12 m12 s12'>
								<div class='grid-container'>
									<div class='center-align row'>
									<div class='col xl3 l3 m6 s12'>
											<center>
												<a href='index.html'>
													<img class='responsive-img' src='../img/teschalogo.jpg'>
												</a>
											</center>
										</div>
										<div class='col xl7 l5 m6 s12'>
											<h3 class='flow-text blue-text lighten-1'>Panel principal: ".$data[0]['Vnombre_tu']."</h3><br>
										</div>
										<div class='col xl2 l4 m12 s12'>
											<a href='#' data-activates='slide-out' class='button-collapse waves-effect waves-light btn blue'>Menu</a>
											<a href='#' onclick='closeSession();' class='waves-effect waves-light btn red'>Salir</a>
										</div>
									</div>
								</div>
						</div>
					</div>
					<div class='row'>
						<div class='col s12 blue lighten-3'><br></div>
					</div>
				</div>
				 ";
		}
	    public function getPiePagina($modo,$detalle){
	
		}
		public function getMenu($modo){
			switch($modo[0]['id_tipo_usuario']){
				case 1:
					return "<ul id='slide-out' class='side-nav'>
								<li>
									<div class='user-view'>
										<div class='background'>
											<img src='../img/fondo.jpg'>
										</div>
										<a><spaw class='white-text name'>Nombre: ".$modo[0]['Vnombre_usuario'].' '.$modo[0]['Vpaterno_usuario'].' '.$modo[0]['Vmaterno_usuario'].' '."</spaw></a>
										<a><spaw class='white-text email'>Correo: ".$modo[0]['Vcorreo_usuario']."</spaw></a>
									</div>
								</li>
								<li>
									<a>Registro de asesores</a>
								</li>
								<li>
									<a>Registro de alumnos</a>
								</li>
								<li>
									<a>Estadisticas</a>
								</li>
								<li>
									<a>Configuracion</a>
								</li>
								<li>
									<div class='divider'></div>
								</li>
								<li>
									<a href='#' onclick='closeSession();'>Salir</a>
								</li>
							</ul>";
				break;
				case 2:
				break;
				case 3: 
				break;
				default:
					return 'error';
				break;
			}
		}
	}
	
	/*
					<p>Nombre: ".$data[0]['Vnombre_usuario'].' '.$data[0]['Vpaterno_usuario'].' '.$data[0]['Vmaterno_usuario'].' '."
							<br>Correo: ".$data[0]['Vcorreo_usuario']."</p>
	 * */
?>
