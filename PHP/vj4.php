<?php
    $result = "";
    $a = isset($_POST['a']) ? $_POST['a'] : 0;
    $b = isset($_POST['b']) ? $_POST['b'] : 0;
    $result = (3 * $a - $b) / 2;
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Matija Hemen">
    <title>Vj4</title>
</head>
<body>
    <form action="" method="post">
        <label for="a">Vrijednost a</label>
        <input type="number" name="a">
        <br>
        <label for="b">Vrijednost b</label>
        <input type="number" name="b">
        <br>
        <input type="submit" value="Pošalji">
    </form>
  <?php


    if ($result !== "") {
        echo "<h2>Rezultat:</h2>";
        echo "<h5>Vrijednost c je: " . $result . "</h5>";
    }
    ?>




</body>
</html>