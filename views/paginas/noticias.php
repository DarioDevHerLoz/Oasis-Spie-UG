<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <section class="noticias">
  <div class="noticias__container">
    <h2 class="noticias__title">
      <span class="noticias__title--accent">Últimas</span> Noticias<span class="noticias__dot">.</span>
    </h2>

    <p class="noticias__subtitle">
      Mantente informado con las últimas noticias y actualizaciones del mundo tecnológico y empresarial
    </p>

    <div class="noticias__grid">
      <article 
        class="noticias-card"
        data-noticias
        data-title="La Inteligencia Artificial revoluciona el mundo académico"
        data-date="2024-03-04"
        data-content="Texto completo de la noticia. Aquí va el detalle amplio con todos los párrafos que desees."
      >
        <figure class="noticias-card__media">
          <img src="/img/noticias/ia.png">
        </figure>
        <time class="noticias-card__date" datetime="2024-03-04">4 marzo 2024</time>
        <h3 class="noticias-card__title">La Inteligencia Artificial revoluciona el mundo académico</h3>
      </article>

      <article 
        class="noticias-card"
      >
        <figure class="noticias-card__media">
          <img src="/img/noticias/fotonica.png">
        </figure>
        <time class="noticias-card__date" datetime="2024-03-04">4 marzo 2024</time>
        <h3 class="noticias-card__title">La Fotónica en la actualidad</h3>
      </article>

      <article 
        class="noticias-card"
      >
        <figure class="noticias-card__media">
          <img src="/img/noticias/innovaciones.png">
        </figure>
        <time class="noticias-card__date" datetime="2024-03-04">4 marzo 2024</time>
        <h3 class="noticias-card__title">¿Innovaciones en ciberseguridad?</h3>
      </article>

      <article
        class="noticias-card"
      >
        <figure class="noticias-card__media">
          <img src="/img/noticias/lenguajes.png">
        </figure>
        <time class="noticias-card__date" datetime="2024-03-04">4 marzo 2024</time>
        <h3 class="noticias-card__title">Lenguajes modernos de programación</h3>
      </article>
    </div>
  </div>
</div>
</section>
<div class="modal" id="noticiasModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="noticiasModalTitle">
  <div class="modal__overlay" data-modal-close></div>
  <div class="modal__dialog" role="document">
    <button class="modal__close" type="button" aria-label="Cerrar" data-modal-close>&times</button>
    <h3 class="modal__title" id="noticiasModalTitle"></h3>
    <time class="modal__date" id="noticiasModalDate"></time>
    <div class="modal__body" id="noticiasModalBody"></div>
  </div>
</div>
</body>
<script src="/js/noticias.js"></script>
</html>