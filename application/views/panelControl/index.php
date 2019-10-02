<div class="container-fluid">
               
    <div class="row page-titles" style="background: #009ffb3f" >
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor text-dark">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb text-dark">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item">></li>
                    <li class="breadcrumb-item active">DASHBOARD</li>
                </ol>
            </div>
        </div>
    </div>

              
    <div class="row">
        
        <!-- Messages received from web page -->
        <div class="col-lg-6">
            <div class="card" style="background: #42baff62">
                <div class="card-body">
                    <h5 class="card-title text-dark">Mensajes recibidos.</h5>
                    <!-- Div container for messages -->
                    <div class="steamline m-t-40" id="msg_inbox">
                    </div>
                    <!-- Div container for messages -->
                </div>
            </div>
        </div>
        <!-- Messages received from web page -->

        <!-- Appointment request from webpage -->
        <div class="col-lg-6">
            <div class="card" style="background: #42baff56">
                <div class="card-body">
                    <h5 class="card-title text-dark">Solicitudes de cita no procesadas.</h5>
                    <div class="message-box">
                        <!-- Div container for appointment request -->
                        <div class="message-widget message-scroll mt-5" id="cita_inbox">       
                        +
                        </div>
                        <!-- Div container for appointment request -->
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Start of modal for contact clients -->
<div class="modal fade" id="contactarMsg">
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
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Salir</button>
                </form>
            </div>
            <!-- Modal footer -->
            
        </div>
    </div>
</div>
<!-- Start of modal for contact clients -->


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

<script src="<?= base_url('assets/js/dash.js')?>"></script>    