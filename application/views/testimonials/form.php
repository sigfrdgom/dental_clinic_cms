<h2 class="text-center"><?= isset($testimonial->titulo) ? 'EDITAR UN TESTIMONIO' : 'AGREGAR UN TESTIMONIO'  ?> </h2>

<div class="form-group mt-2">
    <label for="titulo">Titulo del Testimonio</label>
    <input type="text" class="form-control" value="<?= isset($testimonial->titulo) ? $testimonial->titulo : '' ?>" name="titulo" maxlength="90"aria-describedby="helpId" placeholder="" required>
</div>
<?php if(isset($testimonial->estado)){ ?>
    <div class="form-group mt-2">
    <label for="estado">Estado</label>
    <select name="estado" id="" class="form-control" required>
        <option value="1" <?= ($testimonial->estado) ? 'selected' : '' ?>>Visible</option>
        <option value="0" <?= ($testimonial->estado) ? '' : 'selected' ?>>Oculto</option>
    </select>
</div>
<?php } ?>
<div class="form-group">
    <label for="introduccion">Historia</label>
    <textarea class="form-control" name="texto_introduccion" id="" rows="5" maxlength="256" required><?= isset($testimonial->texto_introduccion) ? $testimonial->texto_introduccion : '' ?></textarea>
</div>
<div class="row ">
    <div class="form-group col-8 col-sm-10 col-sm-8 col-md-6 mx-auto">
        <label for="recurso1" >Seleccionar imagen</label>
        <input type="file" id="input-file-to-destroy" class="dropify" name="recurso1" accept=".bmp, .gif, .jpeg, .jpg, .jpe, .png, .svg, .tiff, .tif" data-default-file="<?= !empty($testimonial->recurso_av_1) ? base_url('uploads/testimonials/') . $testimonial->recurso_av_1 : '' ?>" data-allowed-file-extensions="bmp gif jpeg jpg jpe png svg tiff tif" data-max-file-size="5M" data-height="450" data-max-height="8000" data-max-width="8000" />
        <br />
    </div>
</div>


<div class="row">
    <button type="submit" id="btn-save" class="btn btn-primary mx-auto">Guardar</button>
</div>

<!-- Use javascript to show a preview of images -->
<script src="<?= base_url('assets/js/upload-img.js')?>"></script>