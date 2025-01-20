<?php
// Sertakan file FPDF
require('fpdf/fpdf.php');

// Fungsi untuk membuat PDF
function generatePDF($data) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetMargins(10, 10, 10);

    // Header: Nama & Kontak
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, $data['full_name'], 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, $data['email'] . ' | ' . $data['phone'], 0, 1, 'C');
    $pdf->MultiCell(0, 8, $data['address'], 0, 'C');

    $pdf->Ln(10); // Spasi

    // Pendidikan
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'PENDIDIKAN', 0, 1);
    $pdf->SetFont('Arial', '', 11);
    $pdf->MultiCell(0, 8, $data['education']);

    // Pengalaman Kerja
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'PENGALAMAN KERJA', 0, 1);
    $pdf->SetFont('Arial', '', 11);
    $pdf->MultiCell(0, 8, $data['experience']);

    // Keahlian
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'KEAHLIAN', 0, 1);
    $pdf->SetFont('Arial', '', 11);
    $pdf->MultiCell(0, 8, $data['skills']);

    // Output file PDF
    $pdf->Output('D', 'CV_' . str_replace(' ', '_', $data['full_name']) . '.pdf');
}

// Tangani form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    if ($_POST['action'] === 'download') {
        // Data dari form
        $data = [
            'full_name' => htmlspecialchars($_POST['full_name']),
            'email' => htmlspecialchars($_POST['email']),
            'phone' => htmlspecialchars($_POST['phone']),
            'address' => htmlspecialchars($_POST['address']),
            'skills' => htmlspecialchars($_POST['skills']),
            'education' => htmlspecialchars($_POST['education']),
            'experience' => htmlspecialchars($_POST['experience'])
        ];

        // Buat PDF
        generatePDF($data);
        exit;
    }
}

// Tangani data untuk preview
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'full_name' => htmlspecialchars($_POST['full_name']),
        'email' => htmlspecialchars($_POST['email']),
        'phone' => htmlspecialchars($_POST['phone']),
        'address' => nl2br(htmlspecialchars($_POST['address'])),
        'skills' => nl2br(htmlspecialchars($_POST['skills'])),
        'education' => nl2br(htmlspecialchars($_POST['education'])),
        'experience' => nl2br(htmlspecialchars($_POST['experience']))
    ];
} else {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview CV</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cv-container">
        <h1 style="text-align: center;"><?= $data['full_name'] ?></h1>
        <p style="text-align: center;"><?= $data['email'] ?> | <?= $data['phone'] ?></p>
        <p style="text-align: center;"><?= $data['address'] ?></p>

        <hr>

        <h2>PENDIDIKAN</h2>
        <p><?= $data['education'] ?></p>

        <h2>PENGALAMAN KERJA</h2>
        <p><?= $data['experience'] ?></p>

        <h2>KEAHLIAN</h2>
        <p><?= $data['skills'] ?></p>

        <hr>

        <form action="generate_cv.php" method="post" style="display: inline-block;">
            <!-- Hidden Input untuk Data -->
            <input type="hidden" name="full_name" value="<?= htmlspecialchars($data['full_name']) ?>">
            <input type="hidden" name="email" value="<?= htmlspecialchars($data['email']) ?>">
            <input type="hidden" name="phone" value="<?= htmlspecialchars($data['phone']) ?>">
            <input type="hidden" name="address" value="<?= htmlspecialchars($data['address']) ?>">
            <input type="hidden" name="skills" value="<?= htmlspecialchars($data['skills']) ?>">
            <input type="hidden" name="education" value="<?= htmlspecialchars($data['education']) ?>">
            <input type="hidden" name="experience" value="<?= htmlspecialchars($data['experience']) ?>">

            <!-- Tombol -->
            <input type="hidden" name="action" value="download">
            <input type="submit" value="Download PDF" style="margin-top: 20px;">
        </form>

        <!-- Tombol Kembali -->
        <form action="index.php" method="get" style="display: inline-block; margin-left: 10px;">
            <input type="submit" value="Kembali" style="color: white; background-color: red; margin-top: 20px;">
        </form>
    </div>
</body>
</html>
