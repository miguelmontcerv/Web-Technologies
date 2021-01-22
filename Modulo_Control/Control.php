<!DOCTYPE html>
<html>
<head>
	<title>Cafeteria Cannela Mx</title>

	<!--Fonts-->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" 
	 rel="stylesheet">


	<!--jquery-->
	<script src="jquery-3.5.1.min.js"></script>
	<script>
		var parametros= {
			"opt": 12,
			"rol": "admin"
		}
		$.ajax({
			data: parametros,
			url: "../connection/principal.php",
			type: "post",
			success: function(response) {
				if(response != 1) {
					location.replace("/index.html");
				}
			}
		});
	</script>

	<link rel="stylesheet" type="text/css" href="ControlEstilos.css">
	<script type="text/javascript" src="ControlScript.js"></script>
</head>
<body onload="actualizarTablas()">
<?php session_start(); ?>
	<div id="Container" class="container">
		<div id="LeftContainer" class="left-container">
			<h1>¡Bienvenido Administrador!</h1>
			<a id="Introduccion"> <h2>Apartados de control</h2></a>
			<p>¡Bienvenido al apartado de control de Cafe Cannela Mx!, aqu&iacute; podr&aacute;s encontrar algunos de los m&oacute;dulos que har&aacute;n mas f&aacute;cil llevar
			el control de los pedidos y servicios ofrecidos por el caf&eacute;, adem&aacute;s de que podr&aacute;s comunicarte con los usuarios e informarles de los nuevos productos y
			promociones que se están ofreciendo.</p>
			<p>En el apartado de la derecha podr&aacute;s visualizar un men&uacute; para ir directamente a los pedidos del servicio de catering solicitados recientemente, adem&aacute;s de que podr&aacute;s organizarlos y modificarlos.
			También podr&aacute;s actualizar las publicaciones semanales con una imagen que aparecer&aacute; en la p&aacute;gina principal y revisar los pedidos realizados por los clientes y el estatus en el que se encuentran.</p>
			<p>Cualquier problema o sugerencia respecto al apartado de control no olvides contactarnos al correo: cafeteriacannelamx@gmail.com</p>

			<div id="cafe_foto">
				<img src="Control_Images/cafe_love.png" class="img-cafe" alt="Imagen de cafe" />
			</div>

			<div id="sectionCatering">
				<a id="Catering"> <h2>Solicitudes de catering</h2> </a>
				<p>Estos son los pedidos de catering m&aacute;s recientes, aquí podr&aacute;s actualizar el estado en el que se encuentran y guardarlo en la base de datos presionando en actualizar tabla. Podrás ver algunos de los pedidos no tan recientes navegando con el bot&oacute;n de siguientes para llevar un mejor manejo de los servicios de catering ofrecidos.
				</p>
				<table id="tabla">
					<th colspan="5">Pedidos de catering</th>
					<tr>
						<td>No. de solicitud</td>
						<td>Correo de contacto</td>
						<td>No. de paquete</td>
						<td>Fecha</td>
						<td>Estatus</td>
					</tr>
				</table>

				<div id="btn_nav_catering" style="text-align: right; width: 90%; margin-top: 10px;">
					<input type="button" class="btn-nav-tab" name="btn_act_catering" id="btn_act_catering" value="Actualizar tabla" style="float: left;" onclick="getCatering()"/>
					<input type="button" class="btn-nav-tab" name="btn_prev_catering" id="btn_prev_catering" value="< Previos" onclick="disminuirRango()" />
					<input type="button" class="btn-nav-tab" name="btn_prev_catering" id="btn_prev_catering" value="Siguiente >" onclick="aumentarRango()" />
				</div>

			</div>

			<div id="sectionPublicaciones">
				<a id="Publicaciones"><h2>Publicaci&oacute;n Semanal</h2></a>
				<p>Actualice la publicaci&oacute;n semanal añadiendo una nueva imagen con las noticias y
				 ofertas m&aacute;s relevantes de la semana para que los clientes que accedan a la pagina puedan visualizarla.</p>
				<p> Suba una nueva imagen en formato .JPG, .JPEG o .PNG</p>

				 <div id="sel_img_form" style="text-align:center;">
				 						
					<form name="formulario" enctype="multipart/form-data" method="post" action="../connection/principal.php">
					
						<label for="archivo_publi" class="custom-file-upload">
							<img src="Control_Images/ic_upload_white.png" class="icon" />
							<input type="text" name="opt" value="7" hidden>
							<input type="text" name="mail" value="mokef2000@gmail.com" hidden>
							<input type="file" id="archivo_publi" name="userImage"  onchange="readURL(this);" accept="image/jpg, image/jpeg, image/png">
							Seleccione un archivo
						</label>
						
						<br><br>
						<!---->
						<img id="Imagen_Sel" src="#" alt="Imagen seleccionada" class="img-sel" />
						<br /><br />
						<input type="submit" id="btn_publicar" name="btn_publicar" class="btn-publicar">
					</form>
					
				 </div>

			</div>

			<div id="sectionPedidos" >
				<a id="Pedidos"><h2>Pedidos de los usuarios</h2></a>

				<p>Estas son las ordenes m&aacute;s recientes realizadas por los usuarios, aqu&iacute; podr&aacute;s actualizar el estado en el que se encuentran y guardarlo en la base de datos presionando en actualizar tabla. Podr&aacute;s ver algunos de las ordenes no tan recientes navegando con el bot&oacute;n de siguientes para llevar un mejor manejo de las ordenes.
				</p>

				<table id="tabla_orden">
					<th colspan="4">Ordenes del dia</th>
					<tr>
						<td>Codigo de pedido</td>
						<td>Correo de contacto</td>
						<td>Mensaje</td>
						<td>Estatus</td>
					</tr>
				</table>

				<div id="btn_nav_pedidos" style="text-align: right; width: 90%; margin-top: 10px;">
					<input type="button" class="btn-nav-tab" name="btn_act_pedidos" id="btn_act_pedidos" value="Actualizar tabla" style="float: left;" onclick="getOrdenes()">
					<input type="button" class="btn-nav-tab" name="btn_prev_pedidos" id="btn_prev_pedidos" value="< Previos" onclick="disminuirRangoOrden()">
					<input type="button" class="btn-nav-tab" name="btn_prev_pedidos" id="btn_prev_pedidos" value="Siguiente >" onclick="aumentarRangoOrden()">
				</div>
			</div>
		</div>

		<div id="LeftContainer2" class="left-container" style="height: 100vh; padding-bottom: 0vh;" hidden>
			<div id="sectionPedidos" >
				<a id="Pedidos"><h2>Perfil Admin</h2></a>
				<p>Información de Admin:</p>
				<div id="datos" class="form-row">
					
				</div>
			</div>
		</div>

		<div id="RightContainer" class="right-container">

			<div id="User-profile" class="user-profile">

				<img src="Control_Images/administrador.png" class="img-user" alt="Imagen del usuario" />
				<?php 
					//echo $_SESSION['email'];
					echo '<h3>'.$_SESSION['email'].'</h3>';
                ?>
				<input type="button" class="btn-perfil" onclick="esconder()" name="btn_perfil" id="btn_perfil" value="Ver perfil" style="cursor: pointer;" />
				<br /><br />
				<input type="button" class="btn-perfil" onclick="cerrar_sesion()" name="btn_perfil" id="btn_perfil" value="Cerrar sesión" style="cursor: pointer;" />
			</div>
			<div id="menuControl" class="menu-control">
				<ul>
					<li><a href="#Introduccion" onclick="aparecer()" class="nav-element active">Introducci&oacute;n</a></li>
					<li><a href="#Catering" onclick="aparecer()" class="nav-element">Solicitudes de catering</a></li>
					<li><a href="#Publicaciones" onclick="aparecer()" class="nav-element">Publicaci&oacute;n semanal</a></li>
					<li><a href="#Pedidos" onclick="aparecer()" class="nav-element">Pedidos recientes</a></li>
				</ul>
			</div>
		</div>	
	</div>
	<script>
		function esconder(){
			var parametros= {
				"opt": 3
			}
			$.ajax({
				data: parametros,
				url: "../connection/principal.php",
				type: "post",
				beforeSend: function() {
					document.getElementById("datos").innerHTML= "Cargando...";
					document.getElementById("LeftContainer2").hidden= false;
				},
				success: function(response) {
					document.getElementById("datos").innerHTML= response;
				}
			});
			document.getElementById("LeftContainer").hidden= true;
		}
		function aparecer() {
			document.getElementById("LeftContainer2").hidden= true;
			document.getElementById("LeftContainer").hidden= false;
		}

		var inferior= 0;
		var tamanio= 5;
		function getCatering() {
			var parametros= {
				"opt": 9,
				"inferior": inferior,
				"tamanio": tamanio
			}
			$.ajax({
				data: parametros,
				url: "../connection/principal.php",
				type: "post",
				beforeSend: function() {
					document.getElementById("tabla").innerHTML= "Cargando...";
				},
				success: function(response) {
					document.getElementById("tabla").innerHTML= response;
				}
			});
		}
		function aumentarRango() {
			inferior+= tamanio;
			getCatering();
		}
		function disminuirRango() {
			if(inferior != 0) {
				inferior-= tamanio;
			}
			getCatering();
		}

		function actualizarEstadoPedidoCatering(combo) {
			var estado= combo.value;
			var no_solicitud= combo.id.replace("catering_cat_", "");
			var parametros= {
				"opt": 13,
				"no_solicitud": no_solicitud,
				"estado": estado
			}
			$.ajax({
				data: parametros,
				url: "../connection/principal.php",
				type: "post"
			});
		}

		var inferioOrden= 0;
		function getOrdenes() {
			var parametros= {
				"opt": 8,
				"inferior": inferioOrden,
				"tamanio": tamanio
			}
			$.ajax({
				data: parametros,
				url: "../connection/principal.php",
				type: "post",
				beforeSend: function() {
					document.getElementById("tabla_orden").innerHTML= "Cargando...";
				},
				success: function(response) {
					document.getElementById("tabla_orden").innerHTML= response;
				}
			});
		}
		function aumentarRangoOrden() {
			inferioOrden+= tamanio;
			getOrdenes();
		}
		function disminuirRangoOrden() {
			if(inferioOrden != 0) {
				inferioOrden-= tamanio;
			}
			getOrdenes();
		}

		function actualizarEstadoOrden(combo) {
			var estado= combo.value;
			var no_orden= combo.id.replace("catering_ord_", "");
			var parametros= {
				"opt": 15,
				"no_orden": no_orden,
				"estado": estado
			}
			console.log(no_orden);
			$.ajax({
				data: parametros,
				url: "../connection/principal.php",
				type: "post"
			});
		}

		function cerrar_sesion() {
			var parametros= {
				"opt": 14
			}
			$.ajax({
				data: parametros,
				url: "../connection/principal.php",
				type: "post",
				success: function(response) {
					location.replace("/index.html");
				}
			});
		}

		function actualizarTablas() {
			getCatering();
			getOrdenes();
		}
	</script>
</body>
</html>