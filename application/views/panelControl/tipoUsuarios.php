<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Tipos de Usuarios&nbsp;</h1>
                    <!-- El boton para agregar a traves de un modal -->
                    <button id="btnTipoModulo" type="button" class="btn btn-outline-success" data-toggle="modal"
                            data-target="#agregarTipoUsuario">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo Tipo Usuario
                    </button>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Inicio</li>
                        <li class="breadcrumb-item active">Tipos de usuarios</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">

            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover display">
                        <thead>
                        <tr>
							<!-- <th class='secret'>ID</th> -->
                            <th>Nombre del Tipo de Usuario</th>
                            <th>Descripción</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                        </thead>
                        <tbody id="tbody-table">
                        
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="modal fade" id="agregarTipoUsuario">
                <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0% auto;" id="aggTipoUsuario">Agregar un nuevo Tipo de
                                Usuario</h4>
                            <h4 class="modal-title" style="margin: 0% auto; display:none;" id="mdfTipoUsuario">Modificar un Tipo de
                                Usuario</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST" id="frmTipoUsuario" data-parsley-validate novalidate>


								<input type="hidden" id="id_tipoUsuario" name="id_tipoUsuario">
								
                                <div class="form-group">
                                    <label for="nombreTipoUsuario">Nombre del Tipo de Usuario<span
                                                class="text-danger">*</span></label>
                                    <input type="text" name="nombreTipoUsuario" data-parsley-trigger="change" required
                                           placeholder="Ingrese el nombre del tipo de usuario" class="form-control"
                                           id="tipoUsuario">
                                </div>

                                <div class="form-group">
                                    <label for="descripcion" class="mrg-spr-ex">Descripcion:</label>
									<input type="text" name="descripcion" id="descripcion" placeholder="Escribe una descripcion" 
									class="form-control " pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü,. ]{1,128}'>
								</div>


								
										
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Guardar" name="guardar_tipoUsuario">
                            </form>
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>

                    </div>

                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content --
