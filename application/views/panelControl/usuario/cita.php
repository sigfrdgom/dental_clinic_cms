<!-- Import Fontaesome 5 but the time of load is so slow -->
<script src="https://kit.fontawesome.com/3b0ecff6a4.js" crossorigin="anonymous"></script>

<!-- Start content of page citas-->
<div class="container-fluid">

    <div class="row page-titles pt-2 pb-0" style="background: white" >
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor text-dark float-left mt-2">SOLICITUDES DE CITAS&nbsp; &nbsp;</h4> 

            <!-- <button type="button" class="btn btn-outline-success mb-2 btn-rounded" data-toggle="modal" data-target="#agregarCita" id="idModal">
                <span class='fa fa-plus-square-o bigfonts'></span> Nuevo 
            </button> -->

            <a href="#"  title="Agregar Cita"  data-toggle="popover" data-trigger="focus"
                    data-content="Este apartado sirve para gestionar las solicitudes de citas realizadas en el sistema y poder aceptarlas o rechazarlas, así mismo provee mecanismos para comunicarse de una manera rápida con el cliente y responder a su solicitud.">
                <i class="fa fa-fw fa-question-circle pop-help" style="font-size:1.3em;"></i>
            </a>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">SOLICITUDES DE CITAS</li>
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
                            <th>Nombre Completo</th>
                            <!-- <th>Telefono</th>
                            <th>E-mail</th> -->
                            <!-- <th>Padecimiento</th> -->
                            <th>Procedimiento solicitado</th>
                            <th>Fecha Solicitada</th>
                            <th>Hora Solicitada</th>
                            <!-- <th>Comentario</th> -->
                            <th colspan="2">Acciones
                                <a href="#" 
                                    title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                    data-content="Sirven para modificar informacion de una cita del sistema o darlo de baja">
                                    <i class="fa fa-fw fa-question-circle pop-help text-white"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="bodyCita">
					
                    </tbody>
                </table>
            </div>
        </div>
	</div>

</div>
<!-- End content of page citas-->


<!-- Start of modal for cita management -->
<div class="modal fade" id="agregarCita">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" id="formUs">
                <h4 class="modal-title" style="margin: 0% auto;" id="aggdct">Agregar una nueva cita</h4>
                <h4 class="modal-title" style="margin: 0% auto; display:none;" id="mdfdct">Modificar una cita</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Header -->
            
            <!-- Modal body -->
            <div class="modal-body">
                <form id="formCita"  data-parsley-validate novalidate>
                    <input type="hidden" name="id" id="id_cita">

                    <label for="nombre" class="mrg-spr-ex mt-2 font-weight-bold">Nombre de la persona: </label>	
                    <input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre de la cita"
                    class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                    <label for="apellido" class="mrg-spr-ex mt-2 font-weight-bold">Apellido de la persona: </label>	
                    <input type="text" name="apellido" id="apellido" placeholder="Escribe el apellido de la cita"
                    class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>
                    
                    <label for="telefono" class="mrg-spr-ex mt-2 font-weight-bold">Telefono: </label>	
                    <input type="text" name="telefono" id="telefono" placeholder="Escribe el telefono de la cita"
                    class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,9}'>

                    <label for="email" class="mrg-spr-ex mt-2 font-weight-bold">E-mail: </label>	
                    <input type="text" name="email" id="email" placeholder="Escribe el e-mail de la cita"
                    class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                    <label for="padecimientos" class="mrg-spr-ex mt-2 font-weight-bold">Padecimientos:</label>
                    <input type="text" name="padecimientos" id="padecimientos" placeholder="Escribe una breve descripcion del padecimiento" 
                    class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü# ]{1,128}'>
                    
                    <label for="procedimiento" class="mrg-spr-ex mt-2 font-weight-bold">Procedimiento:</label>
                    <input type="text" name="procedimiento" id="procedimiento" placeholder="Escribe una breve descripcion del procedimiento" 
                    class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü# ]{1,128}'>

                    <label for="fecha" class="mrg-spr-ex mt-2 font-weight-bold">Fecha de la cita:</label>
                    <input type="date" name="fecha" id="fecha" placeholder="Fecha de la cita:DD/MM/AAAA" class="form-control" required>
                        <!-- min="<?php // echo  date("Y-m-d",strtotime(date("Y-m-d")."- 65 year  -3 month"));?>" 
                        max="<?php //echo  date("Y-m-d",strtotime(date("Y-m-d")."- 18 year  -3 month"));?>"> -->

                    <label for="hora" class="mrg-spr-ex mt-2 font-weight-bold">Hora de la cita:</label>
                    <input type="time" name="hora" id="hora" placeholder="Ingrese la hora de la cita" class="form-control vinput" required>

                    <label for="comentario" class="mrg-spr-ex mt-2 font-weight-bold">Comentario:</label>
                    <input type="text" name="comentario" id="comentario" placeholder="Escribe un comentario de la cita" 
                    class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü# ]{1,128}'>
                                
            </div>
            <!-- Modal body -->

                                            
            <!-- Modal footer -->
            <div class="modal-footer" id="formUs2">
                    <input type="submit"  class="btn btn-success" value="Guardar" id="guardarCita">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
                </form>
            </div>
            <!-- Modal footer -->
        
        </div>
    </div>
