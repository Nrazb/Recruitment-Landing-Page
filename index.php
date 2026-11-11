<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#0F1B3D">
  <meta name="description" content="Bergabung bersama Sekolah Karir dan temukan kesempatan untuk berkembang.">
  <title>Karier Bersama | Sekolah Karir</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            navy: '#0F1B3D',
            accent: '#FF3D8B'
          },
          fontFamily: {
            sans: ['DM Sans', 'Arial', 'sans-serif'],
            display: ['Manrope', 'DM Sans', 'sans-serif']
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,500;6..96,600;6..96,700;6..96,800&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-navy text-white antialiased">
  <div class="page-glow page-glow-one" aria-hidden="true"></div>
  <div class="page-glow page-glow-two" aria-hidden="true"></div>

  <?php include __DIR__ . '/components/navbar.php'; ?>

  <main class="site-container">
    <?php include __DIR__ . '/components/hero.php'; ?>
    <?php include __DIR__ . '/components/roles.php'; ?>
    <?php include __DIR__ . '/components/cta.php'; ?>
    <?php include __DIR__ . '/components/footer.php'; ?>
  </main>

  <script src="assets/js/script.js"></script>
</body>
</html>