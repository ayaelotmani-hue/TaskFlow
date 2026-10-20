const email = document.getElementById("email");
const password = document.getElementById("password");
const error= document.getElementById("error");
const form = document.getElementById("form"); 

form.addEventListener('submit', function(e){
    let messages=[]
    if(password.value.length<6){ 
        messages.push('La contraseña debe tener más de 6 caracteres')
    }
    if(password.value.length >= 20) {
        messages.push('La contraseña debe tener menos de 20 caracteres.');
    }
    if(messages.length>0){
      e.preventDefault();
      error.innerText=messages.join('\n')
    }
});

