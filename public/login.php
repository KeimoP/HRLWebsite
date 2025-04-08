<?php
session_start();
require 'db_connection.php';

// Clear any existing session data
session_unset();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get raw input (no trimming for passwords!)
    $username = trim($_POST['username']);
    $password = $_POST['password']; 
    
    try {
        // Case-sensitive username check
        $stmt = $pdo->prepare("SELECT * FROM users WHERE BINARY username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password_hash'])) {
            // Regenerate session ID to prevent fixation
            session_regenerate_id(true);
            
            // Set secure session data
            $_SESSION = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'ip' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'last_activity' => time()
            ];
            
            header('Location: admin.php');
            exit;
        } else {
            $error = "Invalid username or password";
        }
    } catch (PDOException $e) {
        error_log("Login error: " . $e->getMessage());
        $error = "Database error occurred";
    }
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-box { max-width: 400px; margin: 5rem auto; border: 1px solid #ddd; border-radius: 10px; padding: 2rem; }
        .alert { margin-top: 1rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box shadow">
            <h2 class="text-center mb-4">Admin Login</h2>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            
            <form method="POST" autocomplete="off">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>