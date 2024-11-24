<?php
        if(isset($_POST['a']) && isset($_POST['b'])){
            $ocjena1 =$_POST['a'];
            $ocjena2 =$_POST['b'];
           
            $prosjek = ($ocjena1 + $ocjena2) / 2;


            // Provjeri da li je jedna od ocjena negativna
            if ($ocjena1 < 2 || $ocjena2 < 2) {
                $konacnaOcjena = "Negativna";
            } else {
                $konacnaOcjena = round($prosjek, 2);
            }
           
            $poruka = "Ocjene:{$ocjena1} i {$ocjena2} \n Prosječna ocjena: $prosjek<br>Konačna ocjena: $konacnaOcjena";
        }
    ?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Matija Hemen">
    <title>Vj7</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h4>Izračun konačne ocjene</h4>
    <form action="" method="post">
        <label for="a">Ocjena prvog kolokvija:</label>
        <input type="number" name="a" id="a" min=1 max=5 required>
        <br>
        <label for="b">Ocjena drugog kolokvija:</label>
        <input type="number" name="b" id="b" min=1 max=5 required>
        <br>
        <input type="submit" value="Izračunaj">
    </form>
    </div>
    <?php
   
        if (isset($poruka)) {
            echo "<div class=\"rezultat\">$poruka</div>";
    }
    ?>


</body>
</html>