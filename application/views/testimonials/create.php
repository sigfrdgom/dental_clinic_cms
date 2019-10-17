<div class="container">
    <div class="row">
        <div class="col-12 col-sm-11 col-md-11 col-xl-12 mx-auto mt-4">
            <form action="<?=  base_url('testimonials/guardarDatos' )?>" method="post" enctype="multipart/form-data" class="p-3" style="background: #dfdfdf" class="form-shadow">
                <?php $this->load->view('testimonials/form'); ?>
            </form>

        </div>
    </div>
</div>