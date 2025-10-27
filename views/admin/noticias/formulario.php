<fieldset class="formulario__fildset">
    <legend class="formulario__legend"> Agregar Noticia</legend>
    <div class="formulario__campo">
        <label for="noticias_titulo" class="formulario__label">
            Titulo de la Noticia
        </label>
        <input 
            type="text"
            class="formulario__input"
            id="noticias_titulo"
            name="noticias_titulo"
            value="<?php echo $noticia->noticias_titulo;?>"
            placeholder="Escriba el titulo de la noticia"
        >
    </div>

    <div class="formulario__campo">
        <label for="noticias_contenido" class="formulario__label">
            Contendido de la noticia
        </label>
        <textarea
            id="noticias_contenido" 
            name="noticias_contenido" 
            class="formulario__input"
            rows="20"
        >
            <?php echo $noticia->noticias_contenido;?>
        </textarea>
    </div>

    <div class="formulario__campo">
        <label for="noticias_imagen" class="formulario__label">
            Imagen de la Noticia
        </label>
        <input 
            type="file"
            class="formulario__input formulario__input--file"
            id="noticias_imagen"
            name="noticias_imagen"
            accept="image/png image/jpg"
        >
    </div>

    <?php if(isset($noticia->imagen_actual)){?>
        <p class="formulario__texto">Imagen Actual:</p>
        <picture>
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['APP_URL'] . '/img/noticias/' . $noticia->noticias_imagen;?>.png" alt="Imagen Ponente">
        </picture>
    <?php }?>
</fieldset>