</div>
<!-- End of modal for cita management -->

<!-- Start of modal for cita contact -->
<div class="modal fade" id="contactarCita">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" id="formUs">
                <h4 class="modal-title" style="margin: 0% auto;" id="aggdct">Contactar al solicitante de cita</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Header -->
            
            <!-- Modal body -->
            <div class="modal-body">
                <form id="formCita"  data-parsley-validate novalidate>
                    <input type="hidden" name="id" id="id_cita_cct">

                    <div class="row">
                        <div class="col-12">
                            <span class="mt-3 font-weight-bold">Nombre del remitente:</span><br>
                            <span class="mt-3" id="nombre_cct"></span>
                        </div>
                        <div class="col-12 mt-3">
                            <span class="mt-3 font-weight-bold">Comentario de cita:</span>
                        </div>
                        <div class="col-12">
                            <p class="mt-2" id="comentario_cct"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class="font-weight-bold">Padecimientos:</span><br>
                            <span id="padecimientos_cct"></span>
                        </div>
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class="font-weight-bold">Procedimiento:</span><br>
                            <span id="procedimiento_cct"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class="font-weight-bold">Fecha solicitada:</span><br>
                            <input type="date" name="fecha" id="fecha_cct" placeholder="Fecha de la cita:DD/MM/AAAA" class="form-control" readonly required>
                        </div>
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class="font-weight-bold">Hora Solicitada:</span><br>
                            <input type="time" name="hora" id="hora_cct" placeholder="Ingrese la hora de la cita" class="form-control" readonly required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class="font-weight-bold">Telefono:</span><br>
                            <span id="telefono_cct"></span>
                        </div>
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class="font-weight-bold">Email:</span><br>
                            <span id="email_cct"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class=" font-weight-bold">Recibido:</span><br>
                            <span class="" id="fecha_solicitud_cct"></span>
                        </div>
                        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <span class=" font-weight-bold">Estado:</span><br>
                            <span  id="estado_cct"></span>
                        </div>
                    </div>

                    <div class="row mt-5 text-center">
                        <div class="col-4">
                            <a href="" target="_blank" id="sendmail_cita"><i class="fa fa-reply" style="font-size:3em;"></i></a>
                            <br>Enviar E-Mail
                        </div>
                        <div class="col-4">
                            <a href="" target="_blank" id="sendwhats_cita"><i class="fab fa-whatsapp" style="font-size:3em;"></i></a>
                            <br>Enviar Mensaje
                        </div>
                        <div class="col-4">
                            <a href="" target="_blank" id="sendcall_cita"><i class="fa fa-phone" style="font-size:3em;"></i></a>
                            <br>Llamar a cliente
                        </div>
                    </div>                   
            </div>
            <!-- Modal body -->

                                            
            <!-- Modal footer -->
            <div class="modal-footer" id="formUs2">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
                </form>
            </div>
            <!-- Modal footer -->
        
        </div>
    </div>
</div>
<!-- End of modal for cita contact -->


<script src="<?= base_url('assets/js/cita.js')?>"></script>
