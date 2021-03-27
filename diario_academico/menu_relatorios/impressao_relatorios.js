document.getElementById("imprimir").addEventListener("click",function(){
    let div = document.createElement('div');
    document.querySelector("#imprimir").display = "none";
    div.classList.add('print_div');
    div.innerHTML = document.querySelector(".divTabela").innerHTML;
    document.body.appendChild(div);
    print();
    div.remove();
    document.querySelector("#imprimir").display = "block";
});