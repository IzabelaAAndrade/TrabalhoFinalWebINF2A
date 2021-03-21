const actionInput = document.querySelector('.caixa-selecao');
const actionDivs = document.querySelectorAll('.action-div');
const backBtns = document.querySelectorAll('.back-btn');
const deleteBtns = document.querySelectorAll('.delete-btn');

const operation = {
    list() {
        location.reload();
    },

    inserir() {
        // Show Form
        const formDiv = document.getElementById('insert-container');
        for(let actionDiv of actionDivs) {
            actionDiv.classList.add('hidden');
        }
        formDiv.classList.remove('hidden');

        // Form handler
        const submitBtn = document.getElementById('submit-criar');

        function requestInsert() {
            // Coloca todos os dados dos inputs em um objeto
            const inputs = document.querySelectorAll('.etapas-data');
            let data = {};
            for(let input of inputs) {
                if(input.value == '') return;
                data[input.name] = input.value;
            }

            // Ajax
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(this.status == 200 && this.readyState == 4) {
                    location.reload();
                }
            }
            xhr.open('POST', 'php/criar_etapa.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('data=' + (JSON.stringify(data)));
        }

        submitBtn.addEventListener('click', requestInsert);
        formDiv.addEventListener('keyup', function(e) {
            if(e.key == 'Enter') requestInsert();
        });
    },

    alterar() {
        if(deleteBtns.length == 0) return;
        const editDiv = document.getElementById('edit-container');
        for(let actionDiv of actionDivs) {
                actionDiv.classList.add('hidden');
        }
        editDiv.classList.remove('hidden');

        // Form Handler
        const submitBtn = document.getElementById('submit-edit');

        function requestInsert() {
            // Coloca todos os dados dos inputs em um objeto
            const inputs = document.querySelectorAll('.edit-data');
            let data = {};
            for(let input of inputs) {
                if(input.value == '') return;
                data[input.name] = input.value;
            }

            // Ajax
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(this.status == 200 && this.readyState == 4) {
                    location.reload();
                }
            }
            xhr.open('POST', 'php/update_etapa.php?embed-form=true', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('data=' + (JSON.stringify(data)));
        }

        submitBtn.addEventListener('click', requestInsert);
        editDiv.addEventListener('keyup', function(e) {
            if(e.key == 'Enter') requestInsert();
        });
    },

    excluir() {
        if(deleteBtns.length == 0) return;
        const deleteDiv = document.getElementById('delete-container');
        for(let actionDiv of actionDivs) {
            actionDiv.classList.add('hidden');
        }
        deleteDiv.classList.remove('hidden');

        // Chama requestDelete
        function callDelete() {
            const id = document.getElementById('delete-id').value;
            return id == '' ? null : requestDelete(id);
        }

        // Form Handler
        const submitBtn = document.getElementById('submit-delete');

        submitBtn.addEventListener('click', callDelete);
        deleteDiv.addEventListener('keyup', function(e) {
            if(e.key == 'Enter') callDelete();
        });
    }
}

// Se não houver Etapas cadastradas, será mostrado o formulário para criar uma nova
if(deleteBtns.length == 0) {
    actionInput.selectedIndex = 1;
    operation['inserir']();
}

// Functions

function requestDelete(id) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
            location.reload();
        }
    }
    xhr.open('POST', 'php/delete_etapa.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('id=' + id);
}

// Event listeners

// Delete icons
for(let btn of deleteBtns) {
    btn.addEventListener('click', function(e) {
        requestDelete((e.target).parentElement.dataset.id);
    });
}

// Back buttons
for(let btn of backBtns) {
    btn.addEventListener('click', function() {
        for(let actionDiv of actionDivs) {
            actionDiv.classList.add('hidden');
        }
    });
}

// Setup das operações
function setupOperation() {
    const selectedOperation = actionInput.value;
    const setupFunction = operation[selectedOperation];
    setupFunction();
}

actionInput.addEventListener('change', setupOperation);
