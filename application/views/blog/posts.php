<?php
            foreach ($posts as $post) {
                ?>
                <div class="card mb-3 form-shadow">
                    <div class="row no-gutters">
                        <div>
                            <img src="<?= !empty(trim($post->recurso_av_1)) ? base_url("uploads/".trim($post->recurso_av_1)) : base_url("assets/images/blog/blog.png") ?>" class="card-img" alt="Imagen de presentación" style="width: 230px; margin: 0 auto">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?=$post->titulo?></h5>
                                <p class="card-text"><?=$post->texto_introduccion ?></p>
                                <p class="card-text"><small class="text-muted"><?=$post->fecha_ingreso?></small></p>
                            </div>
                        </div>
                        <div class="text-center" style="vertical-align: middle;">
                            <a href="<?= base_url() . "blog/edit/"  ?>" class="btn btn-warning  btn-edit mx-auto">Editar</a>
                            <button class="btn btn-danger btn-delete mx-auto" value="">Eliminar</button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>