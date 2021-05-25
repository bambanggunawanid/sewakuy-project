<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('assets/css/tailwind.output.css') ?>" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="<?= base_url('assets/js/init-alpine.js') ?>" defer></script>
    <style>
        .body-bg {
            background-color: #9921e8;
            background-image: linear-gradient(315deg, #9921e8 0%, #5f72be 74%);
        }
    </style>
  </head>
  <body class="body-bg">
    <?= $this->renderSection('content') ?>
  </body>
</html>
