<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>WokExpress</title>
    
	
  	<!--Import Google Icon Font-->
  	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" type="text/css" href="css/footer.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">     
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
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
	 	<!--slider-->
 		<div class="row">
			<div class="col s12">
				<div class="slider">
					<ul class="slides">
						<li><img src="img/slider1.jpg" alt=""></li>
						<li><img src="img/slider2.jpg" alt=""></li>
						<li><img src="img/slider3.jpg" alt=""></li>
						<li><img src="img/slider4.jpg" alt=""></li>
					</ul>
				</div>
			</div>
		</div>
		
		<!--Contenido de la web-->
		
		   
		
		    <div class="row container">
		      <div class="col s12">
		      	<h2 class="header">WokExpress</h2>
		      	<hr>
		      </div>
		      <div class="col s5 push-l1">
		      	<p class="grey-text text-darken-3 lighten-3">Los restaurantes WokExpress son espacios jóvenes, elegantes, modernos e informales, pensados para disfrutar de los sabores orientales. Uno de sus atractivos es la cocina a la vista, con una gran cristalera por la que los clientes ven en directo cómo se prepara su comida en los típicos woks. Cuentan también con servicio take-away.</p>
		      </div>
		      <div class="col s6 push-l1">
		      	<img id="imgRedondeado" src="img/imagen1.jpg" class="responsive-img">
		      </div>
		      
		      
		      <div class="col s12">
		      	<h2>Carta</h2>
		      	<hr>
		      </div>
		      <div class="col s12">
		      	<ul id="tabs-swipe-demo" class="tabs">
				    <li class="tab col s6"><a class="active" href="#test-swipe-1">Bases</a></li>
				    <li class="tab col s6"><a  href="#test-swipe-2">Ingredientes</a></li>
				   
				</ul>
		      </div>
			  <div id="test-swipe-1" class="col s12">
			  	<div class="col s6 m4 ">
			      	<div class="card">
						<!-- Card Content -->
						<div class="card-image">
				          <img src="img/1.jpg" >
				        </div>
						<span class="card-title colorCard">Base de Noodles</span>
				        
				  	</div>
			  	</div>
			  	<div class="col s6 m4 ">
			      	<div class="card">
						<!-- Card Content -->
						<div class="card-image">
				          <img src="img/2.jpg" >
				        </div>
				        <span class="card-title colorCard">Base de arroz</span>
				       
				  	</div>
			  	</div>
			  	<div class="col s6 m4 ">
			      	<div class="card">
						<!-- Card Content -->
						<div class="card-image">
				          <img src="img/3.jpg" >
				       	</div>
						<span class="card-title colorCard">Base de verduras</span>
				        
				  	</div>
			  	</div>
			</div> 
			  <div id="test-swipe-2" class="col s12">
			  	<div class="col s6 m4 ">
			      	<div class="card">
						<!-- Card Content -->
						<div class="card-image">
				          <img src="img/especialidadeswok/cantones.jpg" >
				        </div>
				        <span class="card-title colorCard">CANTONES</span>
				        <div class="card-content">
				          <p>Pato crujiente y acaompañado de una suave salsa de ciruela y nuestro arroz al wok.</p>
				        </div>
				  	</div>
			  	</div>
			  	<div class="col s6 m4 ">
			      	<div class="card">
						<!-- Card Content -->
						<div class="card-image">
				          <img src="img/especialidadeswok/choiSum.jpg" >
				        </div>
				        <span class="card-title colorCard">CHOI SUM</span>
				        <div class="card-content">
				          <p>Finas tiras de ternera salteadas con setas chinas, verduras frescas y suave salsa de ostras con nuestro arroz al wok.</p>
				        </div>
				  	</div>
			  	</div>
			  	<div class="col s6 m4 ">
			      	<div class="card">
						<!-- Card Content -->
						<div class="card-image">
				          <img src="img/especialidadeswok/polloconcitricos.jpg" >
				        </div>
				        <span class="card-title colorCard">POLLO CON CITRICOS</span>
				        <div class="card-content">
				          <p>Servido con salsa al limon y acompañado de arroz al wok.</p>
				        </div>
				  	</div>
			  	</div>
			  	<div class="col s12"></div>
			  	<div class="col s6 m4 ">
			      	<div class="card">
						<!-- Card Content -->
						<div class="card-image">
				          <img src="img/especialidadeswok/sekong.jpg" >
				        </div>
				        <span class="card-title colorCard">SEKONG</span>
				        <div class="card-content">
				          <p>Pato crujiente salteado con verduras,pimiento, calabacin,zanahoria y pak choi.</p>
				        </div>
				  	</div>
			  	</div>
			  	<div class="col s6 m4 ">
			      	<div class="card">
						<!-- Card Content -->
						<div class="card-image">
				          <img src="img/especialidadeswok/shenchou.jpg" >
				        </div>
				        <span class="card-title colorCard">SHENCHOU</span>
				        <div class="card-content">
				          <p>Salteado de verduras brocoli,setas tomates,pimientos y tofu acompañado con arroz rojo integra.</p>
				        </div>
				  	</div>
			  	</div>
			  	<div class="col s6 m4 ">
			      	<div class="card">
						<!-- Card Content -->
						<div class="card-image">
				          <img src="img/especialidadeswok/yonSen.jpg" >
				        </div>
				        <span class="card-title colorCard">YON SEN</span>
				        <div class="card-content">
				          <p>Salteado al wok con langostinos, verduras frescas, cacahuetes y nuestra salsa especial salsa sambal.</p>
				        </div>
				  	</div>
			  	</div>
			  </div>
			  <div class="col s12">
			  	<h2>Funcionamiento</h2>
			  	<hr>
			  </div>
			  <div class="col s12">
			  	<div class="col s3">
			  		<img id="pasos" src="img/paso1.png" class="responsive-img"><br>
			  		<span>Elige una base</span>
			  	</div>

			  	<div class="col s3">
			  		<img id="pasos" src="img/paso3.png" class="responsive-img"><br>
			  		<span>Elige los ingredientes</span>
			  	</div>
			  	<div class="col s3">
			  		<img id="pasos" src="img/paso2.png" class="responsive-img"><br>
			  		<span>Realizar el pedido</span>
			  	</div>
			  	<div class="col s3">
			  		<img id="pasos" src="img/paso4.png" class="responsive-img"><br>
			  		<span>estado del pedido</span>
			  	</div>
			  </div>






			  
				
		      <div class="col s12">
		      	<h2>A domincilio</h2>
		      	<hr>
		      </div>
		      <div class="col s12">
		      	<p>Te ofrecemos tu comida favorita de WokExpress ,donde tú quieras.  Busca tu restaurante favorito y ¡pide tu comida para llevar!
				</p>
				 <a href="#modal" class="waves-effect waves-light btn red darker-1">¡Haz tu pedido!</a>
		      </div>
		    </div>
		

		<div class="parallax-container">
		  	<div class="parallax-container">
		    	<div class="parallax"><img src="img/portada.jpg"></div>
			</div>
			<div class="row">
				<div class="col s12">
					<h2>Nuestros wok</h2>
				</div>
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
      		$('.slider').slider({indicators:false,interval:3000});
      		$(".button-collapse").sideNav();
      		$("#modal").modal();
      		$('.parallax').parallax();
      		$('.collapsible').collapsible();
    	});
      </script>
	<!-- Compiled and minified JavaScript -->
	<script src="js/materialize.min.js"></script>
</body>
</html>