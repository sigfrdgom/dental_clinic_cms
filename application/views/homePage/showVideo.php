<div class="container-fluid">
    <div class="row page-titles pt-2 pb-0" style="background: white">
        <div class="col-md-5 align-self-center mb-2">
            <h4 class="text-themecolor text-dark float-left mt-2">Mostrar video &nbsp; &nbsp;</h4>

        </div>
        <div class="col-md-7 align-self-center text-right text-dark">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">Mostrar video</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8 mx-auto card p-4">
            <h2 class="text-center">Video de la página de inicio</h2>
            <div class="form-row p-3">
                <div class="col-10">
                    <input type="text" id="input-url" class="form-control" name="URL-video" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="col-2">
                    <button type="button" id="btn-cambiar-video" class="btn btn-primary">Cambiar</button>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 mt-1 mb-5 mx-auto">
                <div id="div-video" class="dentalclinic-video-area mb-2 embed-responsive embed-responsive-4by3" style="margin-top">
                    <iframe class="embed-responsive-item" id="iframe-video" src="https://www.youtube.com/embed/ZfjAEx_fnyc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" style=""></iframe>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?= base_url('assets/js/changeVideo.js') ?>"></script>