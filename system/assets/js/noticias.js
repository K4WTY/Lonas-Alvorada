const buttons = document.querySelectorAll('button')
const formAlterarNoticia = document.getElementById('formAlterarNoticia')
const formDeletarNoticia = document.getElementById('formDeletarNoticia')
const alterarNomeNoticia = document.getElementById('alterarNomeNoticia')
const alterarDescricaoNoticia = document.getElementById('alterarDescricaoNoticia')
const alterarModalImagem = document.getElementById('alterarModalImagem')
const imagemDeletar = document.getElementById('imagemDeletar')

buttons.forEach(function(e) {
    e.addEventListener('click', function() {
        if (e.classList.contains('bg-info')) {
            let inputNome = e.id + 'nome'
            let inputDescricao = e.id + 'descricao'
            let imagemSRC = e.id + 'imagem'
            let action = '../../php/alterarNoticia.php?id=' + e.id
            alterarNomeNoticia.value = document.getElementById(inputNome).innerHTML
            alterarDescricaoNoticia.value = document.getElementById(inputDescricao).innerHTML
            alterarModalImagem.src = document.getElementById(imagemSRC).src
            formAlterarNoticia.action = action
        } else if (e.classList.contains('bg-danger')) {
            let inputImagem = e.id + 'imagemEscondida'
            let action = '../../php/deletarNoticia.php?id=' + e.id
            imagemDeletar.value  = document.getElementById(inputImagem).value
            formDeletarNoticia.action = action
        }
    })
})