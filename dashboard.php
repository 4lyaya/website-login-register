<?php
require_once 'includes/auth_check.php';
$page_title = "Dashboard";
require_once 'includes/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Selamat Datang, <?php echo htmlspecialchars($_SESSION['user_nama']); ?>!</h3>
                </div>
                <div class="card-body">
                    <p>Email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
                    <a href="logout.php" class="btn btn-danger mb-4">Logout</a>

                    <h4 class="mt-4">Daftar Akun Terdaftar</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Kekuatan Password</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'config/database.php';
                                $query = "SELECT id, nama, email, password, created_at FROM users ORDER BY created_at DESC";
                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Hitung kekuatan password
                                        $length = strlen($row['password']);
                                        if ($length > 12) {
                                            $strength = '<span class="badge bg-success">Sangat Kuat</span>';
                                        } elseif ($length > 8) {
                                            $strength = '<span class="badge bg-primary">Kuat</span>';
                                        } elseif ($length > 6) {
                                            $strength = '<span class="badge bg-warning">Sedang</span>';
                                        } else {
                                            $strength = '<span class="badge bg-danger">Lemah</span>';
                                        }

                                        echo "<tr>
                                                <td>" . htmlspecialchars($row['id']) . "</td>
                                                <td>" . htmlspecialchars($row['nama']) . "</td>
                                                <td>" . htmlspecialchars($row['email']) . "</td>
                                                <td>" . str_repeat('•', 8) . "</td>
                                                <td>$strength</td>
                                                <td>" . date('d-m-Y H:i', strtotime($row['created_at'])) . "</td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data akun</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>