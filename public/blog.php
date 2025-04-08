<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRL OÜ - Blogi</title>
    <link rel="icon" href="/public/assets/images/logo.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .jumbotron {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1601584115197-04ecc0da31e8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 150px 0;
            margin-bottom: 0;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
        }
        
        .blog-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 30px;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .blog-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .bg-light-gray {
            background-color: #f8f9fa;
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-primary:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
        
        .navbar {
            background-color: var(--primary-color) !important;
        }
        
        footer {
            background-color: var(--primary-color);
            color: white;
        }
        
        .blog-header {
            margin-bottom: 50px;
        }
        
        .admin-badge {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="fas me-2"><img height="64" src="assets/images/logo.png" alt=""></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Avaleht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#teenused">Teenused</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#meist">Meist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="blog.php">Blogi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#kontakt">Kontakt</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Blog Header -->
    <div class="jumbotron jumbotron-fluid text-center d-none d-lg-block">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4">HRL Blogi</h1>
            <p class="lead fs-2 mb-5">Uudised ja uuendused meie veoteenuste kohta</p>
        </div>
    </div>

    <!-- Blog Posts Section -->
    <section class="container my-5">
        <div id="blog-posts"></div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
    <div class="container">
        <div class="row">
            <!-- Vasak pool - Tutvustus -->
            <div class="col-lg-4 mb-4">
                <h5><i class="fas fa-truck-moving me-2"></i>HRL OÜ</h5>
                <p class="mt-2">Professionaalsed veoteenused alates 2010. aastast</p>
                <div class="social-links mt-3">
                    <a href="https://www.facebook.com/100063542382477/about/?_rdr" class="text-white me-3">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <!-- Võib lisada ka teisi sotsiaalmeedia linke -->
                </div>
            </div>
            
            <!-- Keskmine - Kontakt -->
            <div class="col-lg-4 mb-4">
                <h5><i class="fas fa-map-marker-alt me-2"></i>Kontakt</h5>
                <address class="mt-2 mb-0">
                    <p class="mb-1">Tähe 42, Taevast, 12345 Harjumaa</p>
                    <p class="mb-1"><i class="fas fa-phone me-1"></i> +372 5678 9012</p>
                    <p class="mb-0"><i class="fas fa-envelope me-1"></i> info@hrl.ee</p>
                </address>
            </div>
            
            <!-- Parem pool - Rekvisiidid -->
            <div class="col-lg-4 mb-4">
                <h5><i class="fas fa-file-invoice me-2"></i>Rekvisiidid</h5>
                <div class="mt-2">
                    <p class="mb-1"><strong>Registrikood:</strong> 12345678</p>
                    <p class="mb-1"><strong>KMKR:</strong> EE123456789</p>
                    <p class="mb-1"><strong>Arveldusarve:</strong> EE12 3456 7890 1234 5678</p>
                    <p class="mb-0"><strong>Pank:</strong> Swedbank AS</p>
                </div>
            </div>
        </div>
        
        <!-- Alumine riba - Autoriõigused -->
        <div class="row pt-3 border-top">
            <div class="col-md-6 mb-3 mb-md-0">
                <p class="mb-0">&copy; 2025 HRL OÜ. Kõik õigused kaitstud.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">
                    <a href="#" class="text-white text-decoration-none me-3">Privaatsuspoliitika</a>
                    <a href="#" class="text-white text-decoration-none">Kasutajatingimused</a>
                </p>
            </div>
        </div>
    </div>
</footer>
    <script src="script.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>