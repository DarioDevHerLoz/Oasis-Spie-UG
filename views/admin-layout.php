<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OasisSpieUg <?php echo $titulo; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Noto+Sans+Georgian:wght@100..900&family=Noto+Serif+Georgian:wght@100..900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5cb1d92542.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/build/css/app.css">

</head>
<body class="dashboard">
  <?php 
    include_once __DIR__ .'/templates/admin-header.php';
  ?>
  <div class="dashboard__grid">
    <?php
      include_once __DIR__ .'/templates/admin-sidebar.php';  
    ?>

  <main class="dashboard__contenido">
    <?php 
      echo $contenido; 
    ?> 
  </main>
</div>
</body>
</html>