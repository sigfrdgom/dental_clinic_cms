<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white" >

        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor text-dark float-left mt-2">BITACORA&nbsp; &nbsp;</h4> 
        </div>

        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">BITACORA</li>
                </ol>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="card card-body">

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

			<!-- Start of table -->
			<div id="paginador"></div>
            <div class="table-responsive">
			
                <table class="table table-borderless table-hover display" id="ajaxTabla">
                    <thead class="text-white bg-clidesa-celeste">
                        <tr>
							<!-- <th class='secret'>ID</th> -->
							<th>Tipo de Usuario</th>
                            <th>Usuario</th>
							<th>Historial de acciones</th>
							<th>Titulo</th>
                            <th>Fecha y hora</th>
                            <!-- <th colspan="2">Acciones
                                <a href="#" title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                    data-content="Sirven para Eliminar o modificar algun registros de la tabla.">
                                    <i class="fa fa-fw fa-question-circle pop-help text-white" style="font-size:1.3em;"></i>
                                </a>
                            </th> -->
                        </tr>
                    </thead>
                    <tbody id="bodyBitacora">
					
                   
                    </tbody>
				</table>
				


            </div>
            <!-- End of table -->

        </div>
	</div>

</div>
<!-- End content of page bitacoras-->

	
<!-- Start of modal for categories management -->
<!-- <div class="modal fade" id="agregarCategoria">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content"> -->

            <!-- Modal Header -->
            <!-- <div class="modal-header" id="formUs">
                <h4 class="modal-title" style="margin: 0% auto;" id="nuevo">Agregar una nueva bitacora</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> -->

            <!-- Modal body -->
            <!-- <div class="modal-body">

                <form id="formCategoria" >
                <input type="hidden" name="id" id="id_bitacora">

                <label for="nombre" class="mrg-spr-ex mt-2">Nombres de la bitacora: </label>	
                <input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre de la bitacora"
                class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,99}' maxlength="99" minlength="5" >

                <label for="descripcion" class="mrg-spr-ex mt-2">Descripcion de la bitacora:</label>
                <input type="text" name="descripcion" id="descripcion" placeholder="Escribe la descripcion del bitacora" 
				class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü# ]{1,199}' maxlength="199" minlength="5"> -->


				
				<!-- <div id="oculto">
				<label for="estado" class="mrg-spr-ex mt-3"><input type="checkbox" id="estado" value="1">Activar Estado:</label>
				</div> -->

			<!-- </div>
			<div class="text-danger text-center" id="mensaje"></div> -->
            <!-- Modal body -->

            <!-- Modal footer -->
            <!-- <div class="modal-footer" id="formUs2">
                <input type="submit"  class="btn btn-success" value="Guardar" id="guardarCategoria">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
                </form>
            </div> -->
            <!-- Modal footer -->

        <!-- </div>
    </div>
</div> -->
<!-- End of modal for categories management -->


<script src="<?= base_url('assets/js/bitacora.js')?>"></script>
<script src="<?= base_url('assets/js/paginator.js') ?>"></script>
