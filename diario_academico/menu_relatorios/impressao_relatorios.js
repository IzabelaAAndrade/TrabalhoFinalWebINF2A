document.getElementById("imprimir").addEventListener("click",function(){
    let div = document.createElement('div');
    div.classList.add('print_div');
    document.querySelector("#imprimir").style.display = "none";
    div.innerHTML = document.querySelector(".divTabela").innerHTML;
    document.body.appendChild(div);
    print();
    div.remove();
    document.querySelector("#imprimir").style.display = "block";
});