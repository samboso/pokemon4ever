let modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

let modal2 = document.getElementById('id02');

window.onclick = function(event) {
    if (event.target == modal) {
        modal2.style.display = "none";
    }
}

function display_web() {
	document.getElementById("interior").style.transform = "rotateY(180deg)";
	document.getElementById("opening_1").style.visibility = "hidden";
	document.getElementById("login_span").style.visibility = "visible";
	document.getElementById("login_span_2").style.visibility = "visible";
}

function hide_web() {
	document.getElementById("interior").style.transform = "rotateY(0deg)";
	document.getElementById("opening_1").style.visibility = "visible";
	document.getElementById("login_span").style.visibility = "hidden";
	document.getElementById("login_span_2").style.visibility = "hidden";
}

function comprobarSoloLetras(usuario) {
	if (usuario.length > 0) {
		if (isNaN(usuario)) {
			if (/^[A-Za-z áéíóú]*$/.test(usuario)) {
				return usuario;
			} else {
				document.getElementById("user_label").innerHTML = "Usuario con caracteres incorrectos.";
				return "";
			}
			} else {
		document.getElementById("user_label").innerHTML = "Usuario con caracteres incorrectos.";
		return "";
		}
		} else {
			document.getElementById("user_label").innerHTML = "El campo no puede estar vacío.";
			return "";
	}
}

function nothingweird() {
	let usuario_2 = document.getElementById("user").value;
	if (!isNaN(usuario_2.charAt(letra.length - 1)) && !(letra.charAt(usuario_2.length - 1) == " ")) {
		document.getElementById("user_label").innerHTML = "No se permiten caracteres raros";
		document.getElementById("user").value = usuario_2.substring(0, usuario_2.length - 1);
	} else {
		document.getElementById("user_label").innerHTML = "";
	}
}