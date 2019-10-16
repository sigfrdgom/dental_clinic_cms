<?php
            foreach ($posts as $post) {
                ?>
                <div class="card mb-3 form-shadow">
                    <div class="row ">  
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                            <img src="<?= !empty(trim($post->recurso_av_1)) ? base_url("uploads/".trim($post->recurso_av_1)) : base_url("assets/images/blog/blog.png") ?>" class="card-img" alt="Imagen de presentación" >
                        </div>
                    
                        <div class="col-12 col-sm-6 col-md-5 col-lg-5 col-xl-6">
                            <div class="card-body">
                                <h5 class="card-title"><?=$post->titulo?></h5>
                                <p class="card-text"><?=$post->texto_introduccion ?></p>
                                <p class="card-text"><small class="text-muted"><?=$post->fecha_ingreso?></small></p>
                            </div>
                        </div>

                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                            <div class="container h-100">
                                <div class="row align-items-center h-100">
                                    <div class="col-12 mx-auto text-center">
                                        <?php if ($post->estado == 1) { ?>
                                            <i class="fas fa-eye" style="font-size: 4em; color: #00aeef;"></i>
                                        <?php } else { ?>
                                            <i class="fas fa-eye-slash" style="font-size: 4em; color: gray;"></i>                                            
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                            <div class="container h-100">
                                <div class="row align-items-center h-100">
                                    <div class="col-12 mx-auto">
                                        <!-- <div class="jumbotron"> -->
                                            <a href="<?= base_url("blog/edit/".$post->id_publicacion) ?>" class="btn btn-warning  btn-edit mx-auto btn-block">Editar</a>
                                            <button class="btn btn-danger btn-delete mx-auto btn-block" value="<?= $post->id_publicacion ?>">Eliminar</button>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                          
                    </div>
                </div>
            <?php
            }
            ?>