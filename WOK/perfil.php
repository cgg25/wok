<?php
	
	include_once("menu.php");
	include_once("objUsuario.php");
	session_start();
	if (empty($_SESSION['usuario'])) {
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
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" type="text/css" href="css/footer.css">
      
	
	
</head>
<body>
	<?php
		
		
		if (isset($_POST['modificar'])) {
			$nombre=$_POST['nombre'];
			$email=$_POST['email'];
			$firma=$_POST['firma'];
			if (!empty($_POST['aPasswd'])) {
				$antiguaPasswd=md5($_POST['aPasswd']);
				$nuevaPasswd=$_POST['nPasswd'];
				$repitePasswd=$_POST['rPasswd'];
			}else{
				$antiguaPasswd="";
			}
			
			$conexionBD=new mysqli("localhost","root","","wok");
			$conexionBD->set_charset("utf8");
			if (!$conexionBD) {
				echo "no se puede conectar a la base de datos.";
				exit();
			}

			if (is_uploaded_file ($_FILES['foto']['tmp_name'] )){
				$nombreDirectorio = "img/";
				$nombreFichero = $_FILES['foto']['name'];
				$nombreCompleto = $nombreDirectorio.$nombreFichero;
				if (is_dir($nombreDirectorio)){ // es un directorio existente
					$idUnico = time();
					$nombreFichero = $idUnico."-".$nombreFichero;
					$nombreCompleto = $nombreDirectorio.$nombreFichero;
					move_uploaded_file ($_FILES['foto']['tmp_name'],$nombreCompleto);
					$_SESSION['usuario']->setAvatar($nombreCompleto);
				}
			}
			$modificaImg="UPDATE usuario SET Avatar='".$_SESSION['usuario']->getAvatar()."' WHERE Login='".$_SESSION['usuario']->getNick()."'";
			$conexionBD->query($modificaImg);

			if ($nombre!=$_SESSION['usuario']->getNombre() || $email!=$_SESSION['usuario']->getEmail() || $firma!=$_SESSION['usuario']->getFirma() ) {
				$modifica="UPDATE usuario SET Email='".$email."',Nombre='".$nombre."', Firma='".$firma."',Avatar='".$_SESSION['usuario']->getAvatar()."' WHERE Login='".$_SESSION['usuario']->getNick()."'";
				$conexionBD->query($modifica);
				$_SESSION['usuario']->setNombre($nombre);
				$_SESSION['usuario']->setEmail($email);
				$_SESSION['usuario']->setFirma($firma);
				echo "<script> alert('datos del perfil actualizados.'); </script>";
			}
			if ($antiguaPasswd==$_SESSION['usuario']->getPasswd()) {
				if ($nuevaPasswd==$repitePasswd) {
					$modificaPasswd="UPDATE usuario SET Password='".md5($nuevaPasswd)."' WHERE Login='".$_SESSION['usuario']->getNick()."'";
					$conexionBD->query($modificaPasswd);
					echo "<script> alert('Contraseña actualizada.'); </script>";


				}else{
					echo "<script> alert('escriba correctamente las contraseñas.'); </script>";
				}
			}
			$conexionBD->close();
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
			        <a href="perfil.php" class="breadcrumb">Perfil</a>
			      </div>
			     
			    </div>	
		    </nav>
	 	</div>
	 	 <div class="col s12 right-align">
	      	<?php 
				if (!empty($_SESSION['usuario'])) {
					if ($_SESSION['usuario']->getNick()=="admin") {
	        		echo "<span class='left-align'>Bienvenido <b>ADMINISTRADOR</b>".  	$_SESSION['usuario']->getFecha()."</span>";
	        		echo "<img id='menuLogo' src='admin.jpg'>";
		        	}else {

		        		echo "<span class='left-align'><a href='perfil.php'>".$_SESSION['usuario']->getNick()."</a> <b>(".$_SESSION['usuario']->getNombre().")</b>  -".$_SESSION['usuario']->getFecha()."</span> ";
		        		echo " <img id='menuLogo' src='".$_SESSION['usuario']->getAvatar()."'>";
		        		
		        	}
				}
	      ?>
	      </div>
	 		<hr>
	 	<!--Formulario de entrar-->
	 	<div class="row">
	 		
		    <form class="col s6 push-s3"  action="" method="POST" enctype="multipart/form-data">
		      <div class="row">
		      	<h4>Edite su perfil.</h4>
		      	<p>Usuario: <?php echo "<b>".$_SESSION['usuario']->getNick()."</b>";?></p>
		      	<div class="left-align col s12">
		      		<?php echo "<img id='tamañoImg' src='".$_SESSION['usuario']->getAvatar()."' class='circle'>" ?>
		      		
		      	</div>
		      	<div class="input-field col s12">
		      		<div class="file-field input-field">
				      <div class="btn red darken-1">
				        <span>File</span>
				        <input type="file" name="foto">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				      </div>
				    </div>
		      	</div>
		        <div class="input-field col s12">
		          <i class="material-icons prefix">account_circle</i>
		          <input id="icon_prefix" type="text" class="validate" name="nombre" pattern="^[a-z\d_]{4,15}$" required value='<?php echo $_SESSION['usuario']->getNombre(); ?>' >
		          <label for="icon_prefix">Nombre</label>
		        </div>
		        <div class="input-field col s12">
		       	 <i class="material-icons prefix">email</i>
		          <input id="email" type="email" class="validate" name="email" required pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" value='<?php echo $_SESSION['usuario']->getEmail();?>'>
		          <label for="email">email</label>
		          <span>(Es importante introducir una direccion de correo real, puesto que se utilizará para el envio de sus datos de registro.)</span>
		        </div>
		        <div class="input-field col s12">
		       		<i class="material-icons prefix">mode_edit</i>
		            <input id="text" type="text" class="validate" name="firma" required pattern="^[a-z]{4,15}$" value="<?php echo $_SESSION['usuario']->getFirma();?>">
		            <label for="text">Firma</label>
		            <span>(La firma es su distintivo personal que se mostrará al pie de sus comentarios y mensajes)</span>
		        </div>
		        <div class="col s12"><p><?php echo "Rango: <b>".$_SESSION['usuario']->getKarma()."</b>"; ?></p></div>
		        <div class="col s12"><h4>Modifica tu contraseña</h4></div>
		        <div class="input-field col s12">
		       	 <i class="material-icons prefix">lock</i>
		          <input id="password" type="password" class="validate" name="password"  pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onblur="antiguaPass('password');">
		          <label for="password">Antigua Password</label>
		       	</div>
		       	<div class="input-field col s12">
		       	 <i class="material-icons prefix">lock</i>
		          <input id="password2" type="password" class="validate" name="password"  pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
		          <label for="password2">Nueva Password</label>
		          <span>(Debe contener 1 Mayuscula,1 Minuscula, 1 número y un mínimo de 8 caracteres.)
				  </span>
		        </div>
		        <div class="input-field col s12">
		       	 <i class="material-icons prefix">lock</i>
		          <input id="password3" type="password" class="validate" name="password"  pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
		          <label for="password3">Repite Password</label>
		        </div>
		        <div class="input-field col s12">
		        	<button id="boton" class="btn waves-effect waves-light red darken-1" type="submit" name="modificar" onclick="this.disabled;">Modificar</button>
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
	
 	
 	




	<script type="text/javascript" src="js/perfil.js"></script>
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