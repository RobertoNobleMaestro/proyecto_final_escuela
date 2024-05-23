function validaNombre(){
    let nombre = document.getElementById("nombre").value;
    let error_nombre = document.getElementById("error_nombre");
    if(nombre == null || nombre.length == 0 ||/^\s+$/.test(nombre)){
        error_nombre.innerHTML = "El campo no debe estar vacío";
    } else if(!isNaN(nombre)){
        error_nombre.innerHTML = "El campo no puede ser un número";
    } else if(nombre.length < 3){
        error_nombre.innerHTML = "El campo debe contener más de 3 carácteres";
    } else{
        error_nombre.innerHTML = "";
    }
}

function validaApellidos(){
    let apellidos = document.getElementById("apellidos").value;
    let error_apellidos = document.getElementById("error_apellidos");
    if(apellidos == null || apellidos.length == 0 || /^\s+$/.test(apellidos)){
        error_apellidos.innerHTML = "El campo no debe estar vacío";
    } else if(!isNaN(apellidos)){
        error_apellidos.innerHTML = "El campo no puede ser un número";
    } else if(apellidos.length < 3){
        error_apellidos.innerHTML = "El campo debe contener más de 3 carácteres";
    } else{
        error_apellidos.innerHTML = "";
    }
}

function validaMail(){
    let email = document.getElementById("email").value;
    let error_email = document.getElementById("error_email");
    if(email == null || email.length == 0 || /^\s+$/.test(email)){
        error_email.innerHTML = "El campo no debe estar vacío";
    } else if(!(/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test(email))){
        error_email.innerHTML = "Formato de email incorrecto";
    } else {
        error_email.innerHTML = "";
    }
}

function validaSexo(){
    let indice = document.getElementById("sexo").selectedIndex;
    let error_sexo = document.getElementById("error_sexo");
    if(indice == null || indice == 0 || /^\s+$/.test(indice)){
        error_sexo.innerHTML = "El campo no debe estar vacío";
    } else {
        error_sexo.innerHTML = "";
    }
}

function validaTelf(){
    let telf = document.getElementById("telefono").value;
    let error_telf = document.getElementById("error_telf");
    console.log(telf);
    if(telf == null || telf.length == 0 || /^\s+$/.test(telf)){
        error_telf.innerHTML = "El campo no debe estar vacío";
    } else if(!(/^\d{9}$/.test(telf))){
        error_telf.innerHTML = "Formato de teléfono no válido, el formato que se espera es 900999999";    
    } else{
        error_telf.innerHTML = "";
    }
}

function validaDNI(){
    let dni = document.getElementById("dni").value;
    let error_dni = document.getElementById("error_dni");
    if(dni == null || dni == 0 || /^\s+$/.test(dni)){
        error_dni.innerHTML = "El campo no debe ser nulo";
    } else if (!(/^\d{8}[A-Z]$/i.test(dni))){
        error_dni.innerHTML = "Debe ser un formato de DNI válido";
    } else if(!letraDNIValida(dni)) {
        error_dni.innerHTML = "La letra del DNI es incorrecta";
    } else {
        error_dni.innerHTML = "";
    }
    
    function letraDNIValida(dni){
        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        var numeroDNI = dni.substring(0,8);
        var letraDNI = dni.charAt(8).toUpperCase();
        var letraCalculada = letras[numeroDNI % 23];
        return letraDNI == letraCalculada;
    }
}

function validaDireccion(){
    let direccion = document.getElementById("direccion").value;
    let error_direccion = document.getElementById("error_dir");
    if(direccion == null || direccion == 0 || /^\s+$/.test(direccion)){
        error_direccion.innerHTML = "El campo no debe estar vacío"
    } else {
        error_direccion.innerHTML = "";
    }
}

function validaCurso(){
    let indice = document.getElementById("curso").selectedIndex;
    let error_curso = document.getElementById("error_curso");
    if(indice == null || indice == 0){
        error_curso.innerHTML = "El campo no debe estar vacío" ;
    }  else {
        error_curso.innerHTML = "";
    }
}

function validacontra(){
    let contrato = document.getElementById("contrato").value;
    let error_contrato = document.getElementById("error_contrato");
    if(salario == null || contrato.length == 0 ){
        error_contrato.innerHTML = "El campo no puede estar vacío";
    } else {
        error_contrato.innerHTML = "";
    }
}
function validasalario(){
    let salario = document.getElementById("salario").value;
    let error_salario = document.getElementById("error_salario");
    if(salario == null || salario.length == 0 ){
        error_salario.innerHTML = "El campo no puede estar vacío";
    } else if(isNaN(salario)){
        error_salario.innerHTML = "El campo tiene que ser numerico";
    } else {
        error_salario.innerHTML = "";
    }
}
function validaNombre(){
    let nombre = document.getElementById("nombre").value;
    let error_nombre = document.getElementById("error_nombre");
    if(nombre == null || nombre.length == 0 ||/^\s+$/.test(nombre)){
        error_nombre.innerHTML = "El campo no debe estar vacío";
    } else if(!isNaN(nombre)){
        error_nombre.innerHTML = "El campo no puede ser un número";
    } else if(nombre.length < 3){
        error_nombre.innerHTML = "El campo debe contener más de 3 carácteres";
    } else{
        error_nombre.innerHTML = "";
    }
}

