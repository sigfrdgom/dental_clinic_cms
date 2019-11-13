<div class="card ">
    <div class="card-body">
        <h4 class="card-title">Selecciona la imagen a utilizar</h4>
        <label for="input-file-to-destroy">La imagen que elegijas aparecerá el carousel de la página de inicio</label>
        <input type="file" id="input-file-to-destroy" class="dropify" name="recurso1" 
        accept=".bmp, .gif, .jpeg, .jpg, .jpe, .png, .tiff, .tif"
        data-default-file="<?= !empty($image->recurso_av_1) ? base_url('uploads/inicio/').$image->recurso_av_1 : '' ?>" 
        data-allowed-file-extensions="bmp gif jpeg jpg jpe png tiff tif" 
        data-max-file-size="5M" data-height="500" 
        data-max-height="8000" 
        data-max-width="8000" />
        <br />

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" value="<?= isset($image->titulo) ? $image->titulo : '' ?>" name="titulo" id="" aria-describedby="helpId" maxlength="100" placeholder="Título de la Imágen" required>
        </div>

        <?php if (isset($image->estado)) { ?>
            <div class="form-group mt-2">
                <label for="estado">Estado</label>
                <select name="estado" id="" class="form-control" required>
                    <option value="1" <?= ($image->estado) ? 'selected' : '' ?>>Visible</option>
                    <option value="0" <?= ($image->estado) ? '' : 'selected' ?>>Oculto</option>
                </select>
            </div>
        <?php } ?>

        <div class="form-group">
            <label for="texto_introduccion">Contenido</label>
            <textarea name="texto_introduccion" id="editor" class="form-control" rows="5" maxlength="250" placeholder="Descripción de la imágen"><?= isset($image->texto_introduccion) ? $image->texto_introduccion : '' ?></textarea>
        </div>
    </div>

    <div class="row p-3">
        <button type="submit" id="btn-save" class="btn btn-primary mx-auto">Guardar</button>
    </div>
</div>