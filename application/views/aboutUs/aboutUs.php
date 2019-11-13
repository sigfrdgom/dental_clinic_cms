<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Página de Sobre Nosotros &nbsp; &nbsp;</h4>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">Página de Sobre Nosotros</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">

    <?php $this->load->view('components/toastMessages'); ?>

        <div class="col-11 p-2 card mx-auto">
            <div class="row col-12 p-3 mx-auto">
                <div class="row col-12 p-4">
                    <h3 for="contenido"><?= $acercade[0]->titulo ?></h3>
                    <?= !empty($acercade[0]->contenido) ? $acercade[0]->contenido : '' ?>
                    <a href="<?= base_url('aboutUs/editContent/').$acercade[0]->id_acercade ?>" class="btn btn-primary">Cambiar</a>
                </div>
                <div class="row col-12 p-1 mx-auto">
                    <div class="col col-6" name="mision" id="mision">
                        <h3 for="contenido"><?= $acercade[1]->titulo ?></h3>
                        <?= !empty($acercade[1]->contenido) ? $acercade[1]->contenido : '' ?>
                        <a href="<?= base_url('aboutUs/editContent/').$acercade[1]->id_acercade ?>"  class="btn btn-primary">Cambiar</a>
                    </div>
                    <div class="col col-6" name="vision" id="vision">
                        <h3 for="contenido"><?= $acercade[2]->titulo ?></h3>
                        <?= !empty($acercade[2]->contenido) ? $acercade[2]->contenido : '' ?>
                        <a href="<?= base_url('aboutUs/editContent/').$acercade[2]->id_acercade ?>" class="btn btn-primary">Cambiar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>