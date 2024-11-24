<?php
$host = 'localhost'; // Promenite ako je potrebno
$user = 'root';      // Korisničko ime za MySQL
$password = '';      // Lozinka za MySQL
$dbname = 'ntpws-projekt';

$conn = new mysqli($host, $user, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Greška pri povezivanju s bazom: " . $conn->connect_error);
}
?>