<?php
require 'auth.php';
?>
<?php
// Vormi saatmise käsitlemine
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    $imagePath = '';

    // Töödelda pildi üleslaadimist
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $filename = basename($_FILES['image']['name']);
        $targetFile = $uploadDir . uniqid() . '_' . $filename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        } else {
            die('Pildi üleslaadimine ebaõnnestus.');
        }
    }

    $post = [
        'title' => $_POST['title'] ?? '',
        'date' => $_POST['date'] ?? '',
        'image' => $imagePath,
        'content' => $_POST['content'] ?? ''
    ];

    if (empty($post['title']) || empty($post['date']) || empty($post['content'])) {
        die('Palun täida kõik kohustuslikud väljad');
    }

    $posts = [];
    if (file_exists('posts.json')) {
        $posts = json_decode(file_get_contents('posts.json'), true) ?: [];
    }

    array_unshift($posts, $post);
    file_put_contents('posts.json', json_encode($posts, JSON_PRETTY_PRINT));

    header('Location: admin.php?success=1');
    exit;
}

$success = isset($_GET['success']);
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blogipostituse loomine</title>
  <link rel="icon" href="/public/assets/images/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    
    .form-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 2rem;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="form-container">
      <?php if ($success): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Salvestatud!</strong> Postitus on edukalt lisatud.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sulge"></button>
        </div>
      <?php endif; ?>

      <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary">
          <i class="fas fa-pen-fancy me-2"></i>Uus blogipostitus
        </h1>
        <p class="lead text-muted">Lisa ja salvesta uusi postitusi</p>
      </div>

      <form id="postForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="mb-4">
          <label for="title" class="form-label fw-bold">Pealkiri</label>
          <input type="text" class="form-control form-control-lg" id="title" name="title" placeholder="Sisesta pealkiri" required>
          <div class="invalid-feedback">Palun sisesta pealkiri.</div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label for="date" class="form-label fw-bold">Kuupäev</label>
            <input type="date" class="form-control" id="date" name="date" required>
            <div class="invalid-feedback">Palun vali kuupäev.</div>
          </div>
          <div class="col-md-6">
            <label for="image" class="form-label fw-bold">Esilehe pilt</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            <div class="invalid-feedback">Palun lae üles pilt.</div>
          </div>
        </div>

        <div class="mb-4">
          <label for="content" class="form-label fw-bold">Sisu</label>
          <textarea class="form-control" id="content" name="content" rows="8" placeholder="Kirjuta oma postituse sisu siia..." required></textarea>
          <div class="invalid-feedback">Palun lisa postituse sisu.</div>
        </div>

        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary btn-lg">
            <i class="fas fa-save me-2"></i>Salvesta postitus
          </button>
        </div>
      </form>

      <div class="mt-5">
        <h2 class="h4 fw-bold mb-3">
          <i class="fas fa-list me-2"></i>Viimased postitused
        </h2>
        <div class="card">
          <div class="card-body">
            <?php if (file_exists('posts.json')): ?>
              <?php $posts = json_decode(file_get_contents('posts.json'), true) ?: []; ?>
              <?php if (!empty($posts)): ?>
                <ul class="list-group list-group-flush">
                  <?php foreach (array_slice($posts, 0, 5) as $post): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <?= htmlspecialchars($post['title']) ?>
                      <span class="badge bg-secondary rounded-pill"><?= $post['date'] ?></span>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php else: ?>
                <p class="text-muted">Postitusi pole veel lisatud.</p>
              <?php endif; ?>
            <?php else: ?>
              <p class="text-muted">Faili <code>posts.json</code> ei leitud.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    (function () {
      'use strict'
      const form = document.getElementById('postForm')

      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })()
  </script>
</body>
</html>
