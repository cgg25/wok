<?php 
	include_once("objUsuario.php");
	function menu()
	{
		if (empty($_SESSION['usuario'])) {?>
			<header>
				<nav class='nav-extended  red darken-1'>
				    <div class='nav-wrapper'>
				      <a href='#' class='brand-logo'><img class='logo' src='palillos.png'><span id='logo'>Wok<b>Express</b></span></a>
				      <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
				      <ul class='right hide-on-med-and-down'>
				      	<li><a href='index.php'>Home</a></li>
				        <li><a href='#modal' class='waves-effect waves-light'>Haz tu pedido</a></li>
				        <li><a href='contacto.php'>Contacto</a></li>
				        <li><a href='entrar.php'> Entrar</a></li>
				        <li><a href='registrarse.php'> Registrarse</a></li>
				      	<li id='user'>Bienvenido Invitado</li>
				      </ul>
				      <ul class='side-nav' id='mobile-demo'>
				       	<li><a href='index.php'>Home</a></li>
				        <li><a href='#modal' class='waves-effect waves-light'>Haz tu pedido</a></li>
				        <li><a href='contacto.php'>Contacto</a></li>
				        <li><a href='entrar.php'> Entrar</a></li>
				        <li><a href='registrarse.php'> Registrarse</a></li>
				      	<li id='user'>Bienvenido Invitado</li>
				      </ul>
				    </div>
				</nav>
				<!--Modal del boton haz tu pedido.-->
				<div id='modal' class='modal'>
				    <div class='modal-content'>
				      <h4>Registrate para poder hacer tu pedido!</h4>
				      <p>Si estas registrado, Entra para poder elegir tu Wok!</p>
				    </div>
				    <div class='modal-footer'>
				      <a href='registrarse.php' class=' modal-action waves-effect waves-red btn-flat '>Registrate</a>
				      <a href='entrar.php' class=' modal-action  waves-effect waves-red btn-flat '>Entrar</a>
				    </div>
				</div>
			</header>
		<?php }else if ($_SESSION['usuario']->getNick()=="admin") { ?>
				<header>
				<nav class='nav-extended  red darken-1'>
				    <div class='nav-wrapper'>
				      <a href='#' class='brand-logo'><img class='logo' src='palillos.png'><span id='logo'>Wok<b>Express</b></span></a>
				      <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
				      <ul class='right hide-on-med-and-down'>
				      	<li><a href='index.php'>Home</a></li>
				      	<li><a href='gestion.php'>Gestionar Usuarios</a></li>
				        <li><a href='wok.php'>wok</a></li>
				        <li><a href='historial.php'>Historial Pedidos</a></li>
				        <li><a href='cerrar.php'>Cerrar Sesión</a></li>
				 
				      </ul>
				      <ul class='side-nav' id='mobile-demo'>
				      	<li><a href='index.php'>Home</a></li>
				      	<li><a href='gestion.php'>Gestionar Usuarios</a></li>
				        <li><a href='wok.php'>wok</a></li>
				        <li><a href='historial.php'>Historial Pedidos</a></li>
				        <li><a href='cerrar.php'>Cerrar Sesión</a></li>
				     
				      </ul>
				    </div>
				</nav>
			</header>
		<?php }else{ ?>
				<header>
				<nav class='nav-extended  red darken-1'>
				    <div class='nav-wrapper'>
				      <a href='#' class='brand-logo'><img class='logo' src='palillos.png'><span id='logo'>Wok<b>Express</b></span></a>
				      <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
				      <ul class='right hide-on-med-and-down'>
				      	<li><a href='index.php'>Home</a></li>
				      	<li><a href='perfil.php'>Editar perfil</a></li>
				        <li><a href='pedido.php' class='waves-effect waves-light'>Nuevo pedido</a></li>
				        <li><a href='misPedidos.php'>Mis Pedidos</a></li>
				        <li><a href='contacto.php'>Contacto</a></li>
				       	<li><a href='cerrar.php'>Cerrar Sesión</a></li>
				      	
				      </ul>
				      <ul class='side-nav' id='mobile-demo'>
				       <li><a href='index.php'>Home</a></li>
				      	<li><a href='perfil.php'>Editar perfil</a></li>
				        <li><a href='pedido.php' class='waves-effect waves-light'>Nuevo pedido</a></li>
				        <li><a href='misPedidos.php'>Mis Pedidos</a></li>
				        <li><a href='contacto.php'>Contacto</a></li>
				       	<li><a href='cerrar.php'>Cerrar Sesión</a></li>
				      	
				      </ul>
				    </div>
				</nav>
			</header>
	<?php	}
	}
	?>

