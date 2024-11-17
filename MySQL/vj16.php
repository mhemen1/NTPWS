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
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $country = $_POST['country'];

    $sql = "INSERT INTO vj16 (first_name, last_name, email, username, password, country) 
            VALUES ('$first_name', '$last_name', '$email', '$username', '$password', '$country')";
    if (mysqli_query($conn, $sql)) {
        echo "Podaci su uspješno spremljeni u bazu!";
    } else {
        echo "Greška pri spremanju podataka: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }
        form input, form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        form input:focus, form select:focus {
            outline: none;
            border-color: #4caf50;
        }
        form .error {
            color: red;
            font-size: 12px;
            margin-bottom: 10px;
        }
        form button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h2>Registration Form</h2>

        <label for="first_name">First Name *</label>
        <input type="text" id="first_name" name="first_name" placeholder="Your name..." required>

        <label for="last_name">Last Name *</label>
        <input type="text" id="last_name" name="last_name" placeholder="Your last name..." required>

        <label for="email">Your E-mail *</label>
        <input type="email" id="email" name="email" placeholder="Your e-mail..." required>

        <label for="username">Username *</label>
        <span class="error">Username must have min 5 and max 10 char</span>
        <input type="text" id="username" name="username" minlength="5" maxlength="10" placeholder="Username..." required>

        <label for="password">Password *</label>
        <span class="error">Password must have min 4 char</span>
        <input type="password" id="password" name="password" minlength="4" placeholder="Password..." required>

        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="none" disabled selected hidden>Molimo odaberite</option>
            <option value="hrvatska">Hrvatska</option>
            <option value="druge">Druge</option>
        </select>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
