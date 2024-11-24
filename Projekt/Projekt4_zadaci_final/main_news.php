<?php 
if(!isset($action)) {
    if(is_admin()){
        echo'
           <a href="index.php?menu=10&action=1"><button>Nova Vijest    </button></a><br>
           <a href="index.php?menu=10&action=2"><button>Uredi Vijesti  </button></a><br>
           <a href="index.php?menu=10&action=3"><button>Odobri Vijesti </button></a><br>
        '; 
    }elseif(is_editor()) {
        echo'
        <a href="index.php?menu=10&action=1"><button>Nova Vijest</button></a><br>
        <a href="index.php?menu=10&action=2"><button>Uredi Vijesti</button></a><br>
    '; 
    }elseif(is_user()) {
        echo'
       <a href="index.php?menu=10&action=1"><button>Nova Vijest </button></a><br>
    '; 
    }else {
        echo'<p class="fail">Nemate prava na ovu stranicu</p>';
        header( "refresh:3;url=index.php" );
    }
}else {
    switch($action){
        #Dodavanje vijesti:
        case 1: 
            if(is_admin() || is_editor() ||is_user()) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $naslov=$_POST['naslov'];
                    $sadrzaj=$_POST['sadrzaj'];
                    $thumb=$_FILES['thumb']['name'];
                    $archive=$_POST['archive'];
                    $uploadDir = 'images/';
                    if(is_user()){$odobreno = false;}
                    else {$odobreno = true; }
                    $query="INSERT INTO news(title,description,thumb,archive,odobreno) VALUES ('$naslov','$sadrzaj','$thumb','$archive','$odobreno')";
                    $result = mysqli_query($conn, $query);
                    $id = mysqli_insert_id($conn);
                    if(!file_exists('images/'.$thumb)) {
                        move_uploaded_file($thumb, $uploadDir.$thumb);
                    }
                    echo '<p class="success">Uspješno unesena vijest.</p>';  
                    if (!empty($_FILES['slike']['name'][0])) {
                        $files = $_FILES['slike'];
                        $uploadErrors = [];        
                        foreach ($files['name'] as $key => $fileName) {
                            $fileTmp = $files['tmp_name'][$key];
                            $fileError = $files['error'][$key];
                            $fileSize = $files['size'][$key];
                            
                            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                            $newFileName = uniqid('img_', true) . '.' . $fileExt;
                            $destination = $uploadDir . $newFileName;
                            
                            if (in_array($fileExt, $allowed)) {
                                if ($fileError === 0) {
                                    if ($fileSize <= 5 * 1024 * 1024) { // 5MB size limit
                                        if (move_uploaded_file($fileTmp, $destination)) {
                                            // Insert file path into the database
                                            $sql = "INSERT INTO slike (naziv,news_id) VALUES ('$destination','$id')";
                                            if (!$conn->query($sql)) {
                                                $uploadErrors[] = "Failed to insert $fileName into database.";
                                            }
                                        } else {
                                            $uploadErrors[] = "Failed to upload $fileName.";
                                        }
                                    } else {
                                        $uploadErrors[] = "$fileName is too large.";
                                    }
                                } else {
                                    $uploadErrors[] = "Error uploading $fileName.";
                                }
                            } else {
                                $uploadErrors[] = "$fileName has an invalid file type.";
                            }
                        }
                        
                        if (empty($uploadErrors)) {
                            echo "Slike uspješno prenesene.";
                        } else {
                            foreach ($uploadErrors as $error) {
                                echo $error . "<br>";
                            }
                        }
                    } else {
                        echo "No files selected.";
                    }
                

                }
                echo '<form action="" method="post" name="new_news" enctype="multipart/form-data">';
                echo  '<label for="naslov">Naslov:</label>';
                echo   '<input type="text" name="naslov">';
                echo  '<label for="sadrzaj">Tekst:</label>';
                echo  '<textarea id="sadrzaj" name="sadrzaj" rows="5" ></textarea>';
                echo  '<label for="thumb">Thumbnail:</label>';
                echo  '<input type="file" id="thumb" name="thumb">';
                echo  '<label for="slike">Slike:</label>';
                echo  '<input type="file" id="slike" name="slike[]" multiple="multiple">';
                echo   '<label for="archive">Arhiva:</label>';
                echo  '<p><input type="radio" name="archive" value="Y"> Da</p>';
                echo  '<p><input type="radio" name="archive" value="N" checked> Ne</p>';
                echo  '<input type="submit" name="submit" value="Objavi">';
                echo '</form>';
                echo '<p><a class=\"back-link\" href="index.php?menu=10">Natrag</a></p>';			
                break;
            }
        case 2:
            if(is_admin() || is_editor()) {
                if(!isset($news_id)) {
                    $query="SELECT id,title,description,date,thumb,archive,odobreno FROM news ";
                    $result =mysqli_query($conn,$query);
                    echo "<h2>Odaberi vijest za uređivanje:</h2>";
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $newsID=$row['id'];
                            $thumb=$row['thumb'];
                            $title=$row['title'];
                            $date=date("d.m.Y H:i", strtotime($row['date']));
                            $desc=$row['description'];
                        echo "<article>
                        <a href=\"index.php?menu=$menu&action=$action&news_id=$newsID\"><img src=\"images/$thumb\" alt=\"Slika članka 1\"></a>
                        <div>
                            <h2><a href=\"index.php?menu=$menu&action=$action&news_id=$newsID\">$title</a></h2>
                            <time datetime=\"$date\">$date</time>
                            <p>".substr(strip_tags($desc), 0, 200).'...'."</p>
                            <a href=\"index.php?menu=$menu&action=$action&news_id=$newsID\">Pročitaj više</a>
                        </div>
                    </article>";
                        }
                    }
                }
                else { 
                    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                        if (isset($_POST['delete']) && is_admin()) {
                            $query="DELETE FROM news WHERE id='$news_id'";
                            $result =@mysqli_query($conn,$query);
                            $query="DELETE FROM slike WHERE news_id='$news_id'";
                            $result =@mysqli_query($conn,$query);
                            foreach($_FILES['images']['name'] as $key => $fileName)
                                unlink($fileName);
                        }
                        if(isset($_POST['update'])) {
                            $naslov=$_POST['naslov'];
                            $sadrzaj=$_POST['sadrzaj'];
                            $thumb=$_FILES['thumb']['name'];
                            $archive=$_POST['archive'];
                            $uploadDir = 'images/';
                            $odobreno = $_POST['odobreno'];
                            if(!empty($thumb)) {
                            $query="UPDATE news SET title = '$naslov',description='$sadrzaj',thumb='$thumb',archive='$archive',odobreno='$odobreno' WHERE id='$news_id'";
                            if(!file_exists('images/'.$thumb)) {
                                move_uploaded_file($thumb, $uploadDir.$thumb);
                            }
                            }else {
                                $query="UPDATE news SET title = '$naslov',description='$sadrzaj',archive='$archive',odobreno='$odobreno' WHERE id='$news_id'";
                            }
                      
                            $result = mysqli_query($conn, $query);
                            if (!empty($_FILES['slike']['name'][0])) {
                                $query="SELECT naziv FROM slike WHERE news_id='$news_id'";
                                $result =@mysqli_query($conn,$query);
                                while ($row = $result->fetch_assoc()) {                                
                                    unlink($row['naziv']);
                                }
                                $query="DELETE FROM slike WHERE news_id='$news_id'";
                                $result =@mysqli_query($conn,$query);

                                $files = $_FILES['slike'];
                                $uploadErrors = [];        
                                foreach ($files['name'] as $key => $fileName) {
                                    $fileTmp = $files['tmp_name'][$key];
                                    $fileError = $files['error'][$key];
                                    $fileSize = $files['size'][$key];
                                    
                                    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                                    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                                    $newFileName = uniqid('img_', true) . '.' . $fileExt;
                                    $destination = $uploadDir . $newFileName;
                                    
                                    if (in_array($fileExt, $allowed)) {
                                        if ($fileError === 0) {
                                            if ($fileSize <= 5 * 1024 * 1024) { // 5MB size limit
                                                if (move_uploaded_file($fileTmp, $destination)) {
                                                    // Insert file path into the database
                                                    $sql = "INSERT INTO slike (naziv,news_id) VALUES ('$destination','$news_id')";
                                                    if (!$conn->query($sql)) {
                                                        $uploadErrors[] = "Failed to insert $fileName into database.";
                                                    }
                                                } else {
                                                    $uploadErrors[] = "Failed to upload $fileName.";
                                                }
                                            } else {
                                                $uploadErrors[] = "$fileName is too large.";
                                            }
                                        } else {
                                            $uploadErrors[] = "Error uploading $fileName.";
                                        }
                                    } else {
                                        $uploadErrors[] = "$fileName has an invalid file type.";
                                    }
                                }
                                
                                if (empty($uploadErrors)) {
                                    echo "Slike uspješno prenesene.";
                                } else {
                                    foreach ($uploadErrors as $error) {
                                        echo $error . "<br>";
                                    }
                                }
                            } echo'<p class="success">Promjene uspjesne</p>';
                        }
                        
                    }         
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
                        $gslike=array();
                        $gslike[]=$row['naziv'];
                          
                        echo '<a href="index.php?menu=10" class="back-link">← Povratak na početnu</a><hr>';
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
                            $gslike[]=$row['naziv'];
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
                    $gslikevalue = implode(',', $gslike);
                    echo '<hr>';
                    echo "<h2>Uređivanje:</h2>";
                    echo '<form action="" method="post" name="edit_news" enctype="multipart/form-data">';
                    echo  '<label for="naslov">Naslov:</label>';
                    echo   "<input type=\"text\" name=\"naslov\" value=\"$title\">";
                    echo  '<label for="sadrzaj">Tekst:</label>';
                    echo  "<textarea id=\"sadrzaj\" name=\"sadrzaj\" rows=\"5\" value=\"$desc\">$desc</textarea>";
                    echo  '<label for="thumb">Thumbnail:</label>';
                    echo  "<input type=\"file\" id=\"thumb\" name=\"thumb\" value=\"$thumb\">";
                    echo  '<label for="slike">Slike:</label>';
                    echo  "<input type=\"file\" id=\"slike\" name=\"slike[]\" multiple=\"multiple\", value=\"$gslikevalue\">";
                    echo   '<label for="archive">Arhiva:</label>';
                    if($archive == 'N')  {echo  '<p><input type="radio" name="archive" value="N" checked> Ne</p>';
                        echo  '<p><input type="radio" name="archive" value="Y" > Da</p>';
                    }
                    else {echo  '<p><input type="radio" name="archive" value="Y" checked> Da</p>';
                        echo  '<p><input type="radio" name="archive" value="N" > Ne</p>';
                    } 
                    echo  '<label for="odobreno">Odobreno:(0-Nije,1-Je)</label>';
                    $disabled= is_admin() ? '' : 'readonly';
                    echo   "<input type=\"number\" name=\"odobreno\" value=\"$odobreno\" $disabled>";
                    if(is_admin()) {echo '<button type="submit" name="delete" value="Izbrisi Vijest">Izbrisi Vijest</button>';}
                    echo  '<button type="submit" name="update" value="Promijeni">Promijeni</button>';
                    echo '</form>';
                    }


                }break;
            
        }case 3:
            if(is_admin()) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    if (isset($_POST['allow']) && is_admin()) {
                        $odobreno=$_POST['odobri'];
                        $query="UPDATE news SET odobreno='$odobreno' WHERE id='$news_id'";                              
                        $result = @mysqli_query($conn, $query);
                        echo '<p class="success">Uspješno odobrena vijest.</p>'; 
                    }
                }
                if(!isset($news_id)) {
                    $query="SELECT id,title,description,date,thumb,archive,odobreno FROM news WHERE odobreno='0'";
                    $result =mysqli_query($conn,$query);
                    echo "<h2>Pregled vijest za odobravanje:</h2>";
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $newsID=$row['id'];
                            $thumb=$row['thumb'];
                            $title=$row['title'];
                            $date=date("d.m.Y H:i", strtotime($row['date']));
                            $desc=$row['description'];
                        echo "<article>
                        <a href=\"index.php?menu=$menu&action=$action&news_id=$newsID\"><img src=\"images/$thumb\" alt=\"Slika članka 1\"></a>
                        <div>
                            <h2><a href=\"index.php?menu=$menu&action=$action&news_id=$newsID\">$title</a></h2>
                            <time datetime=\"$date\">$date</time>
                            <p>".substr(strip_tags($desc), 0, 200).'...'."</p>
                            <a href=\"index.php?menu=$menu&action=$action&news_id=$newsID\">Pročitaj više</a>
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
                            
                    echo '<a href="index.php?menu=10" class=\"back-link\">← Povratak na početnu</a><hr>';
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
                echo '<hr>';
                echo "<h2>Odobri:</h2>";
                echo '<form action="" method="post" name="allow_news" enctype="multipart/form-data">';
                echo '<input type="hidden" name="odobri" value="1">';
                echo  '<button type="submit" name="allow" value="1">Odobri</button>';
                echo '</form>';
                }

            }
        }

            break;

    } 

}
?>