const formulario = document.querySelector(".login-form");

formulario.addEventListener("submit", function(event) {

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    let valido = true;

    // Comprobar si el email está vacío
    if (email === "") {
        alert("El email no puede estar vacío");
        valido = false;

    } else if (!email.includes("@")) {
        alert("El email debe contener @");
        valido = false;
    }

    // Comprobar si la contraseña está vacía
    if (password === "") {
        alert("La contraseña no puede estar vacía");
        valido = false;
    }

    // Si hay algún error, no enviamos el formulario
    if (valido === false) {
        event.preventDefault();
    }

});

