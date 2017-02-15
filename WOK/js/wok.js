function comprobar(id) {
	var valor=document.getElementById(id).value;
		var nBase=document.getElementById("baseNueva");
		var pBase=document.getElementById("precioNuevo");
		var fBase=document.getElementById("foto");
		console.log(valor);
	if (valor!="") {
		

		nBase.setAttribute("required",true);
		pBase.setAttribute("required",true);
		fBase.setAttribute("required",true);

	}else if (valor=="" || valor==null) {

		

		nBase.removeAttribute("required");
		pBase.removeAttribute("required");
		fBase.removeAttribute("required");
	}
}