function usuari(){
    // Recogida por ID de los valores de los imputs del form usuario y error_user
    let user = document.getElementById("usuario");
    let error_user = document.getElementById("error_user");

    if(user.value == null || user.value.length == 0 || /^\s+$/.test(user.value) ){ //Validación para que el campo no sea nulo
        user.classList.add('is-invalid');
        error_user.innerHTML = "El campo no debe estar vacío"; // Mensaje de error si se cumple la condición
    } else if(!isNaN(user.value)){ //Validación para que el campo no contenga números
        user.classList.add('is-invalid');
        error_user.innerHTML = "El campo no debe contener números";// Mensaje de error si se cumple la condición
    } else{ // Si todo es correcto limpio el mensaje de error
        user.classList.remove('is-invalid');
        error_user.innerHTML= "";
    }

    // nombre.classList.add('is-invalid') // Lo añade a la clase
    // error_user.classList.remove('is-invalid')

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