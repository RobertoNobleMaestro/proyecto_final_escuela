function usuari(){
    let user = document.getElementById("usuario").value;
    // Recogida por ID de los valores de los imputs del form usuario y error_usergetElementById("usuario").value;
    let error_user = document.getElementById("error_user");

    if(user == null || user.length == 0 || /^\s+$/.test(user) ){ //Validación para que el campo no sea nulo
        error_user.innerHTML = "El campo no debe estar vacío"; // Mensaje de error si se cumple la condición
    } else if(!isNaN(user)){ //Validación para que el campo no contenga números
        error_user.innerHTML = "El campo no debe contener números";// Mensaje de error si se cumple la condición
    } else{ // Si todo es correcto limpio el mensaje de error
        error_user.innerHTML= "";
    }
} 
    
function validapasswd() {
    let password = document.getElementById("password").value;// Recogemos el campo de la contraseña.
    let error_psswd = document.getElementById("error_psswd"); // Creamos una variable donde guardaremos el mensaje de error por si el campo no cumple los requisitos.
    if(password == null || password.length == 0 || /^\s+$/.test(password)){ // Comprobamos si el campo esta vacio.
        error_psswd.innerHTML = "Este campo no puede estar vacío." // Mostramos por la etiqueta p si el campo no cumple los requisitos.
    } else { // Si no hay ningún error, no se muestra nada.
        error_psswd.innerHTML = "";
    }
}