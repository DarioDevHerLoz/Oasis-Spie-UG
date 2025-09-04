<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/usuarios/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir usuario
    </a>
</div>

<div class="dashboard__contenedor">
    <?php  if(!empty($usuarios)) {?>
        <table class="table">
            <thead class="table__thead">
                <tr class="">
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Correo</th>
                    <th scope="col" class="table__th">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($usuarios as $usuario) { ?>
                    <tr class="table__tr">
                        <td class="table__td"> <?php echo $usuario->id; ?> </td>
                        <td class="table__td"> <?php echo $usuario->usuario_nombre . ' ' . $usuario->usuario_apellido; ?> </td>
                        <td class="table__td"> <?php echo $usuario->usuario_correo; ?> </td>
                        <td class="table__td--accion">
                            <a class="table__accion table__accion--editar" href="/admin/usuarios/actualizar?id=<?php echo $usuario->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            <form method="POST" action="/admin/dias/editar?id" class="table__formulario">
                                <input type="hidden" name="id" value="">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Eliminar
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
          <p class="text-center dashboard__void">No Hay Usuarios Aún</p>  
    <?php } ?>
</div>