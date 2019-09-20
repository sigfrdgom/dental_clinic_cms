
    <!-- Start content -->
    <div class="content">

    <div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">CITAS&nbsp; &nbsp;</h1>

                <!-- El boton para agregar a traves de un modal -->
                    <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#agregarCita" id="idModal">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo 
                    </button>

                    <a href="#" 
                            title="Agregar Cita"  data-toggle="popover" data-trigger="focus"
                            data-content="Sirve para agregar un nuevo cita al sistema.">
                        <i class="fa fa-fw fa-question-circle pop-help"></i>
                    </a>
                    

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">CITAS</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

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
                                    aria-label="Busqueda"
                                    aria-describedby="basic-addon1">
                        </div>
                    </div>
               
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover display" id="ajaxTabla">
                    <thead>
                    <tr>
                        <!-- <th class='secret'>ID</th> -->
                        <th>Nombre Completo</th>
						<th>Telefono</th>
						<th>E-mail</th>
						<th>Padecimiento</th>
						<th>Procedimiento</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Comentario</th>
						
                        <th colspan="2">Acciones
                            <a href="#" 
                                title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                data-content="Sirven para modificar informacion de una cita del sistema o darlo de baja">
                            <i class="fa fa-fw fa-question-circle pop-help"></i>
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
	

	

	<div class="modal fade" id="agregarCita">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" id="formUs">
          <h4 class="modal-title" style="margin: 0% auto;" id="aggdct">Agregar una nueva cita</h4>
          <h4 class="modal-title" style="margin: 0% auto; display:none;" id="mdfdct">Modificar una cita</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			
			<form id="formCita"  data-parsley-validate novalidate>
					<input type="hidden" name="id" id="id_cita">

					<label for="nombre" class="mrg-spr-ex mt-2">Nombre de la persona: </label>	
					<input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre de la cita"
					class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

					<label for="apellido" class="mrg-spr-ex mt-2">Apellido de la persona: </label>	
					<input type="text" name="apellido" id="apellido" placeholder="Escribe el apellido de la cita"
					class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>
					
					<label for="telefono" class="mrg-spr-ex mt-2">Telefono: </label>	
					<input type="text" name="telefono" id="telefono" placeholder="Escribe el telefono de la cita"
					class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,9}'>

					<label for="email" class="mrg-spr-ex mt-2">E-mail: </label>	
					<input type="text" name="email" id="email" placeholder="Escribe el e-mail de la cita"
					class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

					<label for="padecimientos" class="mrg-spr-ex mt-2">Padecimientos:</label>
					<input type="text" name="padecimientos" id="padecimientos" placeholder="Escribe una breve descripcion del padecimiento" 
					class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü# ]{1,128}'>
					
					<label for="procedimiento" class="mrg-spr-ex mt-2">Procedimiento:</label>
					<input type="text" name="procedimiento" id="procedimiento" placeholder="Escribe una breve descripcion del procedimiento" 
					class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü# ]{1,128}'>

					<label for="fecha" class="mrg-spr-ex mt-2">Fecha de la cita:</label>
                    <input type="date" name="fecha" id="fecha" placeholder="Fecha de la cita:DD/MM/AAAA" class="form-control" required>
                        <!-- min="<?php // echo  date("Y-m-d",strtotime(date("Y-m-d")."- 65 year  -3 month"));?>" 
                        max="<?php //echo  date("Y-m-d",strtotime(date("Y-m-d")."- 18 year  -3 month"));?>"> -->

					<label for="hora" class="mrg-spr-ex mt-2">Hora de la cita:</label>
                    <input type="time" name="hora" id="hora" placeholder="Ingrese la hora de la cita" class="form-control" required>


					<label for="comentario" class="mrg-spr-ex mt-2">Comentario:</label>
					<input type="text" name="comentario" id="comentario" placeholder="Escribe un comentario de la cita" 
					class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü# ]{1,128}'>
							
			</div>
										
        <!-- Modal footer -->
        <div class="modal-footer" id="formUs2">
                <input type="submit"  class="btn btn-success" value="Guardar" id="guardarCita">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
        </form>
		
        </div>
        
      </div>
    </div>
</div>

<script src="<?= base_url('assets/js/cita.js')?>"></script>
