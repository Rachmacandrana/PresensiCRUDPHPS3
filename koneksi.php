<?php
// ============================================
// koneksi.php - Konfigurasi Database (RDS) & Storage (S3)
// ============================================

// 1. Load AWS SDK (Pastikan folder 'vendor' ada di direktori project Anda)
require 'vendor/autoload.php';
use Aws\S3\S3Client;

// 2. Konfigurasi Database RDS
define('DB_HOST', 'localhost'); // Ganti dengan Endpoint RDS Anda
define('DB_USER', '');
define('DB_PASS', ''); 
define('DB_NAME', 'db_absensi');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Koneksi RDS Gagal: " . $conn->connect_error);
}

// 3. Konfigurasi AWS S3
$bucketName = 'nama-bucket-anda'; // Ganti dengan nama bucket S3 Anda
$region     = 'us-east-1';        // Ganti sesuai region bucket Anda

$s3 = new S3Client([
    'version' => 'latest',
    'region'  => $region,
    'credentials' => [
        'key'    => 'AKIAXXXXXXXXXXXXXXXX', // Ganti dengan Access Key IAM
        'secret' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', // Ganti dengan Secret Key IAM
    ],
]);

// Set charset
$conn->set_charset('utf8mb4');
?>