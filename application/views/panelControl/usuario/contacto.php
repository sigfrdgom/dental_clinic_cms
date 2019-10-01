<!-- Start content of page contacto-->
<div class="container-fluid">

    <div class="row page-titles pt-2 pb-0" style="background: white" >
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor text-dark float-left mt-2">MENSAJES&nbsp; &nbsp;</h4> 

            <button type="button" class="btn btn-outline-success mb-2 btn-rounded" data-toggle="modal" data-target="#agregarContacto" id="idModal">
                <span class='fa fa-plus-square-o bigfonts'></span> Nuevo 
            </button>

            <a href="#" title="Agregar Contacto"  data-toggle="popover" data-trigger="focus"
                data-content="Este apartado tiene como función gestionar los mensajes recibidos a través del sitio web, y brinda una 
                respuesta personalizada al cliente.">
                <i class="fa fa-fw fa-question-circle pop-help" style="font-size:1.2em;"></i>
            </a>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">MENSAJES</li>
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
                                data-id-curso="<?php // echo $datos['id_docente'] ?>"
                                aria-label="Busqueda" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover display" id="ajaxTabla">
                    <thead class="text-white bg-clidesa-celeste">
                        <tr>
                            <!-- <th class='secret'>ID</th> -->
                            <th>Nombre del contacto</th>
                            <!-- <th>Telefono</th>
                            <th>E-mail</th> -->
                            <th>Comentario</th>
                            <th>Fecha</th>
                            <!-- <th>Estado</th> -->
                            
                            <th colspan="2">Acciones
                                <a href="#" title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                    data-content="Sirven para modificar informacion de una contacto del sistema o darlo de baja">
                                    <i class="fa fa-fw fa-question-circle pop-help text-white" style="font-size:1.2em;"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="bodyContacto">
					
                   
                   
                    </tbody>
                </table>
            </div>

        </div>
	</div>

</div>
<!-- End content of page contacto-->


<!-- Start of modal for contacto management -->
<div class="modal fade" id="agregarContacto">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header" id="formUs">
                <h4 class="modal-title" style="margin: 0% auto;" id="aggdct">Agregar un nuevo contacto</h4>
                <h4 class="modal-title" style="margin: 0% auto; display:none;" id="mdfdct">Modificar un contacto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Header -->
            
            <!-- Modal body -->
            <div class="modal-body">
                <form id="formContacto" data-parsley-validate novalidate>
                    <input type="hidden" name="id" id="id_contacto">

                    <label for="nombre" class="mrg-spr-ex mt-3 font-weight-bold">Nombre del contacto: </label>	
                    <input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre de la contacto"
                    class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                    <!-- <label for="apellido" class="mrg-spr-ex mt-3 font-weight-bold">Apellido del contacto: </label>	
                    <input type="text" name="apellido" id="apellido" placeholder="Escribe el apellido de la contacto"
                    class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'> -->
                    
                    <label for="telefono" class="mrg-spr-ex mt-3 font-weight-bold">Telefono: </label>	
                    <input type="text" name="telefono" id="telefono" placeholder="Escribe el telefono para contacto"
                    class="form-control vinput" required pattern='[0-9()+-]{7,16}'>

                    <label for="email" class="mrg-spr-ex mt-3 font-weight-bold">E-mail: </label>	
                    <input type="email" name="email" id="email" placeholder="Escribe el e-mail para contacto"
                    class="form-control vinput" required max="50">

                    <label for="comentario" class="mrg-spr-ex mt-3 font-weight-bold">Comentario:</label>
                    <input type="text" name="comentario" id="comentario" class="form-control vinput" rows="3"
                    placeholder="Escribe un comentario para el contacto" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü#0-9 ]{1,1024}'>
                        
            </div>
            <!-- Modal body -->
                                            
            <!-- Modal footer -->
            <div class="modal-footer" id="formUs2">
                    <input type="submit"  class="btn btn-success" value="Guardar" id="guardarContacto">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
                </form>
            </div>
            <!-- Modal footer -->
            
        </div>
    </div>
</div>
<!-- Start of modal for contacto management -->

<!-- Start of modal for contact clients -->
<div class="modal fade" id="contactarContacto">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header" id="formUs">
                <h4 class="modal-title" style="margin: 0% auto;" id="aggdct">Contactar al cliente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Header -->
            
            <!-- Modal body -->
            <div class="modal-body">
                <form id="formContacto" data-parsley-validate novalidate>
                    <input type="hidden" name="id" id="id_contacto_contacto">

                    <div class="row">
                        <div class="col-12">
                            <span class="mt-3 font-weight-bold">Nombre del remitente:</span><br>
                            <span class="mt-3" id="nombre_contacto"></span>
                        </div>
                        <div class="col-12 mt-3">
                            <span class="mt-3 font-weight-bold">Comentario o duda:</span>
                        </div>
                        <div class="col-12">
                            <p class="mt-2" id="comentario_contacto"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class="font-weight-bold">Telefono:</span><br>
                            <span id="telefono_contacto"></span>
                        </div>
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class="font-weight-bold">Email:</span><br>
                            <span id="email_contacto"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class=" font-weight-bold">Recibido:</span><br>
                            <span class="" id="fecha_contacto"></span>
                        </div>
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class=" font-weight-bold">Estado:</span><br>
                            <span  id="estado_contacto"></span>
                        </div>
                    </div>
                    <div class="row mt-5 text-center">
                        <div class="col-4">
                            <a href="" target="_blank" id="sendmail_contacto"><i class="fa fa-reply" style="font-size:3em;"></i></a>
                            <br>Enviar E-Mail
                        </div>
                        <div class="col-4">
                            <a href="" target="_blank" id="sendwhats_contacto"><i class="fab fa-whatsapp" style="font-size:3em;"></i></a>
                            <br>Enviar Mensaje
                        </div>
                        <div class="col-4">
                            <a href="" target="_blank" id="sendcall_contacto"><i class="fa fa-phone" style="font-size:3em;"></i></a>
                            <br>Llamar a cliente
                        </div>
                    </div>
                    
                        
            </div>
            <!-- Modal body -->
                                            
            <!-- Modal footer -->
            <div class="modal-footer" id="formUs2">
                    <!-- <input type="submit"  class="btn btn-success" value="Guardar" id="guardarContacto"> -->
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
                </form>
            </div>
            <!-- Modal footer -->
            
        </div>
    </div>
</div>
<!-- Start of modal for contact clients -->

<script src="<?= base_url('assets/js/contacto.js')?>"></script>
