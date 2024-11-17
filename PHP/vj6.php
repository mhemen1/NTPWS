<?php
    if(isset($_POST['a']) && isset($_POST['b'])){
        $a =$_POST['a'];
        $b =$_POST['b'];
        $rezultat;
        switch($_POST["operacija"]){
            case "+":
                $rezultat=$a+$b;
                break;
            case "-":
                $rezultat=$a-$b;
                break;
            case "/":
                $rezultat=$a/$b;
                break;
            case "*":
                $rezultat=$a*$b;
                break;
            default:
            $rezultat = "Nepoznata operacija";
            break;
        }
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
    <h4>Kalkulator: Switch naredba</h4>
    <form action="" method="post">
        <label for="a">Upisi prvi broj*</label>
        <input type="number" name="a" id="a">
        <br>
        <label for="a">Upisi drugi broj*</label>
        <input type="number" name="b" id="b">
        <br>
        <p>Rezultat:</p>
        <button type="submit" value="+" id="plus" name="operacija">+</button>
        <button type="submit" value="-" id="minus" name="operacija">-</button>
        <button type="submit" value="*" id="puta" name="operacija">*</button>
        <button type="submit" value="/" id="dijeli" name="operacija">/</button>
    </form>
    <?php   
        if (isset($rezultat)) {
            echo "<h3>Rješenje:</h3>";
            echo "<p>$rezultat</p>";
    }
    ?>


</body>
</html>



