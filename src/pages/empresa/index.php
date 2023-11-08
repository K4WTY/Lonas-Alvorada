<?php

    include_once("../../php/connection.php");

    $arrayBanners = null;
    $command = "SELECT * FROM banners";
    $prepare = $pdo->prepare($command);
    $prepare->execute();

    if ($prepare->rowCount() > 0) {
        $arrayDB = $prepare->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $arrayDB = null;
    }

    if ($arrayDB != null) {
        foreach($arrayDB as $index) {
            $arrayBanners["nome"] = $index["nome"];
            $arrayBanners[$index["nome"]]["imagem"] = "../../../assets/uploadsDB/banners/" . $index["page"] . "/" . $index["imagem"] . ".png";
        }
    }


    unset($pdo);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../assets/bootstrap-5.2.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../assets/css/offcanvas.css">
        <link rel="stylesheet" href="../../../assets/css/fontes.css">
        <link rel="stylesheet" href="../../../assets/css/reset.css">
        <link rel="stylesheet" href="../../../assets/css/footer.css">
        <link rel="stylesheet" href="../../../assets/css/header.css">
        <link rel="stylesheet" href="../../../assets/css/empresa.css">
        <title>Alvorada - Empresas</title>
    </head>
    <body>
        <div class="container-fluid p-0">
            <?php include_once("../../parts/header.php"); ?>
            <main>
                <section class="section-empresa">
                    <div>
                        <h2>Empresa</h2>
                        <p class="fw-bold">Você está aqui! - Home > Empresa</p>
                    </div>
                </section>
                <section class="section-sobre my-5">
                    <div class="container container-sobre">
                        <img src="<?php if ($arrayBanners != null && isset($arrayBanners["empresa-sobre"])) { echo $arrayBanners["empresa-sobre"]["imagem"]; } else { echo "../../../assets/imgs/alvorada-local.png"; } ?>" height="450" width="360">
                        <div>
                            <div>
                                <p class="p-red">| Sobre nós</p>
                                <p class="fw-bold">Uma empresa que existe a mais de 30 anos.</p>
                            </div>
                            <div>
                                <p>O Grupo Alvorada foi fundado no final dos anos 70, comercializando coberturas e toldos. Em meados dos anos 90, ampliou seu mercado, fornecendo lonas para vários outros segmentos. De uma maneira simples, a Alvorada trabalha com lonas nacionais e importadas para comunicação visual, toldos, coberturas, caminhões, tendas e barracas. Assim como serviços de vulcanização, colocação de ilhós e chapas de policarbonato. Seus clientes são formados, principalmente, por empresas e consumidores finais do Paraná e Santa Catarina. Com o objetivo de alcançar todo o Brasil, o Grupo Alvorada está, mais uma vez, expandindo seu mercado. </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section-missao py-5">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-lg-3">
                            <div class="col d-flex flex-column align-items-center">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="div-circle-missao rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="../../../assets/icons/missao.svg" alt="">
                                    </div>
                                    <h2 class="mt-3">Missão</h2>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="col d-flex flex-column align-items-center">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="div-circle-missao rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="../../../assets/icons/visao.svg" alt="">
                                    </div>
                                    <h2 class="mt-3">Visão</h2>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="col d-flex flex-column align-items-center">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="div-circle-missao rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="../../../assets/icons/diamante.svg" alt="">
                                    </div>
                                    <h2 class="mt-3">Valores</h2>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <?php include_once("../../parts/footer.php"); ?>
        </div>
        <?php include_once("../../parts/offcanvas.php"); ?>
        <script src="../../../assets/bootstrap-5.2.3/js/bootstrap.bundle.js"></script>
    </body>
</html>