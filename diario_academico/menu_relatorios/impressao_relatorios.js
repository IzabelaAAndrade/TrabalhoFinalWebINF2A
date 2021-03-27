function preparaImpressaoPdf(){
    document.getElementById("imprimir").addEventListener("click",function(){
        let div = document.createElement('div');
        div.classList.add('print_div');
        div.innerHTML = document.querySelector(".divTabela").innerHTML;
        document.body.appendChild(div);
        document.querySelector("#imprimir").display = "none";
        print();
        div.remove();
        document.querySelector("#imprimir").display = "block";
    });
}