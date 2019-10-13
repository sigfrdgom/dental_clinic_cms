<h2 class="text-center"><?= isset($blog->titulo) ? 'EDITAR UNA PUBLICACIÓN' : 'AGREGAR UNA PUBLICACIÓN'  ?> </h2>

<div class="form-group mt-2">
    <label for="titulo">Titulo del servicio</label>
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
            <input type="file" class="form-control file-upload" name="recurso1" id="" aria-describedby="helpId" placeholder="">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea name="contenido" id="editor1" required><?= isset($blog->contenido) ? $blog->contenido : '' ?></textarea>
    <script>
CKEDITOR.replace('editor1', {
  extraPlugins: 'embed,autoembed,easyimage,image2',
  height: 500,

  // Load the default contents.css file plus customizations for this sample.
  contentsCss: [
    'http://cdn.ckeditor.com/4.13.0/full-all/contents.css',
    'https://ckeditor.com/docs/vendors/4.13.0/ckeditor/assets/css/widgetstyles.css'
  ],
  // Setup content provider. See https://ckeditor.com/docs/ckeditor4/latest/features/media_embed
  embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',

  // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
  // resizer (because image size is controlled by widget styles or the image takes maximum
  // 100% of the editor width).
  image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
  image2_disableResizer: true
});
</script>
</div>



<div class="row">
    <button type="submit" id="btn-save" class="btn btn-primary mx-auto">Guardar</button>
</div>

<!-- Use javascript to show a preview of images -->
<script src="<?= base_url('assets/js/upload-img.js')?>"></script>