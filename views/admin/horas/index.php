<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/horas/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Horas
    </a>
</div>

<div class="dashboard__contenedor">
    <?php  if(!empty($horas)) {?>
        <table class="table">
            <thead class="table__thead">
                <tr class="">
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">Hora</th>
                    <th scope="col" class="table__th--acciones">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($horas as $hora) { ?>
                    <tr class="table__tr">
                        <td class="table__td"><?php echo $hora->id ?></td>
                        <td class="table__td"><?php echo $hora->hora_hora ?></td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/horas/actualizar?id=<?php echo $hora->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            <form method="POST" action="/admin/horas/delete?id=<?php echo $hora->id; ?>" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $hora->id; ?>">
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
          <p class="text-center dashboard__void">No Hay horas Aún</p>  
    <?php } ?>
</div>