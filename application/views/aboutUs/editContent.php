<!-- CKEditor -->
<script src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>

<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Página de Sobre Nosotros &nbsp; &nbsp;</h4>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">Página de Sobre Nosotros</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row card col-12 col-sm-12 col-md-10 col-lg-8 mx-auto p-2">
        <form action="<?= base_url('aboutUs/guardarDatos/' . $acercade->id_estatico) ?>" method="post" enctype="multipart/form-data">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 mx-auto p-2">
                <h2 class="text-center">Modificar Contenido</h2>
                <div class="form-group mt-2">
                    <label for="titulo">Titulo de la publicación</label>
                    <input type="text" class="form-control" value="<?= isset($acercade->titulo) ? $acercade->titulo : '' ?>" name="titulo" id="" maxlength="50" placeholder="" required>
                </div>
                <?php if (isset($acercade->estado)) { ?>
                    <div class="form-group mt-2">
                        <label for="estado">Estado</label>
                        <select name="estado" id="" class="form-control" required>
                            <option value="1" <?= ($acercade->estado) ? 'selected' : '' ?>>Visible</option>
                            <option value="0" <?= ($acercade->estado) ? '' : 'selected' ?>>Oculto</option>
                        </select>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="contenido">Contenido</label>
                    <textarea name="contenido" id="editor" required><?= isset($acercade->contenido) ? $acercade->contenido : '' ?></textarea>
                    <script>
                        CKEDITOR.replace('editor', {
                            height: 350,
                            language: 'es',
                            filebrowserUploadUrl: "<?= base_url('UploadImage') ?>",
                            filebrowserUploadMethod: 'form',
                            embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
                        });
                    </script>
                </div>
                <div class="row">
                    <button type="submit" id="btn-save" class="btn btn-primary mx-auto">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>