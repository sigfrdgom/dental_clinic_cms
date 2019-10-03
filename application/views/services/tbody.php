<?php
foreach ($services as $service) {
    ?>
    <tr>
        <td class="align-middle"><?= $service->titulo  ?></td>
        <td class="align-middle"><?= $service->texto_introduccion  ?></td>
        <td class="align-middle"><?= $service->contenido  ?></td>
        <td class="align-middle"><?= $service->estado ? 'ACTIVO' : 'INACTIVO' ?></td>
        <td class="align-middle"><img src="<?= $service->recurso_av_1 ? "uploads/" . $service->recurso_av_1 : './assets/images/default/no-image-visible.png' ?>" alt="" width="130"></td>
        <td class="align-middle"><img src="<?= $service->recurso_av_2 ? "uploads/" . $service->recurso_av_2 : './assets/images/default/no-image-visible.png' ?>" alt="" width="130"></td>
        <td class="align-middle"><img src="<?= $service->recurso_av_3 ? "uploads/" . $service->recurso_av_3 : './assets/images/default/no-image-visible.png' ?>" alt="" width="130"></td>
        <td class="align-middle"><img src="<?= $service->recurso_av_4 ? "uploads/" . $service->recurso_av_4 : './assets/images/default/no-image-visible.png' ?>" alt="" width="130"></td>
        <td class="align-middle"><?= $service->fecha_ingreso ?></td>
        <td class="align-middle"><a href="<?= base_url() . "services/edit/" . $service->id_publicacion ?>" class="btn btn-warning  btn-edit">Editar</a></td>
        <td class="align-middle"><button class="btn btn-danger btn-delete" value="<?= $service->id_publicacion ?>">Eliminar</button></td>
    </tr>
<?php
}
?>