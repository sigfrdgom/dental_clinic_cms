<!-- Start content of page usuarios-->
<div class="container-fluid">

    <div class="row page-titles pt-2 pb-0" style="background: white" >
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor text-dark float-left mt-2">USUARIOS &nbsp; &nbsp;</h4> 

            <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#agregarUsuario" id="idModal">
                <span class='fa fa-plus-square-o bigfonts'></span> Nuevo usuario
            </button>

            <a href="#" 
                    title="Agregar Usuario"  data-toggle="popover" data-trigger="focus"
                    data-content="Sirve para agregar un nuevo usuario al sistema.">
                <i class="fa fa-fw fa-question-circle pop-help"></i>
            </a>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">USUARIOS</li>
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
                        
                        <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda" data-id-curso="<?php // echo $datos['id_docente'] ?>"
                            aria-label="Busqueda" aria-describedby="basic-addon1">

                    </div>
                </div>
            </div>
            <!-- End of search box of table -->

            <!-- Start of table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover display" id="ajaxTabla">
                    <thead>
                        <tr>
                            <!-- <th class='secret'>ID</th> -->
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Nombre de Usuario</th>
                            <th>Tipo de Usuario</th>
                            <!-- <th class='secret'>Password</th> -->
                            <th>Estado</th>
                            <th colspan="2">Acciones
                                <a href="#" 
                                    title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                    data-content="Sirven para modificar informacion de un usuario del sistema o darlo de baja">
                                    <i class="fa fa-fw fa-question-circle pop-help"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="bodyUsuario">
                    
                
                
                    </tbody>
                </table>
            </div>
            <!-- End of table -->
        
        </div>
        
    </div>
</div>
<!-- End content of page usuarios-->

<!-- Start of modal for user management -->
<div class="modal fade" id="agregarUsuario">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">

            <!-- Start Modal Header -->
            <div class="modal-header" id="formUs">
                <h4 class="modal-title font-weight-bold" style="margin: 0% auto;" id="aggdct">Agregar un nuevo usuario</h4>
                <h4 class="modal-title font-weight-bold" style="margin: 0% auto; display:none;" id="mdfdct">Modificar un usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- End Modal Header -->

            <!-- Start Modal body -->
            <div class="modal-body">
                <!-- Start of form in modal -->
                <form id="formUsuario"  data-parsley-validate novalidate>
                    
                    <input type="hidden" name="id" id="id_usuario">

                    <label for="dnombres" class="mrg-spr-ex mt-3 font-weight-bold">Nombres del usuario: </label>
                    <input type="text" name="nombres" id="nombres" placeholder="Escribe los nombres del usuario" 
                    class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                    <label for="dapellidos" class="mrg-spr-ex mt-3 font-weight-bold">Apellidos del usuario:</label>
                    <input type="text" name="apellidos" id="apellidos" placeholder="Escribe los apellidos del usuario" 
                    class="form-control " required pattern='[a-zA-zÑnÁÉÍÓÚáéíóúü ]{1,64}'> 

                    <label for="dnombres" class="mrg-spr-ex mt-3 font-weight-bold">Nombres del usuario: </label>
                    <input type="text" name="usuario" id="usuario" placeholder="Escribe el nombre del usuario" 
                    class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                    <label for="ppass" class="mrg-spr-ex mt-3 font-weight-bold">Ingresa un password para el usuario:</label>
                    <a href="#" title="Sobre password"  data-toggle="popover" data-trigger="focus"
                        data-content="Ingresa un password que sea seguro, que lleve mayusculas y minisculas, algunos caracteres especiales estan permitidos">
                    <i class="fa fa-fw fa-question-circle pop-help"></i>
                    </a>
                    <input type="password" name="pass" id="pass" placeholder="Escribe un password para el usuario" 
                    class="form-control pad-extra-input" required pattern='[0-9a-zA-Z]{1,20}'>

                    <label class="mrg-spr-ex mt-3 font-weight-bold" >Tipo de usuario:</label>
                    <div style="margin-left:2em;">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tipo_usuario" id="tipo1" value="Administrador" required>
                            Administrador
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tipo_usuario" id="tipo2" value="Generador de contenido" required>
                            Generador de contenido
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tipo_usuario" id="tipo3" value="Usuario normal" required checked>
                            Usuario normal
                            </label>
                        </div>         
                    </div>

                    <div id="oculto" hidden="true">
                    <label class="mrg-spr-ex mt-2 font-weight-bold" >Estado:</label>
                        <div style="margin-left:2em;">
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

            </div>
            <!-- End Modal body -->

            <!-- Start Modal footer -->
            <div class="modal-footer" id="formUs2">
                <input type="submit"  class="btn btn-success" value="Guardar" id="guardarUsuario">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
                </form>
                <!-- End of form in modal -->
            </div>
            <!-- End Modal footer -->

        </div>
    </div>
</div>
<!-- End of modal for user management -->
	
<!-- JS file for this view -->
<script src="<?= base_url('assets/js/usuario.js')?>"></script>