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
    <form action="guardarDatos" method="post" enctype="multipart/form-data" class="p-3" style="background: #dfdfdf">

        <div class="form-group">
          <label for="titulo">titulo</label>
          <input type="text" class="form-control" name="titulo" id="" aria-describedby="helpId" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="introduccion">Introduccion</label>
          <textarea class="form-control" name="texto_introduccion" id="" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label for="contenido">contenido</label>
          <textarea class="form-control" name="contenido" id="" rows="6" required></textarea>
        </div>
        <div class="form-group">
          <label for="recurso1"></label>
          <input type="file" class="form-control" name="recurso1" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="recurso2"></label>
          <input type="file" class="form-control" name="recurso2" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="recurso3"></label>
          <input type="file" class="form-control" name="recurso3" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="recurso4"></label>
          <input type="file" class="form-control" name="recurso4" id="" aria-describedby="helpId" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </form>
    </div>
    </div>
</div>