const formAlterarBanner = document.getElementById('formAlterarBanner')
const buttons = document.querySelectorAll('button')
const inputNomeBanner = document.getElementById('inputNomeBanner')

buttons.forEach(function(e) {
    e.addEventListener('click', function() {
        if (e.id == 'home-seguimentos-buttons') {
            inputNomeBanner.value = e.value
            formAlterarBanner.action = '../../php/alterarBanners.php?page=home'
        } else if (e.id == 'empresa-sobre-buttons') {
            inputNomeBanner.value = e.value
            formAlterarBanner.action = '../../php/alterarBanners.php?page=empresa'
        } else if (e.id == 'servicos-nossos-buttons') {
            inputNomeBanner.value = e.value
            formAlterarBanner.action = '../../php/alterarBanners.php?page=servicos'
        }
    })
})