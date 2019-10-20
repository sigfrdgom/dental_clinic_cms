<?php
foreach ($services as $service) {
    ?>
    <tr>
        <td class="align-middle text-center"><img src="<?= $service->recurso_av_1 ? "uploads/" . $service->recurso_av_1 : './assets/images/default/no-image-visible.png' ?>" alt="" width="170"></td>
        <td class="align-middle"><?= $service->titulo  ?></td>
        <td class="align-middle"><?= $service->texto_introduccion  ?></td>
        <td class="align-middle text-center"><?= $service->estado ? '<i class="fa fa-eye" style="font-size: 4em; color: #00aeef;"></i>' : '<i class="fa fa-eye-slash" style="font-size: 4em; color: gray;"></i>' ?></td>
        <!-- <td class="align-middle text-center"><img src="<?= $service->recurso_av_2 ? "uploads/" . $service->recurso_av_2 : './assets/images/default/no-image-visible.png' ?>" alt="" width="130"></td>
        <td class="align-middle text-center"><img src="<?= $service->recurso_av_3 ? "uploads/" . $service->recurso_av_3 : './assets/images/default/no-image-visible.png' ?>" alt="" width="130"></td>
        <td class="align-middle text-center"><img src="<?= $service->recurso_av_4 ? "uploads/" . $service->recurso_av_4 : './assets/images/default/no-image-visible.png' ?>" alt="" width="130"></td> -->
        <td class="align-middle text-center"><?= $service->fecha_ingreso ?></td>
        <td class="align-middle text-center"><a href="<?= base_url("services/edit/".$service->id_publicacion) ?>" class="btn btn-warning  btn-edit">Editar</a></td>
        <td class="align-middle text-center"><button class="btn btn-danger btn-delete" value="<?= $service->id_publicacion ?>">Eliminar</button></td>
    </tr>
<?php
}
?>
