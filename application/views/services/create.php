<div class="container">
    
<div class="row">
    <div class="col-6">
    <form action="savePictures" method="post" enctype="multipart/form-data" class="p-3" style="background: #dfdfdf">

        <img src="" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        <div class="form-group">
          <label for="upload"></label>
          <input type="file" class="form-control" name="upload" id="" aria-describedby="helpId" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
    <div class="col-6">
    <form action="" method="post" enctype="multipart/form-data" class="p-3" style="background: #dfdfdf">

        <div class="form-group">
          <label for="titulo">titulo</label>
          <input type="text" class="form-control" name="titulo" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="introduccion">Introduccion</label>
          <textarea class="form-control" name="introduccion" id="" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="contendio">contendio</label>
          <textarea class="form-control" name="contendio" id="" rows="6"></textarea>
        </div>
    </form>
    </div>
    </div>
</div>