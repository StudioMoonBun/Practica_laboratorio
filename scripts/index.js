/*<---JAVASCRIPT --->*/
const formulario = document.getElementById('formulario');
const nombre = document.getElementById('nombre');
const apellido1 = document.getElementById('apellido1');
const apellido2 = document.getElementById('apellido2');
const correo = document.getElementById('correo');
const usuario = document.getElementById('usuario');
const clave = document.getElementById('clave');

document.getElementById('formulario').addEventListener('submit', function (event) {
    validateInputs();

    if ((nombreValue !== '' && isValidnombre(nombreValue) &&
        apellido1Value !== '' && isValidapellido1(apellido1Value) &&
        apellido2Value !== '' && isValidapellido2(apellido2Value) &&
        correoValue !== '' && isValidcorreo(correoValue) &&
        usuarioValue !== '' && isValidusuario(usuarioValue) &&
        claveValue.length >= 4)
    ) {
        alert ('Se ha registrado con exito')
    }

    event.preventDefault();
});

//*Configuramos las constantes de los mensajes de error y exito para que aparezca el icono al final del campo a rellenar*//
//*<-------ERROR---------->*//
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector(".error"); /*Se usa querySelector para seleccionar un selector de la parte de CSS*/

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

//*<-------CONFIRMACIÓN---------->*//
const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}

//* Expresión regular (REGEX) para letras y espacios, pueden llevar acentos*//
const isValidnombre = nombre => {
    const re = /^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/;
    return re.test(String(nombre).toLowerCase());
}

//*---------------APELLIDO 1------------------------*//
const isValidapellido1 = apellido1 => {
    const re = /^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/;
    return re.test(String(apellido1).toLowerCase());
}

//--------------------*APELLIDO2---------------------*//
const isValidapellido2 = apellido2 => {
    const re = /^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/;
    return re.test(String(apellido2).toLowerCase());
}

//* Expresión regular (REGEX) para mencionar que el campo debe seguir la estructura de un Email*//
const isValidcorreo = correo => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(correo).toLowerCase());
}

//*Expresión regular (REGEX) para validar la estructura del usuario*//
const isValidusuario = usuario => {
    const re = /^[a-zA-Z0-9]+$/;
    return re.test(String(usuario).toLowerCase());
}

//*<------CONSTANTES PARA VALIDAR LOS INPUTS---->*//
function validateInputs() {
    const nombreValue = nombre.value;
    const apellido1Value = apellido1.value;
    const apellido2Value = apellido2.value;
    const correoValue = correo.value;
    const usuarioValue = usuario.value;
    const claveValue = clave.value;

    //*<--------CAMPO NOMBRE---------->*//
    if (nombreValue === '') {
        setError(nombre, 'Inserte un nombre válido');
    } else if (!isValidnombre(nombreValue)) {
        setError(nombre, 'Solo se permiten letras');
    } else {
        setSuccess(nombre);
    }

    //*<--------CAMPO APELLIDO1---------->*//
    if (apellido1Value === '') {
        setError(apellido1, 'Inserte un apellido válido');
    } else if (!isValidapellido1(apellido1Value)) {
        setError(apellido1, 'Solo se permiten letras');
    } else {
        setSuccess(apellido1);
    }

    //*<--------CAMPO APELLIDO2---------->*//
    if (apellido2Value === '') {
        setError(apellido2, 'Inserte un apellido válido');
    } else if (!isValidapellido2(apellido2Value)) {
        setError(apellido2, 'Solo se permiten letras');
    } else {
        setSuccess(apellido2);
    }

    //*<-------CAMPO CORREO ELECTRÓNICO---------->*//
    if (correoValue === '') {
        setError(correo, 'E-mail Requerido');
    } else if (!isValidcorreo(correoValue)) {
        setError(correo, 'Utilize un E-mail válido');
    } else {
        setSuccess(correo);
    }

    //*<--------CAMPO USUARIO---------->*//
    if (usuarioValue === '') {
        setError(usuario, 'Por favor, indique un username');
    } else if (!isValidusuario(usuarioValue)) {
        setError(usuario, 'Solo puede contener letras y números');
    } else {
        setSuccess(usuario);
    }

    //*<-------CAMPO CLAVE---------->*//
    if (claveValue === '') {
        setError(clave, 'Inserte una clave');
    } else if (claveValue.length < 4 || claveValue.length > 8) {
        setError(clave, 'La clave debe tener entre 4 y 8 caracteres');
    } else {
        setSuccess(clave);
    }
}










