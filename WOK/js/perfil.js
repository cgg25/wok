function antiguaPass(id) {
	var passAntigua=document.getElementById('password');
	var boton=document.getElementById("boton");
	if (passAntigua!=null) {
		boton.setAttribute("disabled",false);
		return true;
	}else{
		boton.removeAttribute("disabled");
		return false;
	}
}

/*ME FALTA QUE AL QUITAR TEXTO DEL ANTIGUA PASSWORD SE VUELVA A MOSTRAR EL BOTON*/
/*UNA VEZ OCULTO LOS INPUTS PASSWORDS CON UN ONKEYPRESS SE VAYAN COMPARANDO
 Y SI SON IGUALES ENTONCES SE VUELVA A MOSTRAR EL BOTON*/