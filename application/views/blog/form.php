<!-- CKEditor -->
<script src="<?= base_url('assets/plugins/ckeditor/ckeditor.js')?>"></script>

<h2 class="text-center"><?= isset($blog->titulo) ? 'EDITAR UNA PUBLICACIÓN' : 'AGREGAR UNA PUBLICACIÓN'  ?> </h2>

<div class="form-group mt-2">
    <label for="titulo">Titulo de la publicación</label>
    <input type="text" class="form-control" value="<?= isset($blog->titulo) ? $blog->titulo : '' ?>" name="titulo" id="" aria-describedby="helpId" placeholder="" required>
</div>
<div class="form-group mt-2">
    <label for="categoria">Categoria</label>
    <select name="categoria" id="" class="form-control" required>
        <?php foreach($categories as $category){ 
            if(isset($blog->id_categoria)){ ?>
                <option value="<?= $category->id_categoria ?>"  <?= ($category->id_categoria == $blog->id_categoria)  ? 'selected' : '' ?>  ><?= $category->nombre ?></option>
            <?php } else{ ?>
                <option value="<?= $category->id_categoria ?>" ><?= $category->nombre ?></option>
                <?php }?>
        <?php } ?>
    </select>
</div>
<?php if(isset($blog->estado)){ ?>
    <div class="form-group mt-2">
    <label for="estado">Estado</label>
    <select name="estado" id="" class="form-control" required>
        <option value="1" <?= ($blog->estado) ? 'selected' : '' ?>>Visible</option>
        <option value="0" <?= ($blog->estado) ? '' : 'selected' ?>>Oculto</option>
    </select>
</div>
<?php } ?>
<div class="form-group">
    <label for="introduccion">Introduccion de presentación</label>
    <textarea class="form-control" name="texto_introduccion" id="" rows="3" required><?= isset($blog->texto_introduccion) ? $blog->texto_introduccion : '' ?></textarea>
</div>
<div class="row m-3 mx-auto">
    <div>
        <img src="<?php if(isset($blog->recurso_av_1) ){
            if(strlen($blog->recurso_av_1)>0){
                echo base_url()."uploads/".$blog->recurso_av_1 ;
            }else{
                echo base_url().'assets/images/default/upload-img.png';
            }
        }else{
            echo base_url().'assets/images/default/upload-img.png';
        }
         ?>" class="img-upload" alt="upload image" width="180">
    </div>
    <div class="m-3">
        <div class="form-group">
            <label for="recurso1">Imagen de presentación</label>
            <input type="file" class="form-control file-upload" name="recurso1" accept=".jpg, .jpeg, .png, .gif, .bmp"  placeholder="Upload Image">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea name="contenido" id="editor" required><?= isset($blog->contenido) ? $blog->contenido : '' ?></textarea>
    <script>
CKEDITOR.replace('editor', {

        height: 500,
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

<!-- Use javascript to show a preview of images -->
<script src="<?= base_url('assets/js/upload-img.js')?>"></script>
