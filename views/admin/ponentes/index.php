<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/ponentes/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Ponentes
    </a>
</div>

<div class="dashboard__contenedor">
    <?php  if(!empty($ponentes)) {?>
        <table class="table">
            <thead class="table__thead">
                <tr class="">
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Profesion</th>
                    <th scope="col" class="table__th">Accciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($ponentes as $ponente) { ?>
                    <tr class="table__tr">
                        <td class="table__td"><?php echo $ponente->id ?></td>
                        <td class="table__td"><?php echo $ponente->ponentes_nombre . ' ' . $ponente->ponentes_apellido?></td>
                        <td class="table__td table__td--habilidades">
                            <?php 
                                $habilidades = explode(',', $ponente->ponentes_habilidades);
                                foreach($habilidades as $habilidad){ ?>
                                  <div class="table__tag"> <?php echo $habilidad ?> </div>  
                                <?php } ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/ponentes/actualizar?id=<?php echo $ponente->id ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            <form method="POST" action="/admin/ponentes/delete?id=<?php echo $ponente->id;?>" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $ponente->id?>">
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
          <p class="text-center dashboard__void">No Hay Ponentes Aún</p>  
    <?php } ?>
</div>