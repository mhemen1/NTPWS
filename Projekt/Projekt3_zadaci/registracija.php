<?php 
$sql = "SELECT country_name AS cname, country_code as ccode FROM countries";
$result = $conn->query($sql);

function checkusername($username,$conn) {
    $query="SELECT username from users where username LIKE '%$username%'";
    $result = $conn->query($query);
    if($result !== false && $result->num_rows >0){
        $item=$username . (string)rand(10,500);
        return checkusername($username,$conn);
    }
    else
        return $username;
}
function check($item,$value,$conn) {
    $query="SELECT $item from users where $item LIKE '%$value%'";
    $result = $conn->query($query);
    if($result !== false && $result->num_rows >0){
      return False;
    }
    else
        return True;
}


echo '<section class="register-form">';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname=$_POST['fname'];
    $prezime=$_POST['lname'];
    $email=$_POST['email'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $street=$_POST['street'];
    $dob=$_POST['dob'];
    if(check('email',$email,$conn)) {
        
        $username= substr($fname, 0, 1) . $prezime;
        $username=checkusername($username,$conn);
        $lozinka=$_POST['password'];
        $hlozinka=password_hash($lozinka,CRYPT_BLOWFISH);
    
    
        $query="INSERT INTO users (firstname,lastname,email,country,city,street,username,password,dob) VALUES (?, ?, ?, ?, ?,?,?,?,?)";
        $stmt=mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $query)){ 
            mysqli_stmt_bind_param($stmt,'sssssssss',$fname,$prezime,$email,$country,$city,$street,$username,$hlozinka,$dob);
            if(mysqli_stmt_execute($stmt))
                echo '<p class="success">Registracija je uspješna. Možete se <a href="index.php?menu=6">prijaviti.</a></p>'; 
            else 
                echo '<p class="fail">Neuspješna registracija.';
            }
    }else echo '<p class="fail">Email već postoji.';
}


echo '
<h2>Registracija</h2>
<form action="" method="POST">
    <label for="first-name">Ime:</label>
    <input type="text" id="fname" name="fname" required>
    <label for="lname">Prezime:</label>
    <input type="text" id="lname" name="lname" required>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="country">Država:</label>
    <select id="country" name="country" >';
    if ($result->num_rows > 0) {
        // Petlja za ispis opcija u <select>
        foreach ($result as $row) {
            echo '<option value="' . htmlspecialchars($row['ccode']) . '">' . htmlspecialchars($row['cname']) . '</option>';
        }
    } else {
        echo '<option value="">Nema dostupnih država</option>';
    }
    

    echo '</select>
    <label for="city">Grad:</label>
    <input type="text" id="city" name="city">
    <label for="street">Ulica:</label>
    <input type="text" id="street" name="street">
    <label for="dob">Datum rođenja:</label>
    <input type="date" id="dob" name="dob">
     <label for="password">Lozinka</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Pošalji">
</form>
</section>
';

?>