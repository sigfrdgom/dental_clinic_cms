<?php

foreach ($usuarios as $usuario) {
    # code...

?>
    <!-- REGISTRO DE LA TABLA POR USUARIOS-->
    <tr>

    <!-- <td></td> -->
    <td><?= $usuario->nombres?></td>
    <td><?= $usuario->apellidos?></td>
    <td><?= $usuario->nombre_usuario?></td>
	<td><?= $usuario->tipo_usuario?></td>
	<td><?php if(($usuario->estado)==0) { echo "Activo";}else{ echo "Desactivo";} ?></td>
            <td>
                <button class="btnEditar text-center btn btn-info" value="<?= $usuario->id_usuario?>">EDITAR</button>
                <button class="btnEliminar text-center btn btn-danger"  value="<?=$usuario->id_usuario?>">ELIMINAR</button>
            </td>
    </tr>

<?php } ?>
