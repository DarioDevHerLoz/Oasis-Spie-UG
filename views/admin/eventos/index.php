<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Evento
    </a>
</div>

<div class="dashboard__contenedor">
    <?php  if(!empty($eventos)) {?>
        <table class="table">
            <thead class="table__thead">
                <tr class="">
                    <th scope="col" class="table__th">Evento</th>
                    <th scope="col" class="table__th">Ponente</th>
                    <th scope="col" class="table__th">Dia y Hora</th>
                    <th scope="col" class="table__th">fecha</th>
                    <th scope="col" class="table__th">Aula</th>
                    <th scope="col" class="table__th">Capacidad</th>
                    <th scope="col" class="table__th">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($eventos as $evento) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $evento->evento_nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $evento->ponente->ponentes_nombre; ?>

                        </td>
                        <td class="table__td">
                            <?php echo $evento->dia->dia_nombre . ", " . $evento->hora->hora_hora; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $evento->evento_fecha; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $evento->evento_aula; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $evento->evento_disponibles; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/eventos/actualizar?id=<?php echo $evento->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            <form method="POST" action="/admin/eventos/delete" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $evento->id; ?>">
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
          <p class="text-center dashboard__void">No Hay Eventos Aún</p>  
    <?php } ?>
</div>
<?php 
    echo $paginacion;
?>