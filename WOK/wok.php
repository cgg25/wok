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
	<?php

		if (isset($_POST['enviar'])) {
			
			$nombreBase=$_POST['nuevaBase'];
			$precioBase=$_POST['precioNuevo'];
			$conexionBD=new mysqli("localhost","root","","wok");
			$conexionBD->set_charset("utf8");
			if (!$conexionBD) {
				echo "no se puede conectar a la base de datos.";
				exit();
			}
	    	if($consulta=$conexionBD->query("SELECT idBase FROM bases")){
	    	
			 	while ($filas=$consulta->fetch_array()) {

			 		$id=$filas[0];
			 	}
			}

			if (is_uploaded_file ($_FILES['imgBase']['tmp_name'] )){
				$nombreDirectorio = "img/";
				$_FILES['imgBase']['name']=$id+1;
				$nombreCompleto=$nombreDirectorio.$_FILES['imgBase']['name'];
				if (is_dir($nombreDirectorio)){ // es un directorio existente
					
					move_uploaded_file ($_FILES['imgBase']['tmp_name'],$nombreCompleto);
					
				}
			}
			
			if ($nombreBase!=null && $precioBase!=null) {
				$inserta=$conexionBD->query("INSERT INTO bases (descripcion) VALUES ('".$nombreBase."'");
				echo "<script>alert('has insertado.');</script>";
			//	header("Location: wok.php");
			}else{
				echo "<script>alert('NOOOO has insertado.');</script>";
			}

		}













	 menu();?>

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
		      	<h2 class="header">Modificar productos</h2>
		      	<hr>
		    </div>

		    <form class="col s12"  action="" method="POST" enctype="multipart/form-data">
			   	<div class="col s12">
			   		<h4>Bases</h4>
			   		<div class="input-field col s10">
			      		<div class="file-field input-field">
					      <div class="btn red darken-1">
					        <span>Imagen</span>
					        <input id="foto" type="file" name="imgBase" onblur="comprobar('foto');">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>

					    </div>
			      	</div>
			   		 <div class="input-field col s3">
			          	<input id="baseNueva" type="text" class="validate" name="nuevaBase"  onblur="comprobar('baseNueva');">
			          	<label for="baseNueva">nueva base</label>
			        </div>
			        <div class="input-field col s3">
			          	<input id="precioNuevo" type="text" class="validate" name="precioNuevo"  onblur="comprobar('precioNuevo');">
			          	<label for="precioNuevo">nuevo precio</label>
			        </div>
			       
			      	<div class="input-field col s6">
		        		<button id="boton" class="btn waves-effect waves-light red darken-1" type="submit" name="enviar" onclick="this.disabled;">Añadir</button>
		        		<button id="botonreset" class="btn waves-effect waves-light red darken-1" type="reset" name="reset" onclick="this.disabled;">Cancelar</button>
		        	</div>
		        	
		        	<div class="col s12"></div>
		        	<?php 
			   			$conexionBD=new mysqli("localhost","root","","wok");
				    	$conexionBD->set_charset("utf8");
						if (!$conexionBD) {
							echo "no se puede conectar a la base de datos.";
							exit();
						}
					
				    	if($consulta=$conexionBD->query("SELECT * FROM bases")){
				    		
				    		while ($filas=$consulta->fetch_array()) {

				    			echo "<div class='input-field col s5'>";
				    			echo "<input id='".$filas[1]."' type='text' class='validate' name='".$filas[1]."' value='".$filas[1]."'></div>";
				    			echo "<div class='input-field col s5'>";
				    			echo "<input id='".$filas[2]."' type='text' class='validate' name='precio' value='".$filas[2]."'></div>";
				    			
				    		
				    	
				    		}
				    	}
			   		?>
			   		
				</div>

			   	<div class="col s12">
			   		<h4>Ingredientes</h4>
			   		 <div class="input-field col s4">
			          	<input id="ingNuevo" type="text" class="validate" name="nuevoIngrediente">
			          	<label for="ingNuevo">nuevo Ingrediente</label>
			        </div>
			        <div class="input-field col s4">
			          	<input id="descripcion" type="text" class="validate" name="descripcion">
			          	<label for="descripcion">Descripcion</label>
			        </div>
			        	<div class="input-field col s4">
		        		<button id="boton" class="btn waves-effect waves-light red darken-1" type="submit" name="enviar" onclick="this.disabled;">Añadir</button>
		        	</div>
		        	<?php

		        		if($consulta=$conexionBD->query("SELECT * FROM ingredientes")){
				    		
				    		while ($filas=$consulta->fetch_array()) {

				    			echo "<div class='input-field col s6'>";
				    			echo "<input id='".$filas[0]."' type='text' class='validate' name='base' value='".$filas[0]."'></div>";
				    			echo "<div class='input-field col s6'>";
				    			echo "<input id='".$filas[1]."' type='text' class='validate' name='precio' value='".$filas[1]."'></div>";
				    			echo "<div class='col s12'></div>";
				    		
				    	
				    		}
				    	}

				    	$conexionBD->close();

		        	?>
		        	<div class="input-field col s4">
		        		<button id="boton" class="btn waves-effect waves-light red darken-1" type="submit" name="modificar" onclick="this.disabled;">Modificar</button>
		        	</div>
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
            





	<script type="text/javascript" src="js/wok.js"></script>
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