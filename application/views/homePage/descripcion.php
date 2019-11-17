<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Página de inicio descripción &nbsp; &nbsp;</h4>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">Página de inicio descripción</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">

    <?php $this->load->view('components/toastMessages'); ?>

        <div class="col-11 p-2 card mx-auto">
            <div class="row col-12 p-3 mx-auto">
                <div class="row col-12 p-4">
                    <h3 for="contenido"><?= $descripcion->titulo ?></h3>
                    <br/>
                    <?= !empty($descripcion->contenido) ? $descripcion->contenido : '' ?>
                    <br/>
                    <a href="<?= base_url('homepage/editContent/').$descripcion->id_estatico ?>" class="btn btn-primary">Cambiar</a>
                </div>
            </div>
        </div>

    </div>