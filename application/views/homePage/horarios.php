<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Horarios &nbsp; &nbsp;</h4>
            <button type="button" class="btn btn-outline-success mb-2 btn-rounded" data-toggle="modal" data-target="#modalForm" id="idModal">
                <span class='fa fa-plus-square-o bigfonts'></span> Nuevo 
            </button>

            <a href="#" title="Agregar Categoria"  data-toggle="popover" data-trigger="focus"
                    data-content="Sirve para agregar una nueva categoría de publicación de blog al sistema y manejar así las categorías del blog.">
                <i class="fa fa-fw fa-question-circle pop-help" style="font-size:1.3em;"></i>
            </a>
        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">Horarios</li>
                </ol>
            </div>
        </div>
    </div>

    <?php $this->load->view('components/toastMessages'); ?>

    <div class="col-8 row card mx-auto">
        <div class="card mx-auto">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover display">
                        <thead class="text-center">
                                <th>Horarios De Atención</th>
                                <th colspan="2" >Acciones</th>
                        </thead>
                        <tbody id="horario-content">
                            <tr>
                                <td class="align-middle">Lunes - Viernes</td>
                                <td class="align-middle"><button type="button" class="btn btn-warning">Editar</button></editar>
                                <td class="align-middle"><button type="button" class="btn btn-danger">Eliminar</button></editar>
                            </tr>
                            <tr>
                                <td>8:00AM - 12:30MD y 2:00PM - 5:30PM</td>
                                <td><button type="button" class="btn btn-warning">Editar</button></editar>
                                <td><button type="button" class="btn btn-danger">Eliminar</button></editar>
                            </tr>
                            <tr>
                                <td>Sábados</td>
                                <td><button type="button" class="btn btn-warning">Editar</button></editar>
                                <td><button type="button" class="btn btn-danger">Eliminar</button></editar>
                            </tr>
                            <tr>
                                <td>8:00AM - 12:30M</td>
                                <td><button type="button" class="btn btn-warning">Editar</button></editar>
                                <td><button type="button" class="btn btn-danger">Eliminar</button></editar>
                            </tr>
                            <tr>
                                <td>Domingos</td>
                                <td><button type="button" class="btn btn-warning">Editar</button></editar>
                                <td><button type="button" class="btn btn-danger">Eliminar</button></editar>
                            </tr>
                            <tr>
                                <td>Cerrado</td>
                                <td><button type="button" class="btn btn-warning">Editar</button></editar>
                                <td><button type="button" class="btn btn-danger">Eliminar</button></editar>
                            </tr>
                            <tr>
                                <td>15 Septiembre Cerrado por asueto</td>
                                <td><button type="button" class="btn btn-warning">Editar</button></editar>
                                <td><button type="button" class="btn btn-danger">Eliminar</button></editar>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Start of modal for categories management -->
<div class="modal fade" id="modalForm">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" id="formUs">
                <h4 class="modal-title" id="nuevo">Agregar nuevo contenido</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form id="fromSchedule" >
				<input type="hidden" name="id_publicacion" id="id_horario">

                <label for="contenido" class="mrg-spr-ex mt-2">Contenido: </label>	
                <input type="text" name="contenido" id="contenido" placeholder="Escribe el contenido del registro"
				class="form-control vinput" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü0-9 ]{1,1500}' maxlength="1500" minlength="2" >
			</div>
			<div class="text-danger text-center" id="mensaje"></div>
            <!-- Modal body -->

            <!-- Modal footer -->
            <div class="modal-footer" id="formUs2">
                <input type="submit"  class="btn btn-success" value="Guardar" id="saveSchedule">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
                </form>
            </div>
            <!-- Modal footer -->
        </div>
    </div>
</div>
<!-- End of modal for categories management -->

<script src="<?= base_url('assets/js/horario.js')?>"></script>