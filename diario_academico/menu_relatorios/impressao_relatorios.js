let imprimir = function(){
	let div = document.createElement('div');
	div.classList.add('print_div');
	document.querySelector("#imprimir").style.display = "none";
	div.innerHTML = document.querySelector(".divTabela").innerHTML;
	document.body.appendChild(div);
	print();
	div.remove();
	document.querySelector("#imprimir").style.display = "block";
};

let botoes = document.getElementsByClassName("imprimir"); 

for (botao of botoes) {
	botao.addEventListener('click', imprimir);
}

if(botoes.length == 0) {
	document.getElementById('imprimir').addEventListener('click', imprimir);
}


