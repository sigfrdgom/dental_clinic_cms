<link href="<?php echo base_url('assets/css/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet" />
<link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
<link href="<?= base_url('assets/css/clidesa.css')?>" rel="stylesheet">

<body class="bg-login">

<div class="container-fluid h-100">
    <div class="row align-items-center h-100">
        <div class="col-12 col-sm-10 col-md-10 col-lg-6 col-xl-4 mx-auto ">
            <div class="text-center bg-white border border-primary rounded">
                
                <div class="py-5">
                    <i class="fa fa-user-circle-o" style="font-size:10em; color: #00aeef"></i>
                </div>

                <div class="pt-2">
                    <h3>Iniciar sesión</h3>
                </div>
                
                <div class="pb-5 pt-3 my-3 px-3">
                    <form class="login100-form validate-form"  id="formu" method="POST" action="<?= base_url('usuario_controller/loginUp')?>" >
                        <div class="mx-5 my-5">
                            <div class="input-group validate-input" data-validate = "Ingrese usuario">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fa fa-user text-white" style="font-size:1.8em;"></i></div>
                                </div>
                                <input type="text" name="usuario" id="usuario" class="form-control vlogin"  pattern='[a-zA-z0-9]{1,14}.[a-zA-Z0-9]{1,14}' placeholder="Usuario" required>
                            </div>
                        </div>

                        <div class="mx-5 my-5">
                            <div class="input-group validate-input" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fa fa-lock text-white" style="font-size:1.8em;"></i></div>
                                </div>
                                <input type="password" class="form-control vlogin" name="pass" id="pass" placeholder="Contraseña" required data-validate = "La contraseña es requerida">
                            </div>
                        </div>
                        
                        <div class=" mx-5 px-5 mb-3 mt-4 text-center">
                            <input class="btn btn-info btn-block" type="submit" value="Iniciar Sesión" name="validando">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

</body>



