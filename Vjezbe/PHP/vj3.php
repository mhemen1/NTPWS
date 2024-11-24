
<?php
$title = "Da Vincijev kod";
$link= "https://hr.wikipedia.org/".$title;
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Da Vincijev kod je kriminalistički triler američkog pisca Dana Browna.">
    <meta name="keywords" content="Da Vincijev kod, Dan Brown, kriminalistički triler, knjiga">
    <meta name="author" content="Matija Hemen">
    <title><?php echo $title?></title>
</head>
<body>


    <h1><?php echo $title?></h1>
    <p><?php echo $title?> je kriminalistički triler američkog pisca Dana Browna.</p>
    <p>
    <?php echo "<a href='$link' target='_blank'>$title</a>";?>
    </p>


</body>
</html>

