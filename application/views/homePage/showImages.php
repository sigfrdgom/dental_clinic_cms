<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Añadir imagen al Carrusel &nbsp; &nbsp;</h4>
            <a href="<?= base_url('homePage/create') ?>" class="btn btn-outline-success btn-rounded">Agregar Imágnes</a>
            <a href="#" title="Agregar imágnes" data-toggle="popover" data-trigger="focus" data-content="Sirve para agregar un nuevo publicación y su información">
                <i class="fa fa-fw fa-question-circle pop-help"></i>
            </a>
        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">Imágenes del Carrusel</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row" id="image-content">

    </div>

    <script src="<?= base_url('assets/js/imagesCarousel.js') ?>"></script>