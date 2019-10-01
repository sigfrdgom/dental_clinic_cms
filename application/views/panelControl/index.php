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
                    <h5 class="card-title text-dark">Mensajes</h5>
    
                    <div class="steamline m-t-40" id="msg_inbox">

                        <!-- Message item -->
                        <!-- <div class="sl-item bg-white">
                            <div class="sl-left bg-info">
                                <i class="fa fa-user mt-1" style="font-size:2em;"></i>
                            </div>
                            <div class="sl-right">
                                <div class="font-medium pt-3">
                                    Name person
                                    <br>
                                    <span class="sl-date">Date</span>
                                </div>
                                <div class="desc">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem quisquam mollitia perferendis voluptas 
                                    doloremque aliquam expedita nostrum dignissimos incidunt, iusto tempora accusamus dolorem at placeat 
                                    officia ex pariatur illo deleniti?
                                    <br>
                                    <button class="btn m-t-10 m-r-5 btn-rounded btn-success">Responder</button>
                                    <button class="btn m-t-10 btn-rounded btn-danger">Rechazar</button>
                                </div>
                            </div>
                        </div> -->
                        <!-- Message item -->


                    </div>

                </div>
            </div>
        </div>
        <!-- Messages received from web page -->


        <!-- ============================================================== -->
        <!-- Received messages -->
        <!-- ============================================================== -->
        <div class="col-lg-6">
            <div class="card" style="background: #42baff56">
                <div class="card-body">
                    <h5 class="card-title text-dark">Solicitudes de cita</h5>
                    <div class="message-box">
                        <div class="message-widget message-scroll mt-5" id="cita_inbox">
                            
                            <!-- request for appointment -->
                            <!-- <div class="bg-white p-4 my-2" style="border-radius: 10px;"> -->
                                <!-- <div class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div> -->
                                <!-- <div class="mail-contnet">
                                    <h5 class="text-dark">John Doe</h5>
                                    <span class="mail-desc text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem deleniti iure quaerat culpa et ea dolore nulla nisi? </span>
                                    <br>
                                    <div class="mt-2 mb-1">
                                        <span class="font-medium">Fecha Solicitada</span>
                                        <span class="time">12-11-2019</span> 
                                        <br>
                                        <span class="font-medium">Hora Solicitada</span>
                                        <span class="time">9:00 AM</span>
                                    </div> 
                                        <button class="btn m-t-10 m-r-5 btn-rounded btn-success">Responder solicitud</button>
                                        <button class="btn m-t-10 btn-rounded btn-danger">Rechazar Solicitud</button> 
                                </div>
                            </div> -->
                            <!-- request for appointment -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="<?= base_url('assets/js/dash.js')?>"></script>