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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $country = $_POST['country'];
    $id = $_POST['id'];
    $query = "UPDATE users SET 
            name = '$first_name', 
            lastname = '$last_name', 
            country_code= $country 
            WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "Podaci su uspješno izmjenjeni u bazi!";
    } else {
        echo "Greška pri promjeni podataka: " . mysqli_error($conn);
    }
   
}

// Logika pretrage
$rezultati = [];
    $sql = "SELECT 
        users.id,
        users.name AS 'First Name',
        users.lastname AS 'Last Name',
        users.country_code as ccode,
        countries.country_name as 'Country'
        FROM users
        INNER JOIN 
        countries 
        ON 
        users.country_code = countries.country_code ORDER BY  users.name ASC;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rezultati[] = $row;
        }
    } else {
        $poruka = "Prazna tablica";
    }
    mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vjezba 18</title>
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

<h1>Vjezba 18</h1>

    <?php if (!empty($rezultati))
            foreach ($rezultati as $korisnik) {
                $id=$korisnik['id'];
                $name=$korisnik['First Name'];
                $lname=$korisnik['Last Name'];
                $country=$korisnik['Country'];
                $ccode=$korisnik['ccode'];
                print "<form action=\"\" method=\"post\">";
                print $name ." ". $lname." (".$country.") <input type=text name=fname value=$name> <input type=text name=lname value=$lname> 
                 <select id=\"country\" name=\"country\">
                    <option value=$ccode selected >$country</option>
                    <option value=\"191\">Hrvatska</option>
                    <option value=\"276\">Njemačka</option>
                    <option value=\"250\">Francuska</option>
                    <option value=\"380\">Italija</option>
                    <option value=\"840\">SAD</option>
                </select> <input type=\"hidden\" name=id value=$id> <input type=submit><br>";
                print "</form>";
            }?>


</body>
</html>
