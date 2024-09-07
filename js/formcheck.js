function cleanInput(value) {
    value = value.trim();   //rimuove gli spazi bianchi
    value = value.replace(/<(?!p|ul|li|\/p|\/ul|\/li)[^>]+>/g, ''); //rimuove tutti i tag html tranne <p>, <ul> e <li>
    value = value.replace(/&/g, '&amp;')
                 .replace(/</g, '&lt;')
                 .replace(/>/g, '&gt;')
                 .replace(/"/g, '&quot;')
                 .replace(/'/g, '&#039;'); //rimuove i caratteri speciali
    return value;
}

function dynamicCheckMessageForm(){
    let inputName = document.getElementById("name");
    inputName.onblur = function (){validateName(this)};
    let inputEmail = document.getElementById("mail");
    inputEmail.onblur = function (){validateEmail(this)};
    let inputMessage = document.getElementById("message");
    inputMessage.onblur = function (){validateMessage(this)};

}

function showError(tag, stringa){
    const padre = tag.parentNode;
    const errore = document.createElement("strong");
    errore.className = "errorSuggestion";
    errore.appendChild(document.createTextNode(stringa));
    padre.appendChild(errore);
}   

function removeChildInput(tag){
    const padre = tag.parentNode;
    if(padre.children.length == 3){
        padre.removeChild(padre.children[2]);
    }
}

function validateName(input){
    removeChildInput(input);
    //cleaninput.value = cleanInput(input.value);
    if(input.value.search(/^[a-zA-Z]+(-[a-zA-Z]+)*$/)!=0){
        showError(input, input.value + " is not a valid name!"); 

        //input.focus(); 
        //input.select(); 
        return false;
    }
    return true;
}

function validateEmail(input){
    removeChildInput(input);
    //input.value = cleanInput(input.value);
    if(input.value.search(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)!=0 ){
        showError(input, input.value + " is not a valid e-mail address!"); 

        //input.focus(); 
        //input.select(); 
        return false;
    }
    return true;
}

function validateMessage(input){
    removeChildInput(input);
    //input.value = cleanInput(input.value);
    
    return true;
}

function validateMessageForm(){
    let inputName = document.getElementById("nome");
    inputName.value = cleanInput(inputName.value);
    let inputEmail = document.getElementById("email");
    inputEmail.value = cleanInput(inputEmail.value);
    let inputMessage = document.getElementById("message");
    inputMessage.value = cleanInput(inputMessage.value);
    return validateName(inputName) && validateEmail(inputEmail) && validateMessage(inputMessage);
}