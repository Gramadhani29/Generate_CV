<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Generator</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">CV Generator</h1>
        <form action="generate_cv.php" method="post">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="full_name" name="full_name" value="<?= htmlspecialchars($_POST['full_name'] ?? '') ?>" placeholder="Masukkan nama lengkap Anda" required>
                        <label for="full_name">Nama Lengkap</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="Masukkan email Anda" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" placeholder="Masukkan nomor telepon Anda" required>
                        <label for="phone">Nomor Telepon</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="address" name="address" placeholder="Masukkan alamat lengkap Anda" style="height: 100px" required><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>
                        <label for="address">Alamat</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="skills" name="skills" placeholder="Contoh: Pemrograman, Desain Grafis, Manajemen Proyek" style="height: 120px" required><?= htmlspecialchars($_POST['skills'] ?? '') ?></textarea>
                        <label for="skills">Keahlian</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="education" name="education" placeholder="Contoh: Universitas Telkom - Sistem Informasi (2022 - Sekarang)" style="height: 120px" required><?= htmlspecialchars($_POST['education'] ?? '') ?></textarea>
                        <label for="education">Pendidikan</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="experience" name="experience" placeholder="Contoh: Magang di PT ABC, Staff IT di XYZ Company" style="height: 150px" required><?= htmlspecialchars($_POST['experience'] ?? '') ?></textarea>
                        <label for="experience">Pengalaman Kerja</label>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <input type="submit" class="btn btn-primary" value="Preview CV">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
