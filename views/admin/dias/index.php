<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/dias/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Dias
    </a>
</div>

<div class="dashboard__contenedor">
    <?php  if(!empty($dias)) {?>
        <table class="table">
            <thead class="table__thead">
                <tr class="">
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">Dia</th>
                    <th scope="col" class="table__th--acciones">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($dias as $dia) { ?>
                    <tr class="table__tr">
                        <td class="table__td"><?php echo $dia->id; ?></td>
                        <td class="table__td"><?php echo $dia->dia_nombre; ?></td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/dias/actualizar?id=<?php echo $dia->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            <form method="POST" action="/admin/dias/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $dia->id; ?>">
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