<?php
     $msg = "Probaj pogoditi";
     $zamisljen=rand(1,9);
     if(isset($_POST['a'])){
        $a =$_POST['a'];
        if($a == $zamisljen) {
            $msg= "<p style='color: green;'>Pogodak! Zamisljen broj je: $zamisljen</p>";
        }else $msg="<p style='color: red;'>Krivo! Zamisljen broj je: $zamisljen</p>";;;
     }
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
    <h4>Igra: Pogodi broj</h4>
    <form action="" method="post">
        <label for="a">Upisi jedan broj od 1 do 9*</label>
        <input type="number" name="a">
        <br>
        <input type="submit" value="Pogodi broj!">
    </form>
    <?php
        echo $msg;
    ?>


</body>
</html>