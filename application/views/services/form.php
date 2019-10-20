<!-- CKEditor -->
<script src="<?= base_url('assets/js/ckeditor/ckeditor.js')?>"></script>

<h2 class="text-center"><?= isset($services->titulo) ? 'EDITAR UN SERVICIO' : 'AGREGAR UN SERVICIO'  ?> </h2>

    <div class="form-group mt-2">
        <label for="titulo">Titulo del servicio</label>
        <input type="text" class="form-control" value="<?= isset($services->titulo) ? $services->titulo : '' ?>" name="titulo" id="" aria-describedby="helpId" placeholder="" required>
    </div>
    <?php if(isset($services->estado)){ ?>
    <div class="form-group mt-2">
    <label for="estado">Estado</label>
    <select name="estado" id="" class="form-control" required>
        <option value="1" <?= ($services->estado) ? 'selected' : '' ?>>Visible</option>
        <option value="0" <?= ($services->estado) ? '' : 'selected' ?>>Oculto</option>
    </select>
</div>
    <?php } ?>
    <div class="form-group mt-2">
        <label for="categoria">Categoria</label>
        <select name="categoria" id="" class="form-control" required>
            <?php foreach($categories as $category){ 
                if(isset($services->id_categoria)){ ?>
                    <option value="<?= $category->id_categoria ?>"  <?= ($category->id_categoria == $services->id_categoria)  ? 'selected' : '' ?>  ><?= $category->nombre ?></option>
                <?php } else{ ?>
                    <option value="<?= $category->id_categoria ?>" ><?= $category->nombre ?></option>
                    <?php }?>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="introduccion">Introduccion de presentación</label>
        <textarea class="form-control" name="texto_introduccion" id="" rows="3" required><?= isset($services->texto_introduccion) ? $services->texto_introduccion : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="contenido">Contenido</label>
        <textarea name="contenido" id="editor" required><?= isset($services->contenido) ? $services->contenido : '' ?></textarea>
        <script>
    CKEDITOR.replace('editor', {
        height: 500,
        language: 'es',
        filebrowserUploadUrl: 'http://localhost/dental_clinic_cms/upload_image',
        filebrowserUploadMethod: 'form'
    });
    // CKEDITOR.replace('editor1', {
    //   extraPlugins: 'embed,autoembed,easyimage,image2',
    //   height: 500,

    //   // Load the default contents.css file plus customizations for this sample.
    //   contentsCss: [
    //     'http://cdn.ckeditor.com/4.13.0/full-all/contents.css',
    //     'https://ckeditor.com/docs/vendors/4.13.0/ckeditor/assets/css/widgetstyles.css'
    //   ],
    //   // Setup content provider. See https://ckeditor.com/docs/ckeditor4/latest/features/media_embed
    //   embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',

    //   // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
    //   // resizer (because image size is controlled by widget styles or the image takes maximum
    //   // 100% of the editor width).
    //   image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
    //   image2_disableResizer: true
    // });
  </script>
    </div>
    <div class="row m-3">
        <div>
            <img src="<?php if(isset($services->recurso_av_1) ){
                if(strlen($services->recurso_av_1)>0){
                    echo base_url()."uploads/".$services->recurso_av_1 ;
                }else{
                    echo base_url().'assets/images/default/upload-img.png';
                }
            }else{
                echo base_url().'assets/images/default/upload-img.png';
            }
             ?>" class="img-upload" alt="upload image" width="160">
        </div>
        <div class="m-3">
            <div class="form-group">
                <label for="recurso1"></label>
                <input type="file" class="form-control file-upload" name="recurso1" id="" aria-describedby="helpId" placeholder="">
            </div>
        </div>
    </div>
    <div class="row m-3 ">
        <div>
            <img src="<?php if(isset($services->recurso_av_2) ){
                if(strlen($services->recurso_av_2)>0){
                    echo base_url()."uploads/".$services->recurso_av_2 ;
                }else{
                    echo base_url().'assets/images/default/upload-img.png';
                }
            }else{
                echo base_url().'assets/images/default/upload-img.png';
            }
             ?>" class="img-upload" alt="upload image" width="160" srcset="">
        </div>
        <div class="m-3">
            <div class="form-group">
                <label for="recurso2"></label>
                <input type="file" class="form-control file-upload" name="recurso2" id="" aria-describedby="helpId" placeholder="">
            </div>
        </div>
    </div>
    <div class="row m-3">
        <div>
            <img src="<?php if(isset($services->recurso_av_3) ){
                if(strlen($services->recurso_av_3)>0){
                    echo base_url()."uploads/".$services->recurso_av_3 ;
                }else{
                    echo base_url().'assets/images/default/upload-img.png';
                }
            }else{
                echo base_url().'assets/images/default/upload-img.png';
            }
             ?>" class="img-upload" alt="upload image" width="160" srcset="">
        </div>
        <div class="m-3">
            <div class="form-group">
                <label for="recurso3"></label>
                <input type="file" class="form-control file-upload" name="recurso3" id="" aria-describedby="helpId" placeholder="">
            </div>
        </div>
    </div>
    <div class="row m-3">
        <div>
            <img src="<?php if(isset($services->recurso_av_4) ){
                if(strlen($services->recurso_av_4)>0){
                    echo base_url()."uploads/".$services->recurso_av_4 ;
                }else{
                    echo base_url().'assets/images/default/upload-img.png';
                }
            }else{
                echo base_url().'assets/images/default/upload-img.png';
            }
             ?>" class="img-upload" alt="upload image" width="160" srcset="">
        </div>
        <div class="m-3">
            <div class="form-group">
                <label for="recurso4"></label>
                <input type="file" class="form-control file-upload" name="recurso4" id="" aria-describedby="helpId" placeholder="">
            </div>
        </div>
    </div>
    <div class="row">
        <button type="submit" id="btn-save" class="btn btn-primary mx-auto">Guardar</button>
    </div>

<!-- Use javascript to show a preview of images -->
<script src="<?= base_url('assets/js/upload-img.js')?>"></script>