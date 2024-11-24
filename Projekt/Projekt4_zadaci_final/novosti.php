<?php 
if(!isset($news_id)) {
    $query="SELECT id,title,description,date,thumb,archive,odobreno FROM news WHERE odobreno='1'";
    $result =mysqli_query($conn,$query);
    echo "<h2>Pregled vijesti:</h2>";
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $newsID=$row['id'];
            $thumb=$row['thumb'];
            $title=$row['title'];
            $date=date("d.m.Y H:i", strtotime($row['date']));
            $desc=$row['description'];
        echo "<article>
        <a href=\"index.php?menu=$menu&news_id=$newsID\"><img src=\"images/$thumb\" alt=\"Slika članka 1\"></a>
        <div>
            <h2><a href=\"index.php?menu=$menu&news_id=$newsID\">$title</a></h2>
            <time datetime=\"$date\">$date</time>
            <p>".substr(strip_tags($desc), 0, 200).'...'."</p>
            <a href=\"index.php?menu=$menu&news_id=$newsID\">Pročitaj više</a>
        </div>
    </article>";
        }
    }
}
else {
    $query="SELECT title,description,date,thumb,archive,odobreno,naziv FROM news JOIN slike ON news.id=slike.news_id WHERE news.id='$news_id'";
    $result =mysqli_query($conn,$query);
    if ($result && $result->num_rows > 0) {
        $row =  $result->fetch_assoc();
        
        $thumb=$row['thumb'];
        $title=$row['title'];
        $date=date("d.m.Y H:i", strtotime($row['date']));
        $desc=$row['description'];
        $archive=$row['archive'];
        $odobreno=$row['odobreno'];
                
        echo '<a href="index.php?menu=2" class=\"back-link\">← Povratak na početnu</a><hr>';
        echo "<section class=\"gallery\">
        <h2>Galerija slika</h2>
        <figure>
            <a href=\"images/$thumb\" target=\"_blank\"><img src=\"images/$thumb\" alt=\"Opis slike \">
            <figcaption>Opis slike </figcaption></a>
        </figure>";
        echo "<figure>
        <a href=".$row['naziv']." target=\"_blank\"><img src=".$row['naziv']." alt=\"Opis slike \">
        <figcaption>Opis slike </figcaption></a></figure>";

        while ($row = $result->fetch_assoc()) {
        
            echo "<figure>
            <a href=".$row['naziv']." target=\"_blank\"><img src=".$row['naziv']." alt=\"Opis slike \">
            <figcaption>Opis slike </figcaption></a></figure>";
        
        }               

        echo "</section>            
        <div class=\"cisti\"></div>
        <hr>
        <h1>$title</h1>
        <h2>Podnaslov članka 1</h2>                    
        <p><strong>Datum objave:</strong>  <time datetime=\"$date\">$date</time></p>
        <p>$desc</p>                  
        <hr>
        <div class=\"cisti\"></div>";
        
    }
}


?>