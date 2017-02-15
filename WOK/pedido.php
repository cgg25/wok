<?php
	include_once("menu.php");
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
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" type="text/css" href="css/footer.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">     
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

</head>
<body>
		<?php 

			
			if (isset($_POST['pedido'])) {
				$conexionBD=new mysqli("localhost","root","","wok");
		    	$conexionBD->set_charset("utf8");
				if (!$conexionBD) {
					echo "no se puede conectar a la base de datos.";
					exit();
				}

				echo "<script>alert('Su pedido se ha realizado correctamente.'); </script>";
				$fechaPedido=date('d/m/Y \a \l\a\s H:i:s');
				//si no esta vacío entrará
				if (!empty($_POST['boxIng'])) {
					//inicializamos la variable que contendrá todas los ingredientes.
					$arrayIngredientes="";
					//el número de ingredientes que hemos seleccionado.
					$cantidad=count($_POST['boxIng']);
					//variable contador que usaremos para comparar.
					$current=0;
					//recorreremos el array que contiene los ingredientes seleccionados.
					foreach ($_POST['boxIng'] as $key => $value) {
						//si variable contador es diferente al total de ingredientes seleccionado entonces lo añadira a la variable $arrayIngredientes y lo separará con una coma, sino , por un punto.
						if ($current != $cantidad-1) {
						    $arrayIngredientes.=$value.", ";
						}else{
							$arrayIngredientes.=$value.". ";
						}
						$current++;
					}
				}
				$base=$_POST['base'];
				
				if ($conBase=$conexionBD->query("SELECT idBase FROM bases WHERE descripcion like '%".$base."%' ")) {
					while ($filas=$conBase->fetch_array()) {
						$idBase=$filas[0];

					}

				}
				
				
			
				$usuario=$_SESSION['usuario']->getNick();
				

				$pedido="INSERT INTO pedidos(login,idBase,numIng,ingredientes,fechayhora) VALUES ('$usuario','$idBase','$cantidad','$arrayIngredientes','$fechaPedido')";
				$conexionBD->query($pedido);

				

				
				$conexionBD->close();
				header("Location: misPedidos.php");
			}
		?>
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
	        		echo "<img id='menuLogo' src='img/admin.jpg'>";
		        	}else {

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
		      	<h2 class="header">Configura tu pedido</h2>
		      	<hr>
		    </div>
		    <form action="" method="POST">
			    <div class="col s12">
			      	<h4>1.-Elige una base</h4>
			    </div>
			    <?php 
			    	$conexionBD=new mysqli("localhost","root","","wok");
			    	$conexionBD->set_charset("utf8");
					if (!$conexionBD) {
						echo "no se puede conectar a la base de datos.";
						exit();
					}
			    	if($consulta=$conexionBD->query("SELECT * FROM bases")){
			    		
			    		while ($filas=$consulta->fetch_array()) {

			    			echo "<div class='col s4'>";
			    			echo "<img src='img/".$filas[0].".jpg' class='responsive-img'>";
			    			echo "<p><b>precio: </b>".$filas[2]."</p>";
			    			echo "<input type='radio' id='".$filas[1]."' name='base' value='".$filas[1]."' required/><label for='".$filas[1]."'>".$filas[1]."</label>";
			    			echo "</div>";
			    			
			    	
			    		}
			    	}
			    ?>
			     <div class="col s12">
			      	<h4>2.-Elige Los Ingredientes</h4>
			    </div>
			   <?php
			   		
			   		if ($consuIngredientes=$conexionBD->query("SELECT * FROM ingredientes")) {

			   			while ($filasIng=$consuIngredientes->fetch_array()) {
			   				echo "<div class='col s6'>";
			   				echo "<input type='checkbox' name='boxIng[]' value='".$filasIng[0]."' id='".$filasIng[0]."' onclick='añade(this);'><label for='".$filasIng[0]."'>".$filasIng[0]." ".$filasIng[1]."</label><br>";
			   				echo "</div>";
			   			}
			   		}
			   		$conexionBD->close();


			   ?>

			  
			    <div class="col s12">
			    	<button class="btn waves-effect waves-light red darken-1" type="submit" name="pedido">Realizar Pedido</button>
        
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