function validaApellidos(){
    let apellidos = document.getElementById("apellidos").value;
    let error_apellidos = document.getElementById("error_apellidos");
    if(apellidos == null || apellidos.length == 0 || /^\s+$/.test(apellidos)){
        error_apellidos.innerHTML = "El campo no debe estar vacío";
    } else if(!isNaN(apellidos)){
        error_apellidos.innerHTML = "El campo no puede ser un número";
    } else if(apellidos.length < 3){
        error_apellidos.innerHTML = "El campo debe contener más de 3 carácteres";
    } else{
        error_apellidos.innerHTML = "";
    }
}

function validaMail(){
    let email = document.getElementById("email").value;
    let error_email = document.getElementById("error_email");
    if(email == null || email.length == 0 || /^\s+$/.test(email)){
        error_email.innerHTML = "El campo no debe estar vacío";
    } else if(!(/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test(email))){
        error_email.innerHTML = "Formato de email incorrecto";
    } else {
        error_email.innerHTML = "";
    }
}

function validaSexo(){
    let indice = document.getElementById("sexo").selectedIndex;
    let error_sexo = document.getElementById("error_sexo");
    if(indice == null || indice == 0 || /^\s+$/.test(indice)){
        error_sexo.innerHTML = "El campo no debe estar vacío";
    } else {
        error_sexo.innerHTML = "";
    }
}

function validaTelf(){
    let telf = document.getElementById("telefono").value;
    let error_telf = document.getElementById("error_telf");
    console.log(telf);
    if(telf == null || telf.length == 0 || /^\s+$/.test(telf)){
        error_telf.innerHTML = "El campo no debe estar vacío";
    } else if(!(/^\d{9}$/.test(telf))){
        error_telf.innerHTML = "El formato que se espera es 900999999";    
    } else{
        error_telf.innerHTML = "";
    }
}

function validaDNI(){
    let dni = document.getElementById("dni").value;
    let error_dni = document.getElementById("error_dni");
    if(dni == null || dni == 0 || /^\s+$/.test(dni)){
        error_dni.innerHTML = "El campo no debe ser nulo";
    } else if (!(/^\d{8}[A-Z]$/i.test(dni))){
        error_dni.innerHTML = "Debe ser un formato de DNI válido";
    } else if(!letraDNIValida(dni)) {
        error_dni.innerHTML = "La letra del DNI es incorrecta";
    } else {
        error_dni.innerHTML = "";
    }
    
    function letraDNIValida(dni){
        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        var numeroDNI = dni.substring(0,8);
        var letraDNI = dni.charAt(8).toUpperCase();
        var letraCalculada = letras[numeroDNI % 23];
        return letraDNI == letraCalculada;
    }
}

function validaDireccion(){
    let direccion = document.getElementById("direccion").value;
    let error_direccion = document.getElementById("error_dir");
    if(direccion == null || direccion == 0 || /^\s+$/.test(direccion)){
        error_direccion.innerHTML = "El campo no debe estar vacío"
    } else {
        error_direccion.innerHTML = "";
    }
}


function validacontra(){
    let contrato = document.getElementById("contrato").value;
    let error_contrato = document.getElementById("error_contrato");
    if(contrato == null || contrato.length == 0 ){
        error_contrato.innerHTML = "El campo no puede estar vacío";
    } else {
        error_contrato.innerHTML = "";
    }
}
function validanacimiento() {
    var nacimiento = document.getElementById("nacimiento").value;
    var error_nacimiento = document.getElementById("error_nacimiento");
    error_nacimiento.innerHTML = "";
    if (!nacimiento) {
        error_nacimiento.innerHTML = "No puede estar vacio el campo";
        return;
    }
    var fecha_nacimientofinal = new Date(nacimiento);
    var hoy = new Date();
    var edad = hoy.getFullYear() - fecha_nacimientofinal.getFullYear();

    if (hoy.getMonth() < fecha_nacimientofinal.getMonth() || (hoy.getMonth() === fecha_nacimientofinal.getMonth() && hoy.getDate() < fecha_nacimientofinal.getDate())) {
        edad--;
    }
    if (edad < 18) {
        error_nacimiento.innerHTML = "Debes ser mayor de 18 años para registrarte";
    } else {
        error_nacimiento.innerHTML = "";
    }
}
