<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
    <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Método de pagos &nbsp; &nbsp;</h4>
            <a href="<?= base_url('payment/create') ?>" class="btn btn-outline-success btn-rounded">Agregar método de pago</a>
            <a href="#" title="Agregar imágnes" data-toggle="popover" data-trigger="focus" data-content="Sirve para agregar un nuevo publicación y su información">
                <i class="fa fa-fw fa-question-circle pop-help"></i>
            </a>
        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">Métodos de pago</li>
                </ol>
            </div>
        </div>
    </div>

    <?php $this->load->view('components/toastMessages'); ?>

    <div class="row" id="image-content">

    </div>

</div>

<script src="<?= base_url('assets/js/payment.js') ?>"></script>