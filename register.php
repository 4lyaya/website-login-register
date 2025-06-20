<?php
// Mulai session
session_start();

// Include koneksi database
require_once 'config/database.php';

// Set judul halaman
$page_title = "Daftar Akun";
?>
<?php include 'includes/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Akun Baru</h4>
            </div>
            <div class="card-body">
                <form action="process/register_process.php" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
                <div class="mt-3">
                    Sudah punya akun? <a href="login.php">Login disini</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>