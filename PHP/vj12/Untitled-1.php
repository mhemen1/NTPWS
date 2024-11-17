<?php
// Postavljanje kolačića
setcookie("korisnik", "John Doe", time() + 3600, "/");

// Provera
if (isset($_COOKIE['korisnik'])) {
    echo "Kolačić je postavljen: " . $_COOKIE['korisnik'];
} else {
    echo "Osvežite stranicu da vidite kolačić!";
}
?>