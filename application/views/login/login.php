
<div class="limiter">
    <div class="container-login100">


        <div class="wrap-login100">
            <div class="div-completo">
                <label>BIENVENIDOS A CLIDESA</label>
            </div>
            <!-- <form class="login100-form validate-form"> -->
            <form class="login100-form validate-form"  id="formu" method="POST" action="<?= base_url('usuario_controller/loginUp')?>" data-parsley-validate novalidate >

					<span class="login100-form-title">
						Iniciar Sesión
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Ingrese usuario">
                    <input class="input100" type="text" name="usuario" id="usuario" placeholder="USUARIO">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
                    <input class="input100" type="password" name="pass" id="pass" placeholder="PASSWORD">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>


                <div class="container-login100-form-btn">
                    <input class="login100-form-btn" type="submit" value="Iniciar" name="validando">
    
                </div>

                <div class="text-center p-t-12">
                </div>

                <div class="text-center p-t-136">
                </div>
            </form>
        </div>
    </div>
</div>

