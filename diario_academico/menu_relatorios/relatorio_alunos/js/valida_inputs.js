function validaCpf(){
    if(!document.querySelector("input#cpf").validity.patternMismatch){
        console.log("ok");
    }else{
        console.log("não ok")
    }
}