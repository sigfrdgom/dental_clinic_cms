<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Nuevo método de pago &nbsp; &nbsp;</h4>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">Nuevo método de pago</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row card col-11 mx-auto p-2">
        <form action="<?= base_url('payment/guardarDatos') ?>" method="post" enctype="multipart/form-data">
            <?php $this->load->view('payment/form'); ?>
        </form>
    </div>
</div>