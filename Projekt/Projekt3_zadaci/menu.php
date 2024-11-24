<?php
if(logged_in()){
       echo'<ul>
        <li><a href="index.php?menu=1">Početna stranica</a></li>
        <li><a href="index.php?menu=2">Novosti</a></li>
        <li><a href="index.php?menu=3">Kontakt</a></li>
        <li><a href="index.php?menu=4">O nama</a></li>
        <li><a href="index.php?menu=5">Galerija</a></li>
        <li><a href="index.php?menu=8">Administracija</a></li>
        <li><a href="index.php?menu=9">Odjava</a></li>
</ul>';  
}else {
print '        
        <ul>
                <li><a href="index.php?menu=1">Početna stranica</a></li>
                <li><a href="index.php?menu=2">Novosti</a></li>
                <li><a href="index.php?menu=3">Kontakt</a></li>
                <li><a href="index.php?menu=4">O nama</a></li>
                <li><a href="index.php?menu=5">Galerija</a></li>
                <li><a href="index.php?menu=6">Prijava</a></li>
                <li><a href="index.php?menu=7">Registracija</a></li>
        </ul>';
}
?>