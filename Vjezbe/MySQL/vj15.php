<?php
$host = 'localhost'; // Promenite ako je potrebno
$user = 'root';      // Korisničko ime za MySQL
$password = '';      // Lozinka za MySQL
$dbname = 'NTPWS';

$conn = new mysqli($host, $user, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Greška pri povezivanju s bazom: " . $conn->connect_error);
}

// Logika pretrage
$rezultati = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unos = $conn->real_escape_string($_POST['unos']);
    $sql = "SELECT * FROM users WHERE name LIKE '%$unos%' OR lastname LIKE '%$unos%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rezultati[] = $row;
        }
    } else {
        $poruka = "Nema rezultata.";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pretraga korisnika</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 20px; }
        form { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .poruka { color: red; font-weight: bold; }
    </style>
</head>
<body>

<h1>Pretraga korisnika</h1>
<form method="POST">
    <label for="unos">Unesite ime ili prezime:</label>
    <input type="text" name="unos" id="unos" required>
    <button type="submit">Pretraži</button>
</form>

<?php if (isset($poruka)): ?>
    <p class="poruka"><?php echo $poruka; ?></p>
<?php endif; ?>

<?php if (!empty($rezultati)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Prezime</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rezultati as $korisnik): ?>
                <tr>
                    <td><?php echo $korisnik['id']; ?></td>
                    <td><?php echo $korisnik['name']; ?></td>
                    <td><?php echo $korisnik['lastname']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>
