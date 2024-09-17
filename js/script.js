//seleciona todos os nomes de livros
let nomeLivros = document.querySelectorAll('.nomeLivro');
//seleciona suas imagnes para serem trocadas futuramente
let img = document.querySelectorAll('.capaLivro');
//define as variaveis
let palavraBusca ;
let apiUrl;
//define a chave da api
const apiKey = 'AIzaSyCOzoYUgiMC6CLqYOSHyBfw-oy6X_MGnxU';

//para cada livro, pegue seu nome e seu indice
nomeLivros.forEach(function(nome, indice){
    //pega a string 
    palavraBusca = nome.innerHTML;
    //joga o nome do livro na busca da api
    apiUrl = `https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(palavraBusca)}&key=${apiKey}`;

    //faz o fetch
    fetch(apiUrl)
        //se tiver resposta
        .then(resposta => {
            //se a resposta for diferente de ok, manda um erro
            if (!resposta.ok) {
            throw new Error(`Erro na solicitação: ${resposta.status}`);
            }
            return resposta.json();
        })
        //se a resposta for ok
        .then(dados => {
            // Aqui, você pode trabalhar com os dados retornados pela API
            //pega o primeiro resultado e atribui ao livro
            let livro = dados.items[0];
            //pega a imagem retornada pela api
            let imagemLivro = livro.volumeInfo.imageLinks;
            
            if (imagemLivro && imagemLivro.smallThumbnail){
                //se tiver capa ele atribui ao livro

                img[indice].src = imagemLivro.smallThumbnail;
            }
            else{
                //se nao tiver capa ele atribui um placeholder
                img[indice].src = '../img/livros.jpg'
            };

        })
        .catch(erro => {
            // Lida com erros
            console.log(erro);
        });
});