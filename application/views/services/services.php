<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">SERVICIOS &nbsp; &nbsp;</h4>
            <a href="<?= base_url('services/create') ?>" class="btn btn-outline-success btn-rounded">Agregar servicios</a>
            <a href="#" title="Agregar Servicio" data-toggle="popover" data-trigger="focus" data-content="Sirve para agregar un nuevo servicio y su información">
                <i class="fa fa-fw fa-question-circle pop-help"></i>
            </a>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">SERVICIOS</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        
    <div id="div-message">
                <?php if (!empty($this->session->flashdata('message'))) { ?>
                    <script>
                        window.addEventListener('load', listener);

                        function listener() {
                            $.toast({
                                heading: `<?= $this->session->flashdata('title') ?>`,
                                text: `<?= $this->session->flashdata('message') ?>`,
                                showHideTransition: 'fade',
                                allowToastClose: true,
                                icon: 'success',
                                hideAfter: 3000,
                                stack: 6,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                bgColor: '#46e1b6',
                                textColor: '#ffffff', 
                            });
                        }
                    </script>
                <?php } else if (!empty($this->session->flashdata('error'))) { ?>
                    <script>
                        window.addEventListener('load', listener);

                        function listener() {
                            $.toast({
                                heading: `<?= $this->session->flashdata('title') ?>`,
                                text: `<?= $this->session->flashdata('error') ?>`,
                                showHideTransition: 'fade',
                                allowToastClose: true,
                                icon: 'error',
                                hideAfter: 3000,
                                stack: 6,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                bgColor: '#ef5350',
                                textColor: '#ffffff',
                            });
                        }
                    </script>
                <?php }
                ?>
            </div>

        <div class="card card-body" style="background: #fefefe">

            <!-- Start of search box of table -->
            <div class="mb-2">
                <div class="col-xl-12">       
                    <div class="input-group mb-1 float-right col-sm-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda" aria-label="Busqueda"aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <!-- End of search box of table -->

            <div id="paginador"></div>
            <div id="cards-content">

            </div>
            
        </div>
    </div>
</div>

</div>

<!-- Import services javascript    -->
<script src="<?= base_url('assets/js/services.js') ?>"></script>
<script src="<?= base_url('assets/js/paginadorDiv.js') ?>"></script>
