<?php 
    include('connect.php');
    include('sesija.php');
    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['news_id'])) { $news_id   = (int)$_GET['news_id'];}	
	if(isset($_GET['action'])) { $action   = (int)$_GET['action'];}	
	if (!isset($menu)) { $menu = 1; }
print '
    <!DOCTYPE html>
    <html lang="hr"> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Generička stranica za udrugu životinja ili druge udruge."> 
        <meta name="keywords" content="životinje,psi,mačke,udruga za zaštitu životinja.">
        <meta name="author" content="Matija Hemen">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="icon" href="images/paws.ico" type="image/x-icon">
        <title>Udruga Ž</title> 
    </head>
    <body>
        <header>
            <div id="banner"></div>
            <nav>';
             include('menu.php');
            print '</nav>
        </header>
    
        <main>';
        	
        if (!isset($menu) || $menu == 1) { include("home.php"); }
        
        else if ($menu == 2) { include("novosti.php"); }
        
        else if ($menu == 3) { include("contact.php"); }
        
        else if ($menu == 4) { include("about.php"); }
        else if ($menu == 5) { include("galerija.php"); }
        else if ($menu == 6) { include("prijava.php"); }
        else if ($menu == 7) { include("registracija.php"); }
        else if ($menu == 8) { include("admin.php"); }
        else if ($menu == 9) { include("odjava.php"); }
        else if ($menu == 10) { include("main_news.php"); }
    
        print '</main>
        <footer>
            <p>Copyright &copy; 2024 Matija Hemen. </p>
            <div class="social-icons">
                <a href="https://github.com/mhemen1/NTPWS/tree/main"><i class="fab fa-github"></i></a>
                <a href="https://www.facebook.com" target="_blank" title="Facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com" target="_blank" title="Instagram">
                    <i class="fa-brands fa-instagram"></i> 
                </a>
                <a href="https://www.linkedin.com" target="_blank" title="LinkedIn">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
            </div>
        </footer>
    </body>
    </html>';
?>

