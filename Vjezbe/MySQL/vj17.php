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

    $sql = "SELECT 
        users.name AS 'First Name',
        users.lastname AS 'Last Name',
        countries.country_name as 'Country'
        FROM users
        INNER JOIN 
        countries 
        ON 
        users.country_code = countries.country_code;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rezultati[] = $row;
        }
    } else {
        $poruka = "Prazna tablica";
    }

?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vjezba 17</title>
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

<h1>Vjezba 17</h1>

<?php if (!empty($rezultati))
        foreach ($rezultati as $korisnik) {
            print $korisnik['First Name'] ." ". $korisnik['Last Name']." (".$korisnik['Country'].")<br>";
        }?>


</body>
</html>
