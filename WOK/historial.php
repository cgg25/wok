<?php 
	include_once("menu.php");
	session_start();
	
	

	if (!empty($_SESSION['usuario']) && $_SESSION['usuario']->getNick()!="admin") {
		header("Location: index.php");
	}else if (empty($_SESSION['usuario'])) {
		header("Location: entrar.php");
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>WokExpress</title>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
  	<!--Import Google Icon Font-->
  	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" type="text/css" href="css/footer.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">     
	
</head>
<body>
		
		<?php menu();?>

 	<main>
 		<!--Breadcrumb -migas de pan.-->
	 	<div class="row">
	 		<nav  class="red accent-2">
		 		<div class="nav-wrapper">
			      <div class="col s12">
			        <a href="index.php" class="breadcrumb colorBreadcrumb">Home</a>
			        <a href="pedido.php" class="breadcrumb">Pedido</a>
			      </div>
			     
			    </div>	
		    </nav>
	 	</div>
	 
		<div class="col s12 right-align">
	      	<?php 
				if (!empty($_SESSION['usuario'])) {
					if ($_SESSION['usuario']->getNick()=="admin") {
	        		echo "<span class='left-align'>Bienvenido <b>ADMINISTRADOR</b>".  	$_SESSION['usuario']->getFecha()."</span>";
	        		echo "<img id='menuLogo' src='img/admin.jpg'>";		        	}else {

		        		echo "<span class='left-align'><a href='perfil.php'>".$_SESSION['usuario']->getNick()."</a> <b>(".$_SESSION['usuario']->getNombre().")</b>  -".$_SESSION['usuario']->getFecha()."</span> ";
		        		echo " <img id='menuLogo' src='".$_SESSION['usuario']->getAvatar()."'>";
		        		
		        	}
				}
	      ?>
	      </div>
	 		<hr>	 	
		<!--Contenido de la web-->
			
		<div class="row container">
		    <div class="col s12">
		      	<h2 class="header">Historial de pedidos</h2>
		      	<hr>
		    </div>
		   	<div class="col s12">
		   		<table class="highlight">
		   			<thead>
		   				<tr>
		   					<th>ID</th>
		   					<th>Usuario</th>
		   					<th>Base</th>
		   					<th>Pedido</th>
		   					<th>Hora Pedido</th>
		   					<th>Precio</th>
		   					<th>Estado</th>
		   				</tr>
		   			</thead>
		   			<?php
						$conexionBD=mysqli_connect("localhost","root","","wok");
						$conexionBD->set_charset("utf8");
						if (!$conexionBD) {
							echo "No se puede conectar a la base de datos.";
							exit();
						}


						if ($consulta=$conexionBD->query("SELECT * FROM pedidos")) {
							
							while ($filas=$consulta->fetch_array()) {
								$base=$filas[2];
								if ($conBase=$conexionBD->query("SELECT precio,descripcion FROM bases WHERE idBase like '%".$base."%' ")) {
									while ($filBase=$conBase->fetch_array()) {
										$precio=(float) $filBase[0];
										$descripcion=$filBase[1];
									
									}
								}
									$precioTotal=$precio+$filas[3];
								echo "<tr>
										<td>".$filas[0]."</td>
										<td>".$filas[1]."</td>
										<td>".$descripcion."</td>
										<td>".$filas[4]."</td>
										<td>".$filas[5]."</td>
										<td>".$precioTotal."</td>";
								if ($filas[6]==0) {
										echo "<td style='color:red'><b>No Entregado</b></td></tr>";
								}else{
										echo "<td style='color:#333'>Entregado</td></tr>";
								}		



							}
							
						}

		   			?>
		   		</table>
		   	</div>
		</div>      
	</main>	
	<!--footer-->
   <footer class="footer-distributed">
		<div class="footer-left">
			<h3>WOK<span id="logoFooter">Express</span></h3>
				<p class="footer-links">
					<a href="index.php">Home</a>
					·
					<a href="#modal">Haz tu pedido</a>
					·
					<a href="contacto.php">Contacto</a>
				</p>

				<p class="footer-company-name">Company WokExpress &copy; 2017</p>
		</div>
		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>C/de la fábrica, 22</span>  Mallorca, Baleares</p>
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<p>+34-678119613</p>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="mailto:wokexpress@gmail.com">wokexpress@gmail.com</a></p>
			</div>
		</div>
		<div class="footer-right">
			<p class="footer-company-about">
				<span>Acerca de wokExpress</span>
				Registrate y disfruta de nuestros maravillosos wok.
			</p>
			<div class="footer-icons">
				<a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
				<a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
				<a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a>
				<a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
			</div>
		</div>
	</footer>
            






  	 <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript">
      	$(document).ready(function(){
      		
      		$(".button-collapse").sideNav();
      	
      		$('.collapsible').collapsible();
    	});
      </script>
	<!-- Compiled and minified JavaScript -->
	<script src="js/materialize.min.js"></script>
</body>
</html>