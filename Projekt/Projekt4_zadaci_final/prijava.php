<?php 
if(!logged_in()) {
?>
    <section class="prijava-form" id="prijava">
        <h2>Prijava</h2>
        <form action="" name="prijava" method="post">
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" /><br>
           
            <label for="password">Lozinka:</label>
            <input id="password" type="password" name="password" /><br>
            <input type="submit" value="Prijava" name="submit">
        </form>
    </section>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email= $_POST['email'];
    $lozinka=$_POST['password'];
    $stmt=mysqli_stmt_init($conn);

    $query="SELECT firstname,lastname,password,role,prijava FROM users Where email=?";
    if(mysqli_stmt_prepare($stmt,$query)) {
        mysqli_stmt_bind_param($stmt,'s',$email);
        $result =mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if($result && mysqli_stmt_num_rows($stmt)>0) {
            mysqli_stmt_bind_result($stmt, $ime, $prezime,$blozinka,$role,$prijava);
            mysqli_stmt_fetch($stmt);
            if($prijava>0 && password_verify($lozinka,$blozinka)) {
                $_SESSION['fname']=$ime;
                $_SESSION['lname']=$prezime;
                $_SESSION['role']=$role;
                $_SESSION['logged_in']=1;
                echo '<p class="success">Dobro došli '. $ime .'.</p>';
                header( "refresh:3;url=index.php" );

            }else
                echo '<p class="fail">Unijeli ste pogrešan email/lozinku ili Vam nije odobrena prijava.</p>';
        }               
    }else
    echo '<p class="fail">Neuspješno. ',mysqli_error($conn);

    }
}
else {
    echo "Već ste prijavljeni!";
    header( "refresh:1;url=index.php" );
}
?>