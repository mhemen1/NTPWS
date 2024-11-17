<?php
    if(isset($_POST['niz'])) {
        $niz=$_POST['niz'];
        $broj=str_word_count($niz);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vj10</title>
</head>
<body>

    <form action="" method="post">
        <label for="niz">Ulazni Niz</label>
        <input type="text" name="niz" id="niz">
        <input type="submit" value="Ispisi broj rijeci">
    </form>
    

    <?php
        if(isset($niz)) {
            echo "Ulazni niz: <p>$niz</p>" ."sadrži {$broj} riječi.";
        }
    ?>
    
</body>
</html>