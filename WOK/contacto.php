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
			include_once("menu.php");
			session_start();
			
		?>
		<?php menu();?>

	<main>
		<!--Breadcrumb -migas de pan.-->
	 	<div class="row">
	 		<nav  class="red accent-2">
		 		<div class="nav-wrapper">
			      <div class="col s12">
			        <a href="index.php" class="breadcrumb colorBreadcrumb">Home</a>
			        <a href="contacto.php" class="breadcrumb">Contacto</a>
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
	 	<!--Tiene que ir google map-->
	 	<div  class="row">
	 		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1087.321055882015!2d2.6374793784550654!3d39.5729459108719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc71a08d8a13d1b18!2sWok+i+mes!5e0!3m2!1ses!2ses!4v1486395000546" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
	 	</div>
	 	<!--Formulario de contacto-->
	 	<div class="row">
	 		
		    <form class="col s6 push-s3" >
		      <div class="row">
		      	<h4>Cuéntenos lo que quieras. Nos interesa su opinión.</h4>
		        <div class="input-field col s6">
		          <i class="material-icons prefix">account_circle</i>
		          <input id="icon_prefix" type="text" class="validate">
		          <label for="icon_prefix">First Name</label>
		        </div>
		        <div class="input-field col s6">
		          <i class="material-icons prefix">phone</i>
		          <input id="icon_telephone" type="tel" class="validate">
		          <label for="icon_telephone">Telephone</label>
		        </div>
		        <div class="input-field col s12">
		        	<i class="material-icons prefix">email</i>
		        	<input type="email" name="email" id="icon_email" class="validate">
		        	<label for="icon_email">Email</label>
		        </div>
		        <div class="col s12"><p class="flow-text center-align">Puedes contactar con nosotros. No te lo pienses. ¡Nos encanta hablar contigo!</p></div>
		       	<div class="input-field col s12">
		          <textarea id="textarea1" class="materialize-textarea "></textarea>
		          <label for="textarea1">Textarea</label>
	        	</div>
	        	
	        	<button class="btn waves-effect waves-light red darken-1" type="submit" name="action" onclick="this.disabled;">Enviar
				    <i class="material-icons right">send</i>
				</button>
				
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