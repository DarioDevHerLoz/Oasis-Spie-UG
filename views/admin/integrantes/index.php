<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/integrantes/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Integrantes
    </a>
</div>

<div class="dashboard__contenedor">
    <?php  if(!empty($integrantes)) {?>
        <table class="table">
            <thead class="table__thead">
                <tr class="">
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Correo</th>
                    <th scope="col" class="table__th">Rol</th>
                    <th scope="col" class="table__th--acciones">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($integrantes as $integrante) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $integrante->id ?>
                        </td>
                        <td class="table__td">
                            <?php echo $integrante->integrantes_nombre . $integrante->integrantes_apellido ?>
                        </td>
                        <td class="table__td">
                            <?php echo $integrante->integrantes_correo ?>
                        </td>
                        <td class="table__td">
                            <?php echo $integrante->integrantes_rol ?>
                        </td>
                        <td class="table__td--accion">
                            <a class="table__accion table__accion--editar" href="/admin/integrantes/actualizar?id=<?php echo $integrante->id?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            <form method="POST" action="/admin/integrantes/delete?id=<?php echo $integrante->id?>" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $integrante->id?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
          <p class="text-center dashboard__void">No Hay Dias Aún</p>  
    <?php } ?>
</div>