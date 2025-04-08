<?php
require 'auth.php';
require 'db_connection.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    $imagePath = '';

    // Process image upload
    if (isset($_FILES['image'])) {
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $filename = basename($_FILES['image']['name']);
            $targetFile = $uploadDir . uniqid() . '_' . $filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imagePath = $targetFile;
            } else {
                $error = 'Pildi üleslaadimine ebaõnnestus';
            }
        } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $error = 'Pildi üleslaadimisel tekkis viga';
        }
    }

    if (!isset($error)) {
        $post = [
            'title' => $_POST['title'] ?? '',
            'date' => $_POST['date'] ?? '',
            'image' => $imagePath,
            'content' => $_POST['content'] ?? ''
        ];

        if (empty($post['title']) || empty($post['date']) || empty($post['content'])) {
            $error = 'Palun täida kõik kohustuslikud väljad';
        } else {
            $posts = [];
            if (file_exists('posts.json')) {
                $posts = json_decode(file_get_contents('posts.json'), true) ?: [];
            }

            array_unshift($posts, $post);
            file_put_contents('posts.json', json_encode($posts, JSON_PRETTY_PRINT));

            header('Location: admin.php?success=1');
            exit;
        }
    }
}

$success = isset($_GET['success']);
$posts = file_exists('posts.json') ? json_decode(file_get_contents('posts.json'), true) ?: [] : [];
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HRL Admin Panel</title>
  <link rel="icon" href="/public/assets/images/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --sidebar-width: 250px;
      --topbar-height: 60px;
      --primary-color: #2c3e50;
      --secondary-color: #e74c3c;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow-x: hidden;
    }
    
    #sidebar {
      width: var(--sidebar-width);
      height: 100vh;
      position: fixed;
      background: var(--primary-color);
      color: white;
      transition: all 0.3s;
      z-index: 1000;
    }
    
    #main-content {
      margin-left: var(--sidebar-width);
      padding: 20px;
      padding-top: calc(var(--topbar-height) + 20px);
    }
    
    #topbar {
      height: var(--topbar-height);
      position: fixed;
      top: 0;
      right: 0;
      left: var(--sidebar-width);
      z-index: 999;
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
      padding: 0 20px;
    }
    
    .sidebar-link {
      color: rgba(255,255,255,0.8);
      padding: 12px 20px;
      display: block;
      text-decoration: none;
      transition: all 0.2s;
    }
    
    .sidebar-link:hover, .sidebar-link.active {
      color: white;
      background: rgba(255,255,255,0.1);
    }
    
    .sidebar-link i {
      width: 24px;
      text-align: center;
      margin-right: 10px;
    }
    
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      transition: transform 0.3s;
      margin-bottom: 20px;
    }
    
    .card:hover {
      transform: translateY(-5px);
    }
    
    .stat-card {
      border-left: 4px solid var(--secondary-color);
      height: 100%;
    }
    
    .form-container {
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    
    .post-list-item {
      transition: all 0.2s;
    }
    
    .post-list-item:hover {
      background: #f8f9fa;
    }

    /* Mobile Responsive Styles */
    @media (max-width: 992px) {
      #sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      
      #main-content {
        margin-left: 0;
        padding-top: 20px;
      }
      
      #topbar {
        position: relative;
        left: 0;
        margin-bottom: 20px;
        box-shadow: none;
      }

      .stat-card {
        margin-bottom: 15px;
      }
    }

    @media (max-width: 768px) {
      .row-cols-md-3 > * {
        flex: 0 0 100%;
        max-width: 100%;
      }
    }

    /* Mobile menu toggle */
    #mobile-menu-toggle {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      position: absolute;
      right: 15px;
      top: 15px;
    }

    @media (max-width: 992px) {
      #mobile-menu-toggle {
        display: block;
      }
      
      #sidebar {
        height: auto;
        max-height: 60px;
        overflow: hidden;
        transition: max-height 0.3s ease;
      }
      
      #sidebar.active {
        max-height: 500px;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar with mobile toggle -->
  <div id="sidebar">
    <div class="p-4 position-relative">
      <button id="mobile-menu-toggle" class="d-lg-none">
        <i class="fas fa-bars"></i>
      </button>
      <div class="text-center mb-4">
        <img src="/public/assets/images/logo.png" alt="HRL Logo" width="80">
        <h4 class="mt-3">HRL Admin</h4>
      </div>
      
      <nav class="mt-4">
        <a href="admin.php" class="sidebar-link active">
          <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="blog.php" class="sidebar-link">
          <i class="fas fa-newspaper"></i> Blogipostitused
        </a>
        <a href="logout.php" class="sidebar-link text-danger">
          <i class="fas fa-sign-out-alt"></i> Logi välja
        </a>
      </nav>
    </div>
  </div>

  <!-- Topbar -->
  <div id="topbar">
    <div class="ms-auto d-flex align-items-center">
      <span class="me-3 d-none d-sm-inline">Tere, <?= htmlspecialchars($_SESSION['username']) ?></span>
      <a href="logout.php" class="btn btn-sm btn-outline-danger">
        <i class="fas fa-sign-out-alt me-1"></i> <span class="d-none d-sm-inline">Logout</span>
      </a>
    </div>
  </div>

  <!-- Main Content -->
  <div id="main-content">
    <div class="container-fluid">
      <?php if ($success): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Salvestatud!</strong> Postitus on edukalt lisatud.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sulge"></button>
        </div>
      <?php endif; ?>
      
      <?php if (isset($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= htmlspecialchars($error) ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sulge"></button>
        </div>
      <?php endif; ?>

      <!-- Stats Cards - Now properly responsive -->
      <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
        <div class="col">
          <div class="card stat-card">
            <div class="card-body">
              <h5 class="card-title text-muted">Postitused kokku</h5>
              <h2 class="mb-0"><?= count($posts) ?></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card stat-card">
            <div class="card-body">
              <h5 class="card-title text-muted">Viimane postitus</h5>
              <h2 class="mb-0">
                <?= !empty($posts) ? date('d.m.Y', strtotime($posts[0]['date'])) : '-' ?>
              </h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card stat-card">
            <div class="card-body">
              <h5 class="card-title text-muted">Aktiivne kasutaja</h5>
              <h2 class="mb-0"><?= htmlspecialchars($_SESSION['username']) ?></h2>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header bg-white">
              <h5 class="mb-0"><i class="fas fa-pen-fancy me-2"></i>Uus blogipostitus</h5>
            </div>
            <div class="card-body">
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
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
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
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-header bg-white">
              <h5 class="mb-0"><i class="fas fa-list me-2"></i>Viimased postitused</h5>
            </div>
            <div class="card-body p-0">
              <?php if (!empty($posts)): ?>
                <div class="list-group list-group-flush">
                  <?php foreach (array_slice($posts, 0, 5) as $index => $post): ?>
                    <a href="#" class="list-group-item list-group-item-action post-list-item d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="mb-1"><?= htmlspecialchars($post['title']) ?></h6>
                        <small class="text-muted"><?= date('d.m.Y', strtotime($post['date'])) ?></small>
                      </div>
                      <span class="badge bg-<?= $index === 0 ? 'primary' : 'secondary' ?> rounded-pill"><?= $index + 1 ?></span>
                    </a>
                  <?php endforeach; ?>
                </div>
              <?php else: ?>
                <div class="p-4 text-center text-muted">
                  <i class="fas fa-inbox fa-3x mb-3"></i>
                  <p>Postitusi pole veel lisatud</p>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Form validation
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
    
    // Mobile menu toggle
    document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
      document.getElementById('sidebar').classList.toggle('active');
    });
  </script>
</body>
</html>