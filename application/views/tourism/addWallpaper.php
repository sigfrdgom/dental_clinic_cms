<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Añadir imagen a la galería &nbsp; &nbsp;</h4>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">Añadir imagen a la galería</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="<?=  base_url('tourism/saveWallpaper' )?>" method="post" enctype="multipart/form-data" class="col-12 col-sm-12 col-md-10 col-lg-8 mx-auto">
            <?php $this->load->view('tourism/formImage'); ?>
        </form>
    </div>

</div>