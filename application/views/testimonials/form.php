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
<div class="row m-3 mx-auto">
    <div>
        <img src="<?php if(isset($testimonial->recurso_av_1) ){
            if(strlen($testimonial->recurso_av_1)>0){
                echo base_url()."uploads/".$testimonial->recurso_av_1 ;
            }else{
                echo base_url().'assets/images/default/upload-img.png';
            }
        }else{
            echo base_url().'assets/images/default/upload-img.png';
        }
         ?>" class="img-upload" alt="upload image" width="150" height="180">
    </div>
    <div class="m-3">
        <div class="form-group">
            <label for="recurso1">Imagen de presentación</label>
            <input type="file" class="form-control file-upload" name="recurso1" id="" aria-describedby="helpId" placeholder="">
        </div>
    </div>
</div>


<div class="row">
    <button type="submit" id="btn-save" class="btn btn-primary mx-auto">Guardar</button>
</div>

<!-- Use javascript to show a preview of images -->
<script src="<?= base_url('assets/js/upload-img.js')?>"></script>