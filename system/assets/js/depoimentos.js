const buttons = document.querySelectorAll('button')
const formAlterarDepoimento = document.getElementById('formAlterarDepoimento')
const formDeletarDepoimento = document.getElementById('formDeletarDepoimento')
const alterarNomeCliente = document.getElementById('nomeClienteAlterar')
const alterarDescricaoDepoimento = document.getElementById('depoimentoTextoAlterar')
const alterarModalImagem = document.getElementById('alterarImagemCliente')
const imagemDeletar = document.getElementById('imagemDeletar')

buttons.forEach(function(e) {
    e.addEventListener('click', function() {
        if (e.classList.contains('bg-info')) {
            let inputNome = e.id + 'nome'
            let inputDescricao = e.id + 'descricao'
            let imagemSRC = e.id + 'imagem'
            let action = '../../php/alterarDepoimento.php?id=' + e.id
            alterarNomeCliente.value = document.getElementById(inputNome).innerHTML
            alterarDescricaoDepoimento.value = document.getElementById(inputDescricao).innerHTML
            alterarModalImagem.src = document.getElementById(imagemSRC).src
            formAlterarDepoimento.action = action
        } else if (e.classList.contains('bg-danger')) {
            let inputImagem = e.id + 'imagemEscondida'
            let action = '../../php/deletarDepoimento.php?id=' + e.id
            imagemDeletar.value  = document.getElementById(inputImagem).value
            formDeletarDepoimento.action = action
        }
    })
})