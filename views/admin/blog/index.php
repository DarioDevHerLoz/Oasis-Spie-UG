<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/blog/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Blog
    </a>
</div>

<div class="dashboard__contenedor">
    <?php  if(!empty($blogs)) {?>
        <table class="table">
            <thead class="table__thead">
                <tr class="">
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">Titulo</th>
                    <th scope="col" class="table__th">Fecha de publicacion</th>
                    <th scope="col" class="table__th">Colaborador</th>
                    <th scope="col" class="table__th">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($blogs as $blog) { ?>
                    <tr class="table__tr">
                        <td class="table__td"><?php echo $blog->id; ?></td>
                        <td class="table__td"><?php echo $blog->blog_titulo; ?></td>
                        <td class="table__td"><?php echo $blog->blog_date; ?></td>
                        <td class="table__td"><?php echo $blog->blog_colaboradores; ?></td>
                        <td class="table__td--accion">
                            <a class="table__accion table__accion--editar" href="/admin/blog/actualizar?id=<?php echo $blog->id?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            <form method="POST" action="/admin/blog/eliminar?id=<?php echo $blog->id?>" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $blog->id?>">
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
          <p class="text-center dashboard__void">No Hay Noticias Aún</p>  
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>