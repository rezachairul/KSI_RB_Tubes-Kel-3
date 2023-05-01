<?php
// Mulai sesi PHP
session_start();

// Cek apakah pengguna sudah login atau belum
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: index.html");
    exit();
}

// Include file konfigurasi database
require_once "koneksi.php";

// Inisialisasi variabel
$username = $password = "";
$username_err = $password_err = "";

// Proses data yang dikirim dari form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validasi username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Masukkan username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validasi password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Masukkan password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validasi kredensial pengguna
    if (empty($username_err) && empty($password_err)) {
        // Siapkan pernyataan SELECT
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variabel ke pernyataan persiapan sebagai parameter
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameter
            $param_username = $username;

            // Cobalah untuk mengeksekusi pernyataan persiapan
            if (mysqli_stmt_execute($stmt)) {
                // Simpan hasil query
                mysqli_stmt_store_result($stmt);

                // Periksa apakah username ada di database
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind hasil query ke variabel
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        // Periksa apakah password cocok
                        if (password_verify($password, $hashed_password)) {
                            // Password benar, mulai sesi baru
                            session_start();

                            // Set variabel sesi
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Alihkan pengguna ke halaman dashboard
                            header("location: dashboard.php");
                        } else {
                            // Password salah
                            $password_err = "Password yang dimasukkan salah.";
                        }
                    }
                } else {
                    // Username tidak ditemukan
                    $username_err = "Username yang dimasukkan tidak ditemukan.";
                }
            } else {
                echo "Oops! Terjadi kesalahan. Silakan coba lagi nanti.";
            }

            // Tutup pernyataan persiapan
            mysqli_stmt_close($stmt);
        }
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Load Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">Login</div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                <div class="invalid-feedback"><?php echo $username_err; ?></div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback"><?php echo $password_err; ?></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Load Bootstrap JavaScript libraries -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </body>
</html>
