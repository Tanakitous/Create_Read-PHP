
let msgerror = document.getElementById("msgerror");

Email.addEventListener("change", async (e) => {
    let email = document.getElementById("Email").value;
    e.preventDefault();
    msgerror.innerHTML = "";
    console.log(email);
    if((email.lastIndexOf("@") == -1)){
        console.log("Erro");
        msgerror.innerHTML = "Mensagem*" + "<br />" + "Email não validado";
    };
});

Nome.addEventListener("change", async (e) => {
    let nome = document.getElementById("Nome").value;
    e.preventDefault();
    msgerror.innerHTML = "";
    console.log(nome);
    if(nome.lastIndexOf("1") != -1 || nome.lastIndexOf("2") != -1 ||nome.lastIndexOf("3") != -1 ||nome.lastIndexOf("4") != -1 ||
    nome.lastIndexOf("5") != -1 || nome.lastIndexOf("6") != -1 || nome.lastIndexOf("7") != -1 || nome.lastIndexOf("8") != -1 || nome.lastIndexOf("9") != -1){
        console.log("Erro");
        msgerror.innerHTML = "Mensagem*" + "<br />" + "Nome não validado";
    };
});

Matricula.addEventListener("change", async (e) => {
    let matricula = document.getElementById("Matricula").value;
    msgerror.innerHTML = "";
    console.log(matricula);
    for(let x=0 ; x <= matricula.length; x++){
        console.log(matricula.charCodeAt(x));
        if(matricula.charCodeAt(x) < 48 || matricula.charCodeAt(x) > 57){
         console.log("Erro");
        msgerror.innerHTML = "Mensagem*" + "<br />" + "Matrícula não validada";
            break;
        }
    }
});