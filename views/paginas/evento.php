<main>
    <h2 class="noticia__titulo"><?php echo $evento->evento_nombre ?></h2>
    <div class="evento--imagen">
        <div class="">
            <picture>
                    <source width="200" srcset="<?php echo $_ENV['APP_URL'] . '/img/eventos/' . $evento->evento_imagen; ?>.webp" type="image/webp">
                    <source width="200" srcset="<?php echo $_ENV['APP_URL'] . '/img/eventos/' . $evento->evento_imagen; ?>.png" type="image/png">
                    <img width="200" src="<?php echo $_ENV['APP_URL'] . '/img/eventos/' . $evento->evento_imagen; ?>.png" alt="Imagen Noticia">
            </picture>            
        </div>

    </div>
    <div class="evento__datos__importantes">
        <div class="">
            <p>
                <span>Fecha del Evento:</span>
                <?php echo $evento->evento_fecha; ?>
            </p>
            
        </div> 
        <div class="">
            <p>
                <span>Hora de Inicio del Evento:</span>
                <?php echo $hora->hora_hora; ?>
            </p>
        </div> 
        <div class="">
            <p>
                Division Campus Irapuato Salamanca,Gto, <?php echo $evento->evento_aula; ?>
            </p>
            
        </div> 
        <div class="">
            <p>
                <span>Lugares Disponibles:</span>
                <?php echo $evento->evento_disponibles; ?>
            </p>
        </div> 
    </div>

    <div class="evento__contenido">
        <div class="evento__contenido--texto">
            <h3>Sobre Este Evento</h3>
            <?php 
                $parrafos = preg_split('/\r\n|\r|\n/', $evento->evento_descripcion);
                foreach($parrafos as $p) {
                    $p = trim($p);
                    if ($p !== '') {
                        echo "<p>$p</p>";
                    }
                }
            ?>
        </div>
        <div class="evento__contenido__ponente--imagen">
            <h3>Ponente</h3>
            <div class="evento__ponente__imagen">
                <picture>
                        <source width="200" srcset="<?php echo $_ENV['APP_URL'] . '/img/ponentes/' . $ponente->ponentes_imagen; ?>.webp" type="image/webp">
                        <source width="200" srcset="<?php echo $_ENV['APP_URL'] . '/img/ponentes/' . $ponente->ponentes_imagen; ?>.png" type="image/png">
                        <img width="200" src="<?php echo $_ENV['APP_URL'] . '/img/ponentes/' . $ponente->ponentes_imagen; ?>.png" alt="Imagen Noticia">
                </picture>
            </div>
            <h4><?php echo $ponente->ponentes_nombre . ' ' . $ponente->ponentes_apellido ; ?></h4>
            
            <?php $habilidades = explode(',',$ponente->ponentes_habilidades); 
                foreach($habilidades as $habilidad){ ?>
                    <p class="evento__ponente--habilidad"><?php echo $habilidad ?> </p>
                <?php }
            ?>
        </div>
    </div>
    
</main>