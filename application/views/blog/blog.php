<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">BLOG &nbsp; &nbsp;</h4>

            <a href="<?= base_url('blog/create') ?>" class="btn btn-outline-success btn-rounded">Agregar publicaciones</a>

            <a href="#" title="Agregar publicación" data-toggle="popover" data-trigger="focus" data-content="Sirve para agregar un nuevo publicación y su información">
                <i class="fa fa-fw fa-question-circle pop-help"></i>
            </a>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">publicaciónS</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card card-body" style="background: #fefefe">

            <!-- Start of search box of table -->
            <div class="mb-2">
                <div class="col-xl-12">
                    <div class="input-group mb-1 float-right col-sm-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda" aria-label="Busqueda" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <!-- End of search box of table -->

            <?php
            foreach ($posts as $post) {
                ?>
                <div class="card mb-3 form-shadow">
                    <div class="row no-gutters">
                        <div>
                            <img src="<?= !empty(trim($post->recurso_av_1)) ? base_url("uploads/".trim($post->recurso_av_1)) : base_url("assets/images/blog/blog.png") ?>" class="card-img" alt="Imagen de presentación" style="width: 230px; margin: 0 auto">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?=$post->titulo?></h5>
                                <p class="card-text"><?=$post->texto_introduccion ?></p>
                                <p class="card-text"><small class="text-muted"><?=$post->fecha_ingreso?></small></p>
                            </div>
                        </div>
                        <div class="text-center" style="vertical-align: middle;">
                            <a href="<?= base_url() . "blog/edit/"  ?>" class="btn btn-warning  btn-edit mx-auto">Editar</a>
                            <button class="btn btn-danger btn-delete mx-auto" value="">Eliminar</button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>




        </div>
    </div>