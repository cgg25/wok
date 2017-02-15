
var formulario=document.forms[0].elements;
var quitarDisabled=document.getElementById("boton");

window.onload=function () {
	formulario[1].onblur=repiteContraseña;
	formulario[2].onblur=repiteContraseña;
	formulario[7].onkeypress=validacion;
	function repiteContraseña(){
		var passwd1=document.getElementById('password').value;
		var passwd2=document.getElementById('password2').value;
		if (passwd1==passwd2 && passwd1.length>0) {
			quitarDisabled.removeAttribute("disabled");
			return true;
		}else{
			quitarDisabled.setAttribute("disabled",false);
			return false;
		}
	}
	function validacion (){
		if (repiteContraseña()==true) {
			
			return true;
		}else{
			return false;
		}
	}

}
