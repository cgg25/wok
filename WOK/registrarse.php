<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>WokExpress</title>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
  	<!--Import Google Icon Font-->
  	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" type="text/css" href="css/footer.css">
      
	
	
</head>
<body>
	<?php
		include_once("menu.php");
		//si pulsamos el botón enviar capturaremos los valores del formulario.
		if (isset($_POST['enviar'])) {
			$nick=$_POST['nick'];
			$password=md5($_POST['password']);
			$email=$_POST['email'];
			$nombre=$_POST['nombre'];
			$firma=$_POST['firma'];
				
			$conexionBD=new mysqli("localhost","root","","wok");
			$conexionBD -> set_charset("utf8");
			if (!$conexionBD) {
				echo "no se puede conectar a la Base de datos";
				exit();
			}
			$consulta=$conexionBD->query("SELECT Login FROM usuario WHERE Login='".$nick."'");
			$fila=$consulta-> num_rows;
			if ($fila>0) {
				echo "<script>alert('Usuario existente');</script>";
			}else{
				$inserta="INSERT INTO usuario(Login,Password,Email,Nombre,Firma) VALUES ('$nick','$password','$email','$nombre','$firma')";
				$conexionBD->query($inserta);
				$conexionBD->close();
				header("Location: entrar.php");
			}
		}
		


	?>
	<?php  menu(); ?>
	<main>
		<!--Breadcrumb -migas de pan.-->
	 	<div class="row">
	 		<nav  class="red accent-2">
		 		<div class="nav-wrapper">
			      <div class="col s12">
			        <a href="index.php" class="breadcrumb colorBreadcrumb">Home</a>
			        <a href="registrarse.php" class="breadcrumb">Registro</a>
			      </div>
			    </div>	
		    </nav>
	 	</div>
	 	
	 	<!--Formulario de entrar-->
	 	<div class="row">
	 		
		    <form class="col s6 push-s3"  action="" method="POST">
		      <div class="row">
		      	<h4>¡Registrese! <span>y descubre nuestros deliciosos woks.</span></h4>
		        <div class="input-field col s12">
		          <i class="material-icons prefix">account_circle</i>
		          <input id="icon_prefix" type="text" class="validate" name="nick" pattern="^[a-z\d_]{4,15}$" required>
		          <label for="icon_prefix">Usuario</label>
		        </div>
		       	<div class="input-field col s12">
		       	 <i class="material-icons prefix">lock</i>
		          <input id="password" type="password" class="validate" name="password" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
		          <label for="password">Password</label>
		          <span>(Debe contener 1 Mayuscula,1 Minuscula, 1 número y un mínimo de 8 caracteres.)
				  </span>
		        </div>
		        <div class="input-field col s12">
		       	 <i class="material-icons prefix">lock</i>
		          <input id="password2" type="password" class="validate" name="password" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
		          <label for="password2">Repite Password</label>
		        </div>
		        <!--email-->
		        <div class="input-field col s12">
		       	 <i class="material-icons prefix">email</i>
		          <input id="email" type="email" class="validate" name="email" required pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
		          <label for="email">email</label>
		          <span>(Es importante introducir una direccion de correo real, puesto que se utilizará para el envio de sus datos de registro.)</span>
		        </div>
		        <!--nombre-->
		        <div class="input-field col s12">
		       	 <i class="material-icons prefix">perm_identity</i>
		          <input id="text" type="text" class="validate" name="nombre" required pattern="^[a-z]{2,15}$">
		          <label for="text">Nombre</label>
		        </div>
		        <!---->
		         <div class="input-field col s12">
		       	 <i class="material-icons prefix">mode_edit</i>
		          <input id="text" type="text" class="validate" name="firma" required pattern="^[a-z]{4,15}$">
		          <label for="text">Firma</label>
		          <span>(La firma es su distintivo personal que se mostrará al pie de sus comentarios y mensajes)</span>
		        </div>
		        <div class="input-field col s12">
		        	<p>
				      <input type="checkbox" id="test5" required />
				      <label for="test5">Red</label>
				    </p>
		        </div>
		        <div class="input-field col s12">
		        	<button id="boton" class="btn waves-effect waves-light red darken-1" type="submit" name="enviar" onclick="this.disabled;"  disabled>enviar</button>
		        </div>
	        	
				
		    </form>
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
	
 	
 	




	<script type="text/javascript" src="js/registro.js"></script>
  	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
	<script src="js/materialize.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".button-collapse").sideNav();
			$("#modal").modal();
			
		})
	</script>
	
	
  
</body>
</html>