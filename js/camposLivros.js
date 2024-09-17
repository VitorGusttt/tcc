//script para ver se os campos estao vazios e etc
function verificaCampos(nomeCampo, erroElemento){
    if (nomeCampo.value.trim() === ''){
        erroElemento.textContent = "Por favor, preencha o campo!";
        return false;
    }
    else{
        erroElemento.textContent = "";
        return true;

    };
};

const titulo = document.getElementById('nomeLivro');
const Etitulo= document.getElementById('erroLivro');
const autor = document.getElementById('autorLivro');
const Eautor = document.getElementById('erroAutor');
const editora = document.getElementById('editoraLivro');
const Eeditora = document.getElementById('erroEditora');

titulo.addEventListener('input', function(){
    verificaCampos(titulo, Etitulo);
    }
);
autor.addEventListener('input', function(){
    verificaCampos(autor, Eautor);
    }
);
editora.addEventListener('input', function(){
    verificaCampos(editora, Eeditora);
    }
);

document.getElementById('formCadLivro').addEventListener('submit', function(event) {
    // Verifica cada campo e, se algum estiver vazio, impede o envio do formulário
    let tituloValido = verificaCampos(titulo, Etitulo);
    let autorValido = verificaCampos(autor, Eautor);
    let editoraValido = verificaCampos(editora, Eeditora);

    if (!tituloValido || !autorValido || !editoraValido) {
        event.preventDefault(); 
        alert("Por favor, preencha todos os campos corretamente antes de enviar.");
    }
});