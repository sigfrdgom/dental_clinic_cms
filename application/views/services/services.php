<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white" >
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">SERVICIOS &nbsp; &nbsp;</h4> 

            <a href="<?= base_url('services/create')?>" class="btn btn-outline-success btn-rounded">Agregar servicios</a>            

            <a href="#" 
                    title="Agregar Servicio"  data-toggle="popover" data-trigger="focus"
                    data-content="Sirve para agregar un nuevo servicio y su información">
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

    <div class="row" >
        <?php  if (isset($upload_data)) {?>
            <div class="alert alert-primary" role="alert">
            <strong><?php var_dump($upload_data) ?></strong>
            </div>
        <?php } ?> 
        
        <div class="card card-body" style="background: #fefefe">
            <table class="table table-sm table-borderless table-hover display" id="ajaxTabla">
                    <thead class="text-white bg-clidesa-celeste text-center">
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
                                <td class="align-middle"><?= $service->titulo  ?></td>
                                <td class="align-middle"><?= $service->texto_introduccion  ?></td>
                                <td class="align-middle"><?= $service->contenido  ?></td>
                                <td class="align-middle"><?= $service->estado  ?></td>
                                <td class="align-middle"><img src="<?= $service->recurso_av_1 ? "uploads/".$service->recurso_av_1 : './assets/images/default/no-image-visible.png' ?>" alt="" width="200"></td>
                                <td class="align-middle"><img src="<?= $service->recurso_av_2 ? "uploads/".$service->recurso_av_2 : './assets/images/default/no-image-visible.png' ?>" alt="" width="200"></td>
                                <td class="align-middle"><img src="<?= $service->recurso_av_3 ? "uploads/".$service->recurso_av_3 : './assets/images/default/no-image-visible.png' ?>" alt="" width="200"></td>
                                <td class="align-middle"><img src="<?= $service->recurso_av_4 ? "uploads/".$service->recurso_av_4 : './assets/images/default/no-image-visible.png' ?>" alt="" width="200"></td>
                                <td class="align-middle"><?= $service->fecha_ingreso ?></td>
                                <td class="align-middle"><button type="button" class="btn btn-warning">Editar</button></td>
                                <td class="align-middle"><button type="button" class="btn btn-danger">Eliminar</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>
    
</div>



 
    