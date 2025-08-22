<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/ponentes/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Integrantes
    </a>
</div>

<div class="dashboard__contenedor">
    <?php  if(!empty($Integrantes)) {?>
        <table class="table">
            <thead class="table_thead">
                <tr class="">
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">Dia</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($Integrantes as $Integrante) { ?>
                    <tr class="table__tr">
                        <td class="table__td"></td>
                        <td class="table__td"></td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/dias/editar?id">
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
          <p class="text-center dashboard__void">No Hay Dias Aún</p>  
    <?php } ?>
</div>