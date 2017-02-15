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
		/*ME FALTA PONER EL CAPTCHA Y LA VARIABLE CONTADOR Y EL INPUT CAPCHA*/
		include_once("objUsuario.php");
		include_once("menu.php");
		if (isset($_POST['entrar'])) {
			session_start();
			$usuario=$_POST['nick'];
			$password=$_POST['password'];
			$fecha=date('d/m/Y H:i:s');
			
			$conexionBD=mysqli_connect("localhost","root","","wok");
			if (!$conexionBD) {
				echo "No se puede conectar a la base de datos.";
				exit();
			}


			if ($consulta=$conexionBD->query("SELECT * FROM usuario WHERE Login like '%".$usuario."%'")) {
				$_SESSION['usuario']=new Login;
				while ($filas=$consulta->fetch_array()) {
					$_SESSION['usuario']->setNick($filas[0]);
					$_SESSION['usuario']->setPasswd($filas[1]);
					$_SESSION['usuario']->setEmail($filas[2]);
					$_SESSION['usuario']->setNombre($filas[3]);
					$_SESSION['usuario']->setFirma($filas[4]);
					$_SESSION['usuario']->setAvatar($filas[5]);
					$_SESSION['usuario']->setKarma($filas[6]);
				}
				$_SESSION['usuario']->setFecha($fecha);
			}
			$conexionBD->close();

			if ($usuario==$_SESSION['usuario']->getNick() && md5($password)==$_SESSION['usuario']->getPasswd()) {
				header("Location: index.php");
			}else if ($usuario==$_SESSION['usuario']->getNick() && $password==$_SESSION['usuario']->getPasswd()) {
				header("Location: index.php");
			}else{
				echo "<script> alert('El usuario o contraseña no existe.Intentelo de nuevo.');</script>";
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
			        <a href="entrar.php" class="breadcrumb">Entrar</a>
			      </div>
			    </div>	
		    </nav>
	 	</div>
	 	
	 	<!--Formulario de entrar-->
	 	<div class="row">
	 		
		    <form class="col s6 push-s3"  action="" method="POST">
		      <div class="row">
		      	<h4>Logueate</h4>
		        <div class="input-field col s12">
		          <i class="material-icons prefix">account_circle</i>
		          <input id="icon_prefix" type="text" class="validate" name="nick">
		          <label for="icon_prefix">Usuario</label>
		        </div>
		       	<div class="input-field col s12">
		       	 <i class="material-icons prefix">lock</i>
		          <input id="password" type="password" class="validate" name="password">
		          <label for="password">Password</label>
		        </div>
	        	<button class="btn waves-effect waves-light red darken-1" type="submit" name="entrar" onclick="this.disabled;">Entrar</button>
				
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
					<a href="#">Haz tu pedido</a>
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