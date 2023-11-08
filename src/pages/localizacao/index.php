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
        <link rel="stylesheet" href="../../../assets/css/localizacao.css">
        <title>Alvorada - Localização</title>
    </head>
    <body>
        <div class="container-fluid p-0">
            <?php include_once("../../parts/header.php"); ?>
            <main>
                <section class="section-localizacao">
                    <div>
                        <h2>Localização</h2>
                        <p class="fw-bold">Você está aqui! - Home > Localização</p>
                    </div>
                </section>
                <section class="my-5">
                    <div class="container container-local">
                        <h2>Nossa <span>Localização</span></h2>
                        <div class="row row-col-1 row-cols-lg-2">
                            <div class="col">
                                <div class="d-flex justify-content-center align-items-center">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1071.6221670016757!2d-49.18024216776737!3d-25.3883046631943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15cc4b603d69c5d%3A0x68b4b7c0062ae1c3!2sAlvorada%20Lonas!5e0!3m2!1spt-BR!2sbr!4v1697203475139!5m2!1spt-BR!2sbr" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="col mt-5 align-self-end">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div class="div-local d-flex justify-content-center align-items-center rounded-circle">
                                        <img src="../../../assets/icons/local-2.svg" alt="">
                                    </div>
                                    <h2>Endereço</h2>
                                </div>
                                <p>Rodovia BR-116, 1530 - Colombo, R. Daniel Guimarães, 314 - Planta Boros, Colombo - PR, 83412-000</p>
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