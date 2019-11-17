<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
    <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Modificar publicación &nbsp; &nbsp;</h4>
        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">BLOG</li>
                    <li class="breadcrumb-item active">Modificar publicación</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-12 col-sm-12 col-md-10 col-lg-8 mx-auto mt-4">
            <form action="<?= base_url().'services/updateService/'.$services->id_publicacion ?>" method="post" enctype="multipart/form-data" class="p-3" >
                <?php $this->load->view('services/form'); ?>
            </form>

        </div>
    </div>
</div>
