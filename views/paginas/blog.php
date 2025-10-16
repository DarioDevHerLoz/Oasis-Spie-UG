<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Nuestro Blog</title>
  <link rel="stylesheet" href="styles.css"><!-- tu SCSS compilado -->
</head>
<body class="theme-dark">
  <main id="app" class="container">
    <section id="homeView" class="home">
      <h2 class="eyebrow">Post recientes</h2>

      <div class="carousel">
        <button class="carousel__nav prev">‹</button>
        <div class="carousel__track" id="carouselTrack"></div>
        <button class="carousel__nav next">›</button>
        <div class="carousel__dots" id="carouselDots"></div>
      </div>

      <div class="posts-grid" id="postsGrid"></div>
    </section>

    <section id="detailView" class="detail" hidden>
      <a href="#" class="detail__back" id="backBtn">← Regresar</a>
      <article class="post" id="detailPost"></article>
    </section>
  </main>

  <script defer src="/js/blog.js"></script>
</body>
</html>
