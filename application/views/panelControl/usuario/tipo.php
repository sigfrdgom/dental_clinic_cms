<!-- Start content of page tipo de contenido-->
<div class="container-fluid">

    <div class="row page-titles pt-2 pb-0" style="background: white" >
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor text-dark float-left mt-2">TIPO CONTENIDO&nbsp; &nbsp; &nbsp;</h4> 

            <button type="button" class="btn btn-outline-success mb-2 btn-rounded" data-toggle="modal" data-target="#agregarTipo" id="idModal">
                <span class='fa fa-plus-square-o bigfonts' ></span> Nuevo tipo
            </button>

            <a href="#" title="Agregar Tipo de contenido"  data-toggle="popover" data-trigger="focus"
                    data-content="Sirve para agregar un nuevo tipo de contenido al sistema.">
                <i class="fa fa-fw fa-question-circle pop-help" style="font-size:1.3em;"></i>
            </a>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">TIPO CONTENIDO</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card card-body">
            <!-- Para busqueda -->
            <div class="mb-2">
                <div class="col-xl-12">        
                    <div class="input-group mb-1 float-right col-sm-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda"
                                aria-label="Busqueda" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover display" id="ajaxTabla">
                    <thead class="text-white bg-clidesa-celeste">
                    <tr>
                        <!-- <th class='secret'>ID</th> -->
                        <th>Nombre del tipo</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones
                            <a href="#" 
                                title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                data-content="Sirven para modificar informacion de un tipo de contenido manejado por el sistema o darlo de baja">
                                <i class="fa fa-fw fa-question-circle pop-help text-white"></i>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="bodyTipo">
   
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<!-- End content of page tipo de contenido-->
	
<!-- Start of modal for tipo content management -->
<div class="modal fade" id="agregarTipo">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header" id="formUs">
            <h4 class="modal-title" style="margin: 0% auto;" id="aggdct">Agregar un nuevo tipo</h4>
            <h4 class="modal-title" style="margin: 0% auto; display:none;" id="mdfdct">Modificar un tipo</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal Header -->

        <!-- Modal body -->
        <div class="modal-body">
            <form id="formTipo" >
                <input type="hidden" name="id" id="id_tipo">

                <label for="nombre" class="mrg-spr-ex mt-2">Nombres del Tipo: </label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre del tipo" 
                class="form-control vinput" required pattern='[a-zA-ZÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                <div style="margin-left:2em;" id="oculto"hidden="true">
                    <label class="mrg-spr-ex mt-2" >Estado:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required checked>
                        Activo
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                        Desactivado
                        </label>
                    </div>    
                </div>
        </div>
        <!-- Modal body -->

        <!-- Modal footer -->
        <div class="modal-footer" id="formUs2">
                <input type="submit"  class="btn btn-success" value="Guardar" id="guardarTipo">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
            </form>
        </div>

        </div>
    </div>
</div>
<!-- End of modal for tipo content management -->
	
<script src="<?= base_url('assets/js/tipo.js')?>"></script>
