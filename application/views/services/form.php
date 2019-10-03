    <h2 class="text-center"><?= isset($services->titulo) ? 'EDITAR UN SERVICIO' : 'AGREGAR UN SERVICIO'  ?> </h2>

    <div class="form-group mt-2">
        <label for="titulo">Titulo del servicio</label>
        <input type="text" class="form-control" value="<?= isset($services->titulo) ? $services->titulo : '' ?>" name="titulo" id="" aria-describedby="helpId" placeholder="" required>
    </div>
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
        <textarea class="form-control"  name="contenido" id="" rows="6" required><?= isset($services->contenido) ? $services->contenido : '' ?></textarea>
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