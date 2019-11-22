<!-- CKEditor -->
<!-- <script src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script> -->

<style>
.dropify-wrapper .dropify-preview .dropify-render img {
    background:#1f618d;
        background: #457fca86; 
        background: -webkit-linear-gradient(to right, #00afef81, #1b567ed0); 
        background: linear-gradient(to right, #00afef81, #1b567ed0);   
}
</style>

<div class="card ">
    <div class="card-body">
    
        <div class="form-group col-10 col-sm-12 col-md-6 col-lg-5 mx-auto">
        <h4 class="card-title">Selecciona el icono a utilizar</h4>
        <label for="input-file-to-destroy">El icono que elegijas </label>
        <input type="file" id="input-file-to-destroy" class="dropify" style="background: #000 !important" name="recurso1" accept=".bmp, .gif, .jpeg, .jpg, .jpe, .png, .svg, .tiff, .tif" data-default-file="<?= !empty($image->recurso_av_1) ? base_url('uploads/inicio/') . $image->recurso_av_1 : '' ?>" data-allowed-file-extensions="bmp gif jpeg jpg jpe png svg tiff tif" data-max-file-size="5M" data-height="300"  data-max-height="8000" data-max-width="8000" />
        <br />
        <!-- <script>
            window.addEventListener('load', listener);
            function listener(){
                document.getElementById('input-file-to-destroy').style.background = "#000 !important";
            }
        </script> -->
        </div>

        <div class="form-group col-10 mx-auto">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" value="<?= isset($image->titulo) ? $image->titulo : '' ?>" name="titulo" id="" aria-describedby="helpId" maxlength="100" placeholder="Título de la Imágen">
        </div>

        <?php if (isset($image->estado)) { ?>
            <div class="form-group mt-2 col-10 mx-auto">
                <label for="estado">Estado</label>
                <select name="estado" id="" class="form-control" required>
                    <option value="1" <?= ($image->estado) ? 'selected' : '' ?>>Visible</option>
                    <option value="0" <?= ($image->estado) ? '' : 'selected' ?>>Oculto</option>
                </select>
            </div>
        <?php } ?>

    </div>

    <div class="row p-3">
        <button type="submit" id="btn-save" class="btn btn-primary mx-auto">Guardar</button>
    </div>
</div>