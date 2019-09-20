

    <!-- Start content -->
    <div class="content">

    <div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">CATEGORIA&nbsp; &nbsp;</h1>

                <!-- El boton para agregar a traves de un modal -->
                    <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#agregarCategoria" id="idModal">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo 
                    </button>

                    <a href="#" 
                            title="Agregar Categoria"  data-toggle="popover" data-trigger="focus"
                            data-content="Sirve para agregar un nuevo categoria al sistema.">
                        <i class="fa fa-fw fa-question-circle pop-help"></i>
                    </a>
                    

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">CATEGORIAS</li>
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
                        <th>Nombres Categoria</th>
                        <th>Descripcion Categoria</th>
                        <th colspan="2">Acciones
                            <a href="#" 
                                title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                data-content="Sirven para modificar informacion de una categoria del sistema o darlo de baja">
                            <i class="fa fa-fw fa-question-circle pop-help"></i>
                            </a>
                             
                        </th>
                    </tr>
                    </thead>
                    <tbody id="bodyCategoria">
					
                   
                   
                    </tbody>
                </table>
            </div>
        </div>
	</div>
	

	

	<div class="modal fade" id="agregarCategoria">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" id="formUs">
          <h4 class="modal-title" style="margin: 0% auto;" id="aggdct">Agregar un nuevo categoria</h4>
          <h4 class="modal-title" style="margin: 0% auto; display:none;" id="mdfdct">Modificar un categoria</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			
			<form id="formCategoria"  data-parsley-validate novalidate>
					<input type="hidden" name="id" id="id_categoria">

					<label for="nombre" class="mrg-spr-ex mt-2">Nombres de la categoria: </label>	
					<input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre de la categoria"
					class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

					<label for="descripcion" class="mrg-spr-ex mt-2">Descripcion de la categoria:</label>
					<input type="text" name="descripcion" id="descripcion" placeholder="Escribe la descripcion del categoria" 
					class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü# ]{1,128}'>
							
			</div>
										
        <!-- Modal footer -->
        <div class="modal-footer" id="formUs2">
                <input type="submit"  class="btn btn-success" value="Guardar" id="guardarCategoria">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
        </form>
		
        </div>
        
      </div>
    </div>
</div>

<script src="<?= base_url('assets/js/categoria.js')?>"></script>
