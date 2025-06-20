<?php
session_start();
$page_title = "Halaman Utama";
require_once 'includes/header.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto text-center">
            <h1 class="display-4">Selamat Datang</h1>
            <p class="lead">Aplikasi Belajar Login dan Register dengan PHP Native</p>
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="dashboard.php" class="btn btn-primary btn-lg mr-3">Dashboard</a>
                <a href="logout.php" class="btn btn-danger btn-lg">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary btn-lg mr-3">Login</a>
                <a href="register.php" class="btn btn-success btn-lg">Register</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>