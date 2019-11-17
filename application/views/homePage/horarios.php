<!-- CKEditor -->
<script src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>

<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Horarios &nbsp; &nbsp;</h4>
            <button type="button" class="btn btn-outline-success mb-2 btn-rounded" data-toggle="modal" data-target="#modalForm" id="idModal">
                <span class='fa fa-plus-square-o bigfonts'></span> Nuevo registro
            </button>

            <a href="#" title="Agregar Categoria" data-toggle="popover" data-trigger="focus" data-content="Sirve para agregar una nueva categoría de publicación de blog al sistema y manejar así las categorías del blog.">
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

    <div class="col-12 col-sm-12 col-md-10 col-lg-8 row card mx-auto">
        <div class="card mx-auto responsive">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover display">
                        <thead class="text-white bg-clidesa-celeste">
                            <th>Horarios De Atención</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                        </thead>
                        <tbody id="horario-content">

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
                <h4 class="modal-title" id="nuevo">Contenido</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="fromSchedule">
                    <input type="hidden" name="id_publicacion" id="id_horario">

                    <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea name="contenido" id="contenido" required></textarea>
                        <script>
                            CKEDITOR.replace('contenido', {
                                height: 100,
                                language: 'es',
                                filebrowserUploadUrl: "<?= base_url('UploadImage') ?>",
                                filebrowserUploadMethod: 'form',
                                embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
                            });
                            CKEDITOR.on('instanceReady', function(e) {
                                // First time
                                e.editor.document.getBody().setStyle('background-color', '#00aeef');
                                // in case the user switches to source and back
                                e.editor.on('contentDom', function() {
                                    e.editor.document.getBody().setStyle('background-color', '#00aeef');
                                });
                            });
                        </script>
                    </div>
                    <div class="form-group" id="div-estado" style="display: none;">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado">
                            <option value="1">Visible</option>
                            <option value="0">Oculto</option>
                        </select>
                    </div>
            </div>
            <div class="text-danger text-center" id="mensaje"></div>
            <!-- Modal body -->

            <!-- Modal footer -->
            <div class="modal-footer" id="formUs2">
                <input type="submit" class="btn btn-success" value="Guardar" id="saveSchedule">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btnReset">Cancelar</button>
                </form>
            </div>
            <!-- Modal footer -->
        </div>
    </div>
</div>
<!-- End of modal for categories management -->

<script src="<?= base_url('assets/js/horario.js') ?>"></script>