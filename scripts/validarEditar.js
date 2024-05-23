
// Validación del nombre 
function validaNombre(){
    // Recogida por ID del nombre y del error
    let nombre = document.getElementById("nombre").value;
    let error_nombre = document.getElementById("error_nombre");
    // Validación para que el campo no sea nulo
    if(nombre == null || nombre.length == 0 ||/^\s+$/.test(nombre)){
        error_nombre.innerHTML = "El campo no debe estar vacío";
    } else if(!isNaN(nombre)){ // Validación para que el campo no sea un número
        error_nombre.innerHTML = "El campo no puede ser un número";
    } else if(nombre.length < 3){ // Validación para que contenga +3 carácteres
        error_nombre.innerHTML = "El campo debe contener más de 3 carácteres";
    } else{ // Si todo es correcto mensaje de error se limpia
        error_nombre.innerHTML = "";
    }
}

// Validación de Apellido
function validaApellidos(){
    // Recogida por ID del apellido y del error
    let apellidos = document.getElementById("apellidos").value;
    let error_apellidos = document.getElementById("error_apellidos");
    // Validación para que no sea el campo nulo
    if(apellidos == null || apellidos.length == 0 || /^\s+$/.test(apellidos)){
        error_apellidos.innerHTML = "El campo no debe estar vacío";
    } else if(!isNaN(apellidos)){ // Validación para que el campo no sea un número
        error_apellidos.innerHTML = "El campo no puede ser un número";
    } else if(apellidos.length < 3){ // Validación para que el campo tenga +3 carácteres
        error_apellidos.innerHTML = "El campo debe contener más de 3 carácteres";
    } else{ // Si todo es correcto mensaje de error se limpia
        error_apellidos.innerHTML = "";
    }
}

// Validación de Email
function validaMail(){
    // Recogida por ID del email y del error
    let email = document.getElementById("email").value;
    let error_email = document.getElementById("error_email");
    // Validación para que el campo no sea nulo
    if(email == null || email.length == 0 || /^\s+$/.test(email)){
        error_email.innerHTML = "El campo no debe estar vacío";
    } else if(!(/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test(email))){ // Validación de un formato de email válido
        error_email.innerHTML = "Formato de email incorrecto";
    } else { // Si todo es correcto mensaje de error se limpia
        error_email.innerHTML = "";
    }
}

// Validación de Sexo (Lista de Opciones)
function validaSexo(){
    // Recogida por ID de los campos del select y del error
    let indice = document.getElementById("sexo").selectedIndex;
    let error_sexo = document.getElementById("error_sexo");
    // Validación para que el índice de la lista no sea 0
    if(indice == null || indice == 0){
        error_sexo.innerHTML = "El índice de la lista no puede estar vacío" ;
    } else if(indice == null || indice == 0 || /^\s+$/.test(indice)){ // Validación para que el campo no esté vacío
        error_sexo.innerHTML = "El campo no puede estar vacío";
    } else { // Si todo es correcto mensaje de error se limpia
        error_sexo.innerHTML = "";
    }
}

// Validación de Teléfono 
function validaTelf(){
    // Recogida por ID del teléfono y del error
    let telf = document.getElementById("telefono").value;
    let error_telf = document.getElementById("error_telf");
    // Validación para que el campo no sea nulo
    console.log(telf);
    if(telf == null || telf.length == 0 || /^\s+$/.test(telf)){
        error_telf.innerHTML = "El campo no debe estar vacío";
        // Validación para que cumpla el formato de teléfono adecuado 
    } else if(!(/^\d{9}$/.test(telf))){ 
        error_telf.innerHTML = "Formato de teléfono no válido, el formato que se espera es 900999999";    
    } else{ // Si todo es correcto mensaje de error se limpia
        error_telf.innerHTML = "";
    }
    
    
}

// Validación de DNI 
function validaDNI(){
    // Se guarda la ID del dni y se guarda.
    let dni = document.getElementById("dni").value;
    let error_dni = document.getElementById("error_dni");

    //Verifica que el campo no este vacio.
    if(dni == null || dni == 0 || /^\s+$/.test(dni)){
        error_dni.innerHTML = "El campo no debe ser nulo";
        //Verifica que el formato de DNI español este correcto.
    } else if (!(/^\d{8}[A-Z]$/i.test(dni))){
        error_dni.innerHTML = "Debe ser un formato de DNI válido";
        //Comprueba que la letra del DNI sea correcta, llevandola a otra función.
    } else if(!letraDNIValida(dni)) {
        error_dni.innerHTML = "La letra del DNI es incorrecta";
    } else { // Si todo esta correcto no se muestra.
        error_dni.innerHTML = "";
    }
    
    function letraDNIValida(dni){
        //Se crea el array de letras para verificar si la letra del DNI es correcta.
        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        // Se extrae los números del DNI.
        var numeroDNI = dni.substring(0,8);
        // Recoge la letra y la pone en mayuscula para comparar con el array.
        var letraDNI = dni.charAt(8).toUpperCase();
        // Se calcula la letra del DNI haciendo el procentaje de los números y se guarda la letra correcta.
        var letraCalculada = letras[numeroDNI % 23];
    
        //Verifica si la letra del DNI es correcta.
        return letraDNI == letraCalculada;
    }
}


// Validación de la Dirección
function validaDireccion(){
    // Recogida por ID del campo direccion y del mensaje de error
    let direccion = document.getElementById("direccion").value;
    let error_direccion = document.getElementById("error_dir");
    // Validación para que el campo no sea nulo
    if(direccion == null || direccion == 0 || /^\s+$/.test(direccion)){
        error_direccion.innerHTML = "El campo no debe estar vacío"
    } else { // Si todo es correcto se limpia el mensaje de error
        error_direccion.innerHTML = "";
    }
}

//Validación de los Cursos  

function validaCurso(){
    let indice = document.getElementById("curso").selectedIndex;
    let error_curso = document.getElementById("error_curso");
    // Validación para que el índice de la lista no sea 0
    if(indice == null || indice == 0){
        error_curso.innerHTML = "El índice de la lista no puede estar vacío" ;
    } else if(indice == null || indice == 0 || /^\s+$/.test(indice)){ // Validación para que el campo no esté vacío
        error_curso.innerHTML = "El campo no puede estar vacío";
    } else { // Si todo es correcto mensaje de error se limpia
        error_curso.innerHTML = "";
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