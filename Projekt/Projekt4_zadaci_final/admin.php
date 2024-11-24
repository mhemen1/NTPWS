<?php
if(is_admin()) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = $_POST['ime'];
        $last_name = $_POST['prezime'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $prijava = $_POST['prijava'];
        $id = $_POST['id'];
        $query = "UPDATE users SET 
                firstname = '$first_name', 
                lastname = '$last_name', 
                email= '$email',
                role='$role',
                prijava='$prijava'
                WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            echo "<p class=\"success\">Podaci su uspješno izmjenjeni u bazi!</p>";
        } else {
            echo "<p class=\"fail\">Greška pri promjeni podataka:</p> " . mysqli_error($conn);
        }
       
    }
    
    $query="SELECT id,firstname,lastname,email,role,prijava FROM users";
    $result =mysqli_query($conn,$query);
    if ($result != false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<form action="" method="post">';
                echo '<table border="1" cellspacing="0" cellpadding="5">';
                echo '<tr><th>Ime</th><th>Prezime</th><th>Email</th><th>Prijava</th><th>Role</th></tr>';
                echo '<tr style=background:skyblue;>';
                echo '<td>' . htmlspecialchars($row['firstname']) . '</td>';
                echo '<td>' . htmlspecialchars($row['lastname']) . '</td>';
                echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                echo '<td>' . htmlspecialchars($row['prijava']) . '</td>';
                echo '<td>' . htmlspecialchars($row['role']) . '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">';
                echo '<td><input type="text" name="ime" value="' . htmlspecialchars($row['firstname']) . '"></td>';
                echo '<td><input type="text" name="prezime" value="' . htmlspecialchars($row['lastname']) . '"></td>';
                echo '<td><input type="text" name="email" value="' . htmlspecialchars($row['email']) . '"></td>';
                echo '<td><input type="number" name="prijava" value="' . htmlspecialchars($row['prijava']) . '"></td>';
                echo '<td><select id="role" name="role">';
                echo "<option value=".$row['role']." selected >" .htmlspecialchars($row['role'])."</option>
                <option value=\"admin\">Admin</option>
                <option value=\"editor\">Editor</option>
                <option value=\"user\">User</option>
                </select></td>";

                echo '</tr>';
                echo '</table>';
                echo '<input type="submit" value="Spremi izmjene">';
                echo '</form><br><br>';
            }
        
        } else {
            echo "Nema dostupnih podataka.";
        }

}else {
    echo '<p class="fail">Nemate prava!</p>';
    header("refresh:3;url=index.php");
}
?>