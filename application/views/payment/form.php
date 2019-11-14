<!-- CKEditor -->
<script src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>

<div class="col-11 mx-auto p-2">
    <h2 class="text-center">Contenido</h2>
    <div class="form-group mt-2">
        <label for="titulo">Titulo del método de pago</label>
        <input type="text" class="form-control" value="<?= isset($payment->titulo) ? $payment->titulo : '' ?>" name="titulo" id="" maxlength="50" placeholder="">
    </div>
    <div class="form-group mt-2">
    <label for="categoria">Categoria</label>
    <select name="categoria" id="" class="form-control" required>
        <?php foreach($categories as $category){ 
            if(isset($payment->id_categoria)){ ?>
                <option value="<?= $category->id_categoria ?>"  <?= ($category->id_categoria == $payment->id_categoria)  ? 'selected' : '' ?>  ><?= $category->nombre ?></option>
            <?php } else{ ?>
                <option value="<?= $category->id_categoria ?>" ><?= $category->nombre ?></option>
                <?php }?>
        <?php } ?>
    </select>
</div>
    <?php if (isset($payment->estado)) { ?>
        <div class="form-group mt-2">
            <label for="estado">Estado</label>
            <select name="estado" id="" class="form-control" required>
                <option value="1" <?= ($payment->estado) ? 'selected' : '' ?>>Visible</option>
                <option value="0" <?= ($payment->estado) ? '' : 'selected' ?>>Oculto</option>
            </select>
        </div>
    <?php } ?>
    <div class="form-group">
        <label for="contenido">Contenido</label>
        <textarea name="contenido" id="editor" required><?= isset($payment->contenido) ? $payment->contenido : '' ?></textarea>
        <script>
            CKEDITOR.replace('editor', {
                height: 350,
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
</div>