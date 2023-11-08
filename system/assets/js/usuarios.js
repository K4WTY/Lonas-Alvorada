const eyePassword = document.querySelectorAll('#eye-password')
const senhaNovoUsuario = document.getElementById('senhaNovoUsuario')
const senhaNovoUsuario2 = document.getElementById('senhaNovoUsuario2')
const senhaNovoUsuarioAlterar = document.getElementById('senhaNovoUsuarioAlterar')
const senhaNovoUsuarioAlterar2 = document.getElementById('senhaNovoUsuarioAlterar2')
const formNovoUsuario = document.getElementById('formNovoUsuario')
const verificarNovaSenha = document.getElementById('verificarNovaSenha')
const verificarNovaSenhaAlterar = document.getElementById('verificarNovaSenhaAlterar')
const formDeletarUsuario = document.getElementById('formDeletarUsuario')
const formAlterarUsuario = document.getElementById('formAlterarUsuario')
const usernameAlterar = document.getElementById('usernameAlterar')
const cargo = document.getElementById('cargo')
const buttons = document.querySelectorAll('button')

formNovoUsuario.addEventListener('submit', function(e) {
    if (senhaNovoUsuario.value != senhaNovoUsuario2.value) {
        e.preventDefault()
        verificarNovaSenha.innerHTML = 'Senhas diferentes'
    }
})

formAlterarUsuario.addEventListener('submit', function(e) {
    if (senhaNovoUsuarioAlterar.value != senhaNovoUsuarioAlterar2.value) {
        e.preventDefault()
        verificarNovaSenhaAlterar.innerHTML = 'Senhas diferentes'
    }
})

eyePassword.forEach(function(e) {
    e.addEventListener('click', function() {
        if (!e.classList.contains('eye-2')) {
            if (senhaNovoUsuario.type == 'password' || senhaNovoUsuarioAlterar.type == 'password') {
                senhaNovoUsuario.type = 'text'
                senhaNovoUsuarioAlterar.type = 'text'
                e.classList.remove('bi-eye-fill')
                e.classList.add('bi-eye-slash-fill')
                return
            }

            e.classList.add('bi-eye-fill')
            e.classList.remove('bi-eye-slash-fill')
            senhaNovoUsuario.type = 'password'
            senhaNovoUsuarioAlterar.type = 'password'
            return
        }

        if (senhaNovoUsuario2.type == 'password' || senhaNovoUsuarioAlterar2.type == 'password') {
            senhaNovoUsuario2.type = 'text'
            senhaNovoUsuarioAlterar2.type = 'text'
            e.classList.remove('bi-eye-fill')
            e.classList.add('bi-eye-slash-fill')
            return
        }

        e.classList.add('bi-eye-fill')
        e.classList.remove('bi-eye-slash-fill')
        senhaNovoUsuario2.type = 'password'
        senhaNovoUsuarioAlterar2.type = 'password'
    })
})

buttons.forEach(function(e) {
    e.addEventListener('click', function() {
        if (e.classList.contains('bg-info')) {
            let action = '../../php/alterarUsuario.php?id=' + e.id
            let inputUsername = e.id + 'username'
            let inputAdmin = e.id + 'admin'
            let cargoValue = document.getElementById(inputAdmin).value
            cargo.value = 'Funcionario'
            if (cargoValue == 1) {
                cargo.value = 'Admin'
            }
            usernameAlterar.value = document.getElementById(inputUsername).value
            formAlterarUsuario.action = action
        } else if (e.classList.contains('bg-danger')) {
            let action = '../../php/deletarUsuario.php?id=' + e.id
            formDeletarUsuario.action = action
        }
    })
})