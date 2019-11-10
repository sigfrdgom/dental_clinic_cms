<link rel="stylesheet" href="<?= base_url('assets/plugins/dropify/css/dropify.min.css') ?>">


<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Imágenes del Carrusel &nbsp; &nbsp;</h4>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">Imágenes del Carrusel</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="" method="post" class="col-lg-8 col-sm-8 col-md-8 col-lg-8 mx-auto">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title">Selecciona la imagen a utilizar</h4>
                    <label for="input-file-to-destroy">La imagen que elegijas aparecerá el carousel de la página de inicio</label>
                    <input type="file" id="input-file-to-destroy" class="dropify" data-allowed-file-extensions="bmp gif jpeg jpg jpe png tiff tif" data-max-file-size="2M" data-height="500" data-max-height="8000" data-max-width="8000" />
                    <br />

                    <div class="form-group">
                      <label for="">Título</label>
                      <input type="text"
                        class="form-control" name="" id="" aria-describedby="helpId" maxlength="100" placeholder="Título de la Imágen">
                    </div>

                    <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea name="contenido" id="editor" class="form-control" rows="5" maxlength="250" placeholder="Descripción de la imágen" required></textarea>
                    </div>
                </div>

                <div class="row p-3">
                    <button type="submit" id="btn-save" class="btn btn-primary mx-auto">Guardar</button>
                </div>
            </div>
        </form>
    </div>

</div>