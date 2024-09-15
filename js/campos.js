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

const nome = document.getElementById('nomeUsuario');
const Enome = document.getElementById('erroNome');
const cpf = document.getElementById('cpfUsuario');
const Ecpf = document.getElementById('erroCpf');
const senha = document.getElementById('senhaUsuario');
const Esenha = document.getElementById('erroSenha');

nome.addEventListener('input', function(){
    verificaCampos(nome, Enome);
    }
);
cpf.addEventListener('input', function(){
    verificaCampos(cpf, Ecpf);
    }
);
senha.addEventListener('input', function(){
    verificaCampos(senha, Esenha);
    }
);

document.getElementById('formCad').addEventListener('submit', function(event) {
    // Verifica cada campo e, se algum estiver vazio, impede o envio do formulário
    let nomeValido = verificaCampos(nome, Enome);
    let cpfValido = verificaCampos(cpf, Ecpf);
    let senhaValido = verificaCampos(senha, Esenha);

    if (!nomeValido || !cpfValido || !senhaValido) {
        event.preventDefault(); 
        alert("Por favor, preencha todos os campos corretamente antes de enviar.");
    }
});