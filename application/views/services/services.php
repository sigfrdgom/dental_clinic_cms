<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Servicios&nbsp;</h1>
                    <a href="<?= base_url('services/create')?>" class="btn btn-outline-success">Agregar servicios</a>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Inicio</li>
                        <li class="breadcrumb-item active">Tipos de usuarios</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row" >
            <?php  if (isset($upload_data)) {?>
                <div class="alert alert-primary" role="alert">
                <strong><?php var_dump($upload_data) ?></strong>
                </div>
            <?php } ?> 
            
            <div class="card card-body" style="background: #fefefe">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered ">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Introduccion</th>
                                <th>Contenido</th>
                                <th>Estado</th>
                                <th>Recurso 1</th>
                                <th>Recurso 2</th>
                                <th>Recuros 3</th>
                                <th>Recurso 4</th>
                                <th>Fecha</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($services as $service) {
                                ?>
                                <tr>
                                    <td><?= $service->titulo  ?></td>
                                    <td><?= $service->texto_introduccion  ?></td>
                                    <td><?= $service->contenido  ?></td>
                                    <td><?= $service->estado  ?></td>
                                    <td><img src="uploads/<?= $service->recurso_av_1 ?>" alt="" width="200"></td>
                                    <td><img src="uploads/<?= $service->recurso_av_2 ?>" alt="" width="200"></td>
                                    <td><img src="uploads/<?= $service->recurso_av_3 ?>" alt="" width="200"></td>
                                    <td><img src="uploads/<?= $service->recurso_av_4 ?>" alt="" width="200"></td>
                                    <td><?= $service->fecha_ingreso ?></td>
                                    <td><button type="button" class="btn btn-warning">Editar</button></td>
                                    <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                                </tr>
                            <?php
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>