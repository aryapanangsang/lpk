<?php
// Inisialisasi variabel
$errors = [];
$success = "";
$username = $email = $password = $confirm_password = "";

// Proses form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // Validasi input
    if (empty($username)) {
        $errors[] = "Username tidak boleh kosong.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password minimal 6 karakter.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Password dan konfirmasi password tidak cocok.";
    }

    // Jika tidak ada error
    if (empty($errors)) {
        $success = "Registrasi berhasil! Data Anda telah disimpan.";
        // Simpan ke database atau proses lainnya di sini
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <!-- Link ke Material Design Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" />
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Form Registrasi</h2>
        <!-- Tampilkan pesan kesalahan -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Tampilkan pesan sukses -->
        <?php if (!empty($success)): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <form action="reg.php" method="POST" class="needs-validation" novalidate>
            <!-- Username -->
            <div class="form-outline mb-4">
                <input type="text" id="username" name="username" class="form-control" value="<?= htmlspecialchars($username) ?>" required />
                <label class="form-label" for="username">Username</label>
            </div>

            <!-- Email -->
            <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required />
                <label class="form-label" for="email">Email</label>
            </div>

            <!-- Password -->
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" required />
                <label class="form-label" for="password">Password</label>
            </div>

            <!-- Konfirmasi Password -->
            <div class="form-outline mb-4">
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required />
                <label class="form-label" for="confirm_password">Konfirmasi Password</label>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Daftar</button>
        </form>
    </div>

    <!-- Script MDB -->
    <script type="text/javascript" src="Assets/mdb/js/mdb.umd.min.js"></script>
</body>
</html>
