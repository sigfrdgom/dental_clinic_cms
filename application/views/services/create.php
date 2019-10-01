<div class="container">

    <div class="row">

        <div class="col-12 col-sm-11 col-md-9 col-xl-8 mx-auto mt-4">
            <form action="guardarDatos" method="post" enctype="multipart/form-data" class="p-3"
                style="background: #dfdfdf" class="form-shadow">
                <h2 class="text-center"> AGREGAR UN SERVICIO</h2>

                <div class="form-group mt-2">
                    <label for="titulo">Titulo del servicio</label>
                    <input type="text" class="form-control" name="titulo" id="" aria-describedby="helpId" placeholder=""
                        required>
                </div>
                <div class="form-group">
                    <label for="introduccion">Introduccion de presentación</label>
                    <textarea class="form-control" name="texto_introduccion" id="" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="contenido">Contenido</label>
                    <textarea class="form-control" name="contenido" id="" rows="6" required></textarea>
                </div>
                <div class="row m-3">
                    <div>
                        <img src="./../assets/images/default/upload-img.png" class="img-upload" alt="upload image" width="160">
                    </div>
                    <div class="m-3">
                        <div class="form-group">
                            <label for="recurso1"></label>
                            <input type="file" class="form-control file-upload" name="recurso1" id="" aria-describedby="helpId"
                                placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row m-3 ">
                  <div>
                        <img src="./../assets/images/default/upload-img.png" class="img-upload" alt="upload image" width="160" srcset="">
                    </div>
                    <div class="m-3">
                        <div class="form-group">
                            <label for="recurso2"></label>
                            <input type="file" class="form-control file-upload" name="recurso2" id="" aria-describedby="helpId"
                                placeholder="">
                        </div>
                  </div>
                </div>
                <div class="row m-3">
                    <div>
                        <img src="./../assets/images/default/upload-img.png" class="img-upload" alt="upload image" width="160" srcset="">
                    </div>
                    <div class="m-3">
                        <div class="form-group">
                            <label for="recurso3"></label>
                            <input type="file" class="form-control file-upload" name="recurso3" id="" aria-describedby="helpId"
                                placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row m-3">
                    <div>
                        <img src="./../assets/images/default/upload-img.png" class="img-upload" alt="upload image" width="160" srcset="">
                    </div>
                    <div class="m-3">
                        <div class="form-group">
                            <label for="recurso4"></label>
                            <input type="file" class="form-control file-upload"  name="recurso4" id="" aria-describedby="helpId"
                                placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                  <button type="submit" id="btn-save" class="btn btn-primary mx-auto">Guardar</button>
                </div>
            </form>
            </form>
        </div>
    </div>
</div>

<!-- Use javascript to show a preview of images -->
<script src="<?= base_url('assets/js/upload-img.js')?>"></script>