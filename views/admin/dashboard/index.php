<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Blogs Mas Recientes</h3>

            <?php foreach($blogs as $blog) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $blog->blog_titulo . " " . $blog->blog_date; ?>
                    </p>
                </div>
            <?php } ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Ultimos Eventos</h3>

            <?php foreach($eventos as $evento) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $evento->evento_nombre . " " . $evento->evento_fecha ?>
                    </p>
                </div>
            <?php } ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos Con Menos Lugares Disponibles</h3>
            <?php foreach($menos_disponibles as $evento) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $evento->evento_nombre . " - " . $evento->evento_disponibles . ' Disponibles'; ?>
                    </p>
                </div>
            <?php } ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Noticias mas Recientes</h3>
            <?php foreach($noticias as $noticia) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $noticia->noticias_titulo . " - " . $noticia->noticias_date; ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
</main>