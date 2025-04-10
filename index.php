<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRL OÜ</title>
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
        
        .service-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 30px;
            height: 100%;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .service-icon {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
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
        
        .contact-info-box {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Navigatsioon -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas me-2"><img height="64" src="/public/assets/images/logo.png" alt=""></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Avaleht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#teenused">Teenused</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#meist">Meist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/public/blog.php">Blogi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontakt">Kontakt</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron">
    <div class="container text-center">
        <h1 class="display-3 fw-bold mb-4">HRL Veoteenused</h1>
        <p class="lead fs-2 mb-5">Usaldusväärsed transpordilahendused juba üle 10 aasta</p>
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
            <a href="#teenused" class="btn btn-primary btn-lg px-4">
                <i class="fas fa-list-ul me-1"></i> Meie teenused
            </a>
            <a href="#kontakt" class="btn btn-outline-light btn-lg px-4">
                <i class="fas fa-phone me-1"></i> Tellige kohe
            </a>
        </div>
    </div>
</div>

    <!-- Teenused -->
    <section id="teenused" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold">Meie teenused</h2>
                <p class="lead">Pakime laia valikut professionaalseid veoteenuseid</p>
            </div>
            
            <div class="row g-4">
                <!-- Veoteenus multilift autodega -->
                <div class="col-md-4">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-truck-loading"></i>
                            </div>
                            <h3>Multilift veod</h3>
                            <p class="card-text">
                                Professionaalsed veoteenused multilift süsteemiga erinevate kaupade transportimiseks. 
                                Kiired ja ohutud lahendused kohaleviimiseks.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Treilerveod -->
                <div class="col-md-4">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-trailer"></i>
                            </div>
                            <h3>Treilerveod</h3>
                            <p class="card-text">
                                Suurte ja raskevate koormate transport treileritega. 
                                Spetsiaalselt kohandatud lahendused erinevatele transpordivajadustele.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Fekaalivedu -->
                <div class="col-md-4">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-toilet"></i>
                            </div>
                            <h3>Fekaalivedu</h3>
                            <p class="card-text">
                                Fekaaliveod kuni 8m³ mahutavusega paakautodega. 
                                Kiired reaktsiooniajaga ja korrektne töö vastavalt kõigile nõuetele.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Konteinerite rent ja prügivedu -->
                <div class="col-md-4">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-dumpster"></i>
                            </div>
                            <h3>Konteinerite rent</h3>
                            <p class="card-text">
                                Erinevate suurustega prügikonteinerite rent ja prügivedu. 
                                Paindlikud tingimused nii era- kui ärikliendile.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Täitematerjali müük ja vedu -->
                <div class="col-md-4">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-mountain"></i>
                            </div>
                            <h3>Täitematerjalid</h3>
                            <p class="card-text">
                                Täitematerjalide müük ja vedu. 
                                Pakkume kvaliteetseid materjale koos transporditeenusega.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Kaevandusteenus -->
                <div class="col-md-4">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-digging"></i>
                            </div>
                            <h3>Kaevandusteenus</h3>
                            <p class="card-text">
                                Professionaalne kaevandusteenus 5-tonnise ekskavaatoriga. 
                                Tõhusad lahendused erinevateks kaevandustöödeks.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Laaduriteenus -->
                <div class="col-md-6">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-truck-pickup"></i>
                            </div>
                            <h3>Laaduriteenus (5t)</h3>
                            <p class="card-text">
                                5-tonnise laaduriga teenused. 
                                Ideaalne lahendus keskmise suurusega laadimistöödeks.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <h3>Laaduriteenus (15t)</h3>
                            <p class="card-text">
                                15-tonnise laaduriga teenused. 
                                Võimas lahendus suuremate laadimistööde jaoks.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Meist -->
    <section id="meist" class="py-5 bg-light-gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://scontent.ftll3-1.fna.fbcdn.net/v/t39.30808-6/488678859_1221002006694534_2216492705133352532_n.jpg?stp=cp6_dst-jpg_s960x960_tt6&_nc_cat=110&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=Qz6EZrdClJQQ7kNvwH4-Llb&_nc_oc=Adn8cMa2toebZLjfvmfN5kKK1HmkcN_20xbE_p15DNF28iC6w_5Iw2TEeXfW19uvIT-CdUO4uHMI_OkDs0cvZBDn&_nc_zt=23&_nc_ht=scontent.ftll3-1.fna&_nc_gid=HfQHNUnIGjm_sRfhcMRM7A&oh=00_AYEteIqZIYkYAePGpuyDc7mufDIG8L9GWXQm_KplfZ4eHA&oe=67F580A3" 
                         alt="HRL meeskond" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4">Meist</h2>
                    <p class="lead mb-4">
                        HRL on tegutsenud veoteenuste valdkonnas juba üle 10 aasta, pakkudes klientidele usaldusväärseid ja professionaalseid lahendusi.
                    </p>
                    <p>
                        Meie eesmärk on pakkuda kvaliteetseid teenuseid, mis vastavad klientide ootustele ja ületavad neid. 
                        Meie meeskond koosneb kogenud spetsialistidest, kes teavad oma tööd.
                    </p>
                    <p>
                        Oleme investeerinud kaasaegsesse tehnikasse, et tagada teenuste kvaliteet ja usaldusväärsus. 
                        Meie autopark on pidevalt uuendatud ja hooldatud.
                    </p>
                    <div class="mt-4">
                        <a href="#kontakt" class="btn btn-primary btn-lg px-4">
                            <i class="fas fa-phone me-1"></i> Võta ühendust
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontakt -->
    <section id="kontakt" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold">Kontakt</h2>
                <p class="lead">Võtke meiega ühendust ja saame Teile parima lahenduse pakkuda</p>
            </div>
            
            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="contact-info-box h-100">
                        <h3 class="mb-4">Kontaktandmed</h3>
                        
                        <div class="d-flex align-items-start mb-4">
                            <i class="fas fa-phone-alt text-primary me-3 mt-1"></i>
                            <div>
                                <h5 class="mb-1">Telefon</h5>
                                <p class="mb-0"><a href="tel:5533112">553 3112</a></p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start mb-4">
                            <i class="fas fa-envelope text-primary me-3 mt-1"></i>
                            <div>
                                <h5 class="mb-1">E-post</h5>
                                <p class="mb-0"><a href="mailto:rleemet@gmail.com">rleemet@gmail.com</a></p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start mb-4">
                            <i class="fas fa-map-marker-alt text-primary me-3 mt-1"></i>
                            <div>
                                <h5 class="mb-1">Aadress</h5>
                                <p class="mb-0">Kase 6, Taebla, Estonia, 90801</p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h5 class="mb-3">Jälgi meid sotsiaalmeedias</h5>
                            <a href="https://www.facebook.com/100063542382477/about/?_rdr" class="text-dark me-3"><i class="fab fa-facebook-f fa-2x"></i></a>
                        </div>
                    </div>
                </div>
                
                <?php
// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = $_POST['name'] ?? '';
    $company = $_POST['company'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $service = $_POST['service'] ?? '';
    $message = $_POST['message'] ?? '';
    
    // Validate required fields
    $errors = [];
    if (empty($name)) $errors[] = "Nimi on kohustuslik";
    if (empty($email)) $errors[] = "E-post on kohustuslik";
    if (empty($phone)) $errors[] = "Telefon on kohustuslik";
    if (empty($message)) $errors[] = "Sõnum on kohustuslik";
    
    if (empty($errors)) {
        // Prepare email
        $to = "keimo@hkhk.edu.ee";
        $subject = "Uus päring HRL veoteenuste kodulehelt";
        
        $email_content = "
            <html>
            <head>
                <title>Uus päring</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    table { border-collapse: collapse; width: 100%; }
                    td, th { padding: 8px; border: 1px solid #ddd; text-align: left; }
                    th { background-color: #f2f2f2; }
                </style>
            </head>
            <body>
                <h2>Uus päring</h2>
                <table>
                    <tr><th>Väli</th><th>Väärtus</th></tr>
                    <tr><td>Nimi</td><td>$name</td></tr>
                    <tr><td>Ettevõte</td><td>" . (!empty($company) ? $company : "Määramata") . "</td></tr>
                    <tr><td>E-post</td><td>$email</td></tr>
                    <tr><td>Telefon</td><td>$phone</td></tr>
                    <tr><td>Teenus</td><td>$service</td></tr>
                    <tr><td>Sõnum</td><td>$message</td></tr>
                </table>
            </body>
            </html>
        ";
        
        // Email headers
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        // Send email
        if (mail($to, $subject, $email_content, $headers)) {
            $success = "Päring edukalt saadetud!";
        } else {
            $errors[] = "Päringu saatmine ebaõnnestus. Palun proovige uuesti.";
        }
    }
}
?>

<div class="col-lg-7">
    <div class="contact-info-box h-100">
        <h3 class="mb-4">Saada päring</h3>
        
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nimi</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="company" class="form-label">Ettevõte (valikuline)</label>
                    <input type="text" class="form-control" id="company" name="company" value="<?= isset($_POST['company']) ? htmlspecialchars($_POST['company']) : '' ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">E-post</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Telefon</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="service" class="form-label">Teenus</label>
                <select class="form-select" id="service" name="service">
                    <option value="" <?= !isset($_POST['service']) ? 'selected' : '' ?>>Vali teenus...</option>
                    <option value="Multilift veod" <?= (isset($_POST['service']) && $_POST['service'] === 'Multilift veod') ? 'selected' : '' ?>>Multilift veod</option>
                    <option value="Treilerveod" <?= (isset($_POST['service']) && $_POST['service'] === 'Treilerveod') ? 'selected' : '' ?>>Treilerveod</option>
                    <option value="Fekaalivedu" <?= (isset($_POST['service']) && $_POST['service'] === 'Fekaalivedu') ? 'selected' : '' ?>>Fekaalivedu</option>
                    <option value="Konteinerite rent ja prügivedu" <?= (isset($_POST['service']) && $_POST['service'] === 'Konteinerite rent ja prügivedu') ? 'selected' : '' ?>>Konteinerite rent ja prügivedu</option>
                    <option value="Täitematerjali müük ja vedu" <?= (isset($_POST['service']) && $_POST['service'] === 'Täitematerjali müük ja vedu') ? 'selected' : '' ?>>Täitematerjali müük ja vedu</option>
                    <option value="Kaevandusteenus" <?= (isset($_POST['service']) && $_POST['service'] === 'Kaevandusteenus') ? 'selected' : '' ?>>Kaevandusteenus</option>
                    <option value="Laaduriteenus (5t)" <?= (isset($_POST['service']) && $_POST['service'] === 'Laaduriteenus (5t)') ? 'selected' : '' ?>>Laaduriteenus (5t)</option>
                    <option value="Laaduriteenus (15t)" <?= (isset($_POST['service']) && $_POST['service'] === 'Laaduriteenus (15t)') ? 'selected' : '' ?>>Laaduriteenus (15t)</option>
                    <option value="Muu" <?= (isset($_POST['service']) && $_POST['service'] === 'Muu') ? 'selected' : '' ?>>Muu</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="message" class="form-label">Sõnum</label>
                <textarea class="form-control" id="message" name="message" rows="5" required><?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary px-4 py-2">
                <i class="fas fa-paper-plane me-1"></i> Saada päring
            </button>
        </form>
    </div>
</div>
            </div>
        </div>
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
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
