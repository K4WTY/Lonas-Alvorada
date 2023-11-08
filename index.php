<?php

    include_once("./src/php/connection.php");

    $arrayBanners = null;

    $command = "SELECT * FROM depoimentos";
    $prepare = $pdo->prepare($command);
    $prepare->execute();

    if ($prepare->rowCount() > 0) {
        $arrayDB = $prepare->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $arrayDB = null;
    }
    
    $command = "SELECT * FROM banners";
    $prepare = $pdo->prepare($command);
    $prepare->execute();

    if ($prepare->rowCount() > 0) {
        $arrayDBBanners = $prepare->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $arrayDBBanners = null;
    }

    if ($arrayDBBanners != null) {
        foreach($arrayDBBanners as $index) {
            $arrayBanners["nome"] = $index["nome"];
            $arrayBanners[$index["nome"]]["imagem"] = "./assets/uploadsDB/banners/" . $index["page"] . "/" . $index["imagem"] . ".png";
        }
    }

    unset($pdo);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/bootstrap-5.2.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/offcanvas.css">
        <link rel="stylesheet" href="./assets/css/fontes.css">
        <link rel="stylesheet" href="./assets/css/reset.css">
        <link rel="stylesheet" href="./assets/css/footer.css">
        <link rel="stylesheet" href="./assets/css/header.css">
        <link rel="stylesheet" href="./assets/css/home.css">
        <title>Alvorada - Home</title>
    </head>
    <body>
        <div class="container-fluid p-0">
            <header class="bg-white">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid container-center">
                        <button class="navbar-toggler bg-transparent border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAlvorada" aria-controls="offcanvasAlvorada">
                            <img src="./assets/icons/menu-header.svg" height="35">
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="./assets/imgs/Logo.png" height="35">
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-black" aria-current="page" href="./">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-black" href="./src/pages/empresa/">Empresa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-black" href="./src/pages/servicos/">Serviços</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-black" href="./src/pages/noticias/">Notícias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-black" href="./src/pages/localizacao/">Localização</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-black" href="./src/pages/contato/">Contato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-black" href="#">Loja Online</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <main>
                <section class="section-home">
                    <div class="div-section-home">
                        <h2>LONAS EM PVC</h2>
                        <p class="fw-bold">COMPRE AS MELHORES LONAS EM PVC E OUTROS PRODUTOS DE NOSSO CATÁLOGO SEM SAIR DE CASA!</p>
                        <div class="d-flex">
                            <a href="" class="text-center text-decoration-none">
                                <p class="p-section-home p-0 m-0 d-flex justify-content-center align-items-center">Comprar</p>
                            </a>
                            <a href="" class="text-center text-decoration-none">
                                <p class="p-section-home-2 p-0 d-flex justify-content-center align-items-center">Outros Serviços</p>  
                            </a>
                        </div>
                    </div>
                </section>
                <section class="section-seguimentos my-4">
                    <div class="container">
                        <h2>Seguimentos</h2>
                        <p>O Grupo Alvorada atende diversos segmentos, do agronegócio ao transporte.</p>
                        <div class="row row-cols-1 row-cols-lg-3 row-seguimentos">
                            <div class="col">
                                <div class="my-3 agronegocios-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-agronegocio"])) { echo "background-image: url('" . $arrayBanners["home-agronegocio"]["imagem"] . "') !important;"; } ?>">
                                    <h2>Agronegócios</h2>
                                </div>
                            </div>
                            <div class="col">
                                <div class="my-3 arquitetura-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-arquitetura"])) { echo "background-image: url('" . $arrayBanners["home-arquitetura"]["imagem"] . "') !important;"; } ?>">
                                    <h2>Arquitetura</h2>
                                </div>
                            </div>
                            <div class="col">
                                <div class="my-3 comunicacao-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-comunicacao"])) { echo "background-image: url('" . $arrayBanners["home-comunicacao"]["imagem"] . "') !important;"; } ?>">
                                    <h2>Comunicação Visual</h2>
                                </div>
                            </div>
                            <div class="col">
                                <div class="my-3 moda-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-moda"])) { echo "background-image: url('" . $arrayBanners["home-moda"]["imagem"] . "') !important;"; } ?>">
                                    <h2 class="text-black">Moda e Decoração</h2>
                                </div>
                            </div>
                            <div class="col">
                                <div class="my-3 tenda-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-tendas"])) { echo "background-image: url('" . $arrayBanners["home-tendas"]["imagem"] . "') !important;"; } ?>">
                                    <h2>Tenda e barracas</h2>
                                </div>
                            </div>
                            <div class="col">
                                <div class="my-3 transporte-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-transporte"])) { echo "background-image: url('" . $arrayBanners["home-transporte"]["imagem"] . "') !important;"; } ?>">
                                    <h2>Transporte</h2>
                                </div>
                            </div>
                            <div class="col">
                                <div class="my-3 projeto-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-projetos"])) { echo "background-image: url('" . $arrayBanners["home-projetos"]["imagem"] . "') !important;"; } ?>">
                                    <h2>Projetos Especiais</h2>
                                </div>
                            </div>
                            <div class="col">
                                <div class="my-3 equipamentos-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-equipamentos"])) { echo "background-image: url('" . $arrayBanners["home-equipamentos"]["imagem"] . "') !important;"; } ?>">
                                    <h2>Equipamentos</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section-servicos">
                    <div class="container">
                        <div>
                            <h2 class="center-desktop">Serviços</h2>
                            <p class="p-red center-desktop">| Fazemos sob medida para sua necessidade.</p>
                            <p class="fw-bold center-desktop">Nossa empresa pode criar soluções sob medida ou podemos adpatar algo para sua necessidade. Estamos sempre a sua disposição.</p>
                        </div>
                        <div class="d-flex justify-content-center ">
                            <ul class="ul-servicos list-unstyled d-flex">
                                <li class="servicos-li d-flex align-items-center">
                                    <img src="./assets/icons/costura.svg" class="ms-5">
                                    <p class="ms-2 my-0">Costura</p>
                                </li>
                                <li class="servicos-li d-flex align-items-center">
                                    <img src="./assets/icons/barraca.svg" class="ms-5">
                                    <p class="ms-2 my-0">Lonas sob medida</p>
                                </li>
                                <li class="servicos-li d-flex align-items-center">
                                    <img src="./assets/icons/lona.svg" class="ms-5">
                                    <p class="ms-2 my-0">Solda</p>
                                </li>
                                <li class="servicos-li d-flex align-items-center">
                                    <img src="./assets/icons/tronco.svg" class="ms-5">
                                    <a href="" class="text-decoration-none ms-2">Materiais especializados</a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex div-costura my-5">
                            <div class="">
                                <img src="<?php if ($arrayBanners != null && isset($arrayBanners["home-costura"])) { echo $arrayBanners["home-costura"]["imagem"]; } else { echo "./assets/imgs/resrot.png"; } ?>" alt="resort" class="img-servicos" height="278">
                            </div>
                            <div class="col-costura">
                                <p class="mt-3 p-red">| Costura</p>
                                <p>Nossa empresa pode criar soluções sob medida ou podemos adpatar algo para sua necessidade. Estamos sempre a sua disposição.  Nossa empresa pode criar soluções sob medida ou podemos adpatar la.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section-noticias my-4">
                    <div class="container">
                        <div>
                            <h2>Notícias</h2>
                            <p class="text-center mt-3 p-red">| Como aumentar a vida útil da lona para caminhão?</p>
                            <p class="text-center fw-bold ">Escolha a lona corretamente</p>
                        </div>
                        <div>
                            <div class="row row-cols-1 row-cols-lg-3">
                                <div class="col">
                                    <img src="./assets/imgs/noticias.png" width="100%">
                                    <p class="p-red">| Costura</p>
                                    <p>Nossa empresa pode criar soluções sob medida ou podemos adpatar algo para sua necessidade. Estamos sempre a sua disposição.  Nossa empresa pode criar soluções sob medida ou podemos adpatar algo para a sua necessidade.</p>
                                    <a href="" class="text-decoration-none p-red">Saiba mais</a>
                                </div>
                                <div class="col">
                                    <img src="./assets/imgs/noticias.png" width="100%">
                                    <p class="p-red">| Costura</p>
                                    <p>Nossa empresa pode criar soluções sob medida ou podemos adpatar algo para sua necessidade. Estamos sempre a sua disposição.  Nossa empresa pode criar soluções sob medida ou podemos adpatar algo para a sua necessidade.</p>
                                    <a href="" class="text-decoration-none p-red">Saiba mais</a>
                                </div>
                                <div class="col">
                                    <img src="./assets/imgs/noticias.png" width="100%">
                                    <p class="p-red">| Costura</p>
                                    <p>Nossa empresa pode criar soluções sob medida ou podemos adpatar algo para sua necessidade. Estamos sempre a sua disposição.  Nossa empresa pode criar soluções sob medida ou podemos adpatar algo para a sua necessidade.</p>
                                    <a href="" class="text-decoration-none p-red">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section-contato my-4 py-4">
                    <div class="container my-5">
                        <div class="row row-cols-1 row-cols-lg-3">
                            <div class="col d-flex justify-content-center">
                                <div class="mb-4 div-rosto d-flex justify-content-center align-items-center rounded-circle">
                                    <img src="./assets/icons/rosto.svg" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <p class="text-center fw-bold">Precisando temos uma equipe pronta para lhe atender.</p>
                                <p class="text-center">Entere em contato pelos nossos canais de atendimento ou nós faça uma visita.</p>
                            </div>
                            <div class="col d-flex flex-column align-items-center">
                                <a href="" class="text-decoration-none">
                                    <p class="a-contato d-flex justify-content-center align-items-center">Contato</p>
                                </a>
                                <a href="" class="text-decoration-none">
                                    <p class="a-contato-2 d-flex justify-content-center align-items-center">Localização</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <?php if (!$arrayDB == null) { ?>
                    <section class="section-testemunhos my-4">
                        <div class="container">
                            <div class="mb-5">
                                <p class="text-center p-red">| Testemunhos</p>
                                <p class="text-center fw-bold">O que as pessoas e os clientes pensam sobre nós?</p>
                            </div>
                            <div class="row row-testemunhos row-cols-1 row-cols-lg-3">
                                <?php foreach ($arrayDB as $index) { ?>
                                    <div class="col shadow pt-2 px-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                                <div>
                                                    <img id="<?= $index["id"] ?>imagem" src="./assets/uploadsDB/depoimentos/<?= $index["imagem"] ?>.png" height="65" width="65">
                                                </div>
                                                <div class="ms-3">
                                                    <p class="fw-bold m-0" id="<?= $index["id"] ?>nome"><?= $index["nome"] ?></p>
                                                    <p class="p-red">Cliente</p>
                                                </div>
                                            </div>
                                            <div class="rounded-circle d-flex justify-content-center align-items-center div-aspas">
                                                <img src="./assets/icons/aspas.svg" alt="">
                                            </div>
                                        </div>
                                        <p class="mt-3" id="<?= $index["id"] ?>descricao"><?= $index["depoimento"] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                <?php } ?>
                <section class="section-loja">
                    <div class="container">
                        <div>
                            <h2>Loja Online</h2>
                            <p class="p-red">| Precisando comprar</p>
                            <p class="fw-bold">Estamos a sua disposição, venha comprar agora mesmo.</p>
                        </div>
                        <div class="d-flex div-loja">
                            <img src="<?php if ($arrayBanners != null && isset($arrayBanners["home-loja"])) { echo $arrayBanners["home-loja"]["imagem"]; } else { echo "./assets/imgs/piscina.png"; } ?>" height="202" width="330">
                            <div>
                                <p class="fw-bold">“É rápido e fácil”</p>
                                <p>Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit, sed do
                                    eiusmod tempor incididunt ut
                                    labore</p>
                            </div>
                            <a href="" class="text-decoration-none">
                                <p class="a-loja d-flex justify-content-center align-items-center rounded-2">Comprar</p>
                            </a>
                        </div>
                    </div>
                </section>
            </main>
            <footer>
                <div class="footer-top py-5">
                    <div class="row row-cols-1 row-cols-lg-4 m-0">
                        <div class="col d-flex flex-column align-items-center">
                            <img src="./assets/imgs/Logo-branca.png" alt="">
                            <div class="mt-4 mb-4">
                                <a href="" class="text-decoration-none text-light">
                                    <img src="./assets/icons/facebook.svg" class="icon-footer rounded-2">
                                </a>
                                <a href="" class="text-decoration-none text-light">
                                    <img src="./assets/icons/whatsapp.svg" class="icon-footer rounded-2">
                                </a>
                                <a href="" class="text-decoration-none text-light">
                                    <img src="./assets/icons/instagram.svg" class="icon-footer rounded-2">
                                </a>
                                <a href="" class="text-decoration-none text-light">
                                    <img src="./assets/icons/carta.svg" class="icon-footer-last rounded-2">
                                </a>
                            </div>
                        </div>
                        <div class="col d-flex flex-column align-items-center">
                            <p class="fw-bold">Institucional</p>
                            <ul class="list-unstyled text-center">
                                <li>
                                    <a href="./" class="text-decoration-none text-light">Home</a>
                                </li>
                                <li>
                                    <a href="./src/pages/empresa/" class="text-decoration-none text-light">Empresa</a>
                                </li>
                                <li>
                                    <a href="./src/pages/servicos/" class="text-decoration-none text-light">Serviços</a>
                                </li>
                                <li>
                                    <a href="./src/pages/noticias/" class="text-decoration-none text-light">Notícias</a>
                                </li>
                                <li>
                                    <a href="./src/pages/localizacao/" class="text-decoration-none text-light">Localização</a>
                                </li>
                                <li>
                                    <a href="./src/pages/contato/" class="text-decoration-none text-light">Contato</a>
                                </li>
                                <li>
                                    <a href="" class="text-decoration-none text-light">Loja Online</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col d-flex flex-column align-items-center">
                            <a class="fw-bold text-decoration-none text-light" href="./src/pages/seguimentos/">Seguimentos</a>
                            <ul class="list-unstyled text-center">
                                <li>
                                    <a href="" class="text-decoration-none text-light">Agronegócios</a>
                                </li>
                                <li>
                                    <a href="" class="text-decoration-none text-light">Arquitetura</a>
                                </li>
                                <li>
                                    <a href="" class="text-decoration-none text-light">Capas</a>
                                </li>
                                <li>
                                    <a href="" class="text-decoration-none text-light">Comunicação Visual</a>
                                </li>
                                <li>
                                    <a href="" class="text-decoration-none text-light">Moda e Decoração</a>
                                </li>
                                <li>
                                    <a href="" class="text-decoration-none text-light">Projetos Especiais</a>
                                </li>
                                <li>
                                    <a href="" class="text-decoration-none text-light">Tendas e Barracas</a>
                                </li>
                                <li>
                                    <a href="" class="text-decoration-none text-light">Toldos</a>
                                </li>
                                <li>
                                    <a href="" class="text-decoration-none text-light">Transporte</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col d-flex flex-column align-items-center">
                            <p class="fw-bold">Contato</p>
                            <div>
                                <div class="local d-flex flex-column align-items-center">
                                    <img src="./assets/icons/local.svg" alt="">
                                    <p class="m-0">Rodovia BR-116, 1530 - Colombo, R.</p>
                                    <p class="m-0">Daniel Guimarães, 314 - Planta Boros,</p>
                                    <p class="m-0">Colombo - PR, 83412-000</p>
                                </div>
                                <div class="telefone d-flex flex-column align-items-center">
                                    <img src="./assets/icons/telefone.svg" alt="">
                                    <p>(+55) 41 3675-6469</p>
                                </div>
                                <div class="emal d-flex flex-column align-items-center">
                                    <img src="./assets/icons/mail.svg" alt="">
                                    <p>atendimento@lonasalvorada.com.br</p>
                                </div>
                                <div class="atendimento d-flex flex-column align-items-center">
                                    <img src="./assets/icons/relogio.svg" alt="">
                                    <div class="d-flex flex-column">
                                        <p class="m-0">Horario de Atendimento : 8:00 - 12:00</p>
                                        <p class="m-0 align-self-end">13:30 - 18:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom py-2 text-center">
                    <p>Copyright © Todos os direitos reservados ao Grupo Alvorada.</p>
                    <p>Construido por Sagaweb</p>
                </div>
            </footer>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAlvorada" aria-labelledby="offcanvasAlvoradaLabel">
            <div class="offcanvas-header">
                <button type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="border-0 bg-transparent ">
                    <img src="./assets/icons/menu-close.svg">
                </button>
                <img src="./assets/imgs/Logo.png" height="35">
            </div>
            <div class="offcanvas-body">
                <nav class="mt-4">
                    <ul class="list-unstyled ul-offcanvas-alvorada">
                        <li>
                            <a href="./" class="text-decoration-none text-light">Home</a>
                        </li>
                        <li class="my-4">
                            <a href="./src/pages/empresa/" class="text-decoration-none text-light">Empresa</a>
                        </li>
                        <li>
                            <a href="./src/pages/servicos/" class="text-decoration-none text-light">Serviços</a>
                        </li>
                        <li class="my-4">
                            <a href="./src/pages/noticias/" class="text-decoration-none text-light">Notícias</a>
                        </li>
                        <li>
                            <a href="./src/pages/localizacao/" class="text-decoration-none text-light">Localização</a>
                        </li>
                        <li class="my-4">
                            <a href="./src/pages/contato/" class="text-decoration-none text-light">Contato</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-light">Loja Online</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <script src="./assets/bootstrap-5.2.3/js/bootstrap.bundle.js"></script>
    </body>
</html>