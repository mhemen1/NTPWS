<?php echo '
<section class="map">
<h2>Naša lokacija</h2>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.7890741539636!2d15.966758816056517!3d45.795453279106205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d68b5d094979%3A0xda8bfa8459b67560!2sUl.+Vrbik+VIII%2C+10000%2C+Zagreb!5e0!3m2!1shr!2shr!4v1509296660756" allowfullscreen></iframe>
</section>
<section class="contact-form">
<h2>Pošaljite nam poruku</h2>
<form action="submit_form.php" method="POST">
    <label for="first-name">Ime:</label>
    <input type="text" id="first-name" name="first-name" required>

    <label for="last-name">Prezime:</label>
    <input type="text" id="last-name" name="last-name" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="country">Država:</label>
    <select id="country" name="country" >
        <option value="">-- Odaberite državu --</option>
        <option value="sh">Albanija</option>
        <option value="au">Austrija</option>
        <option value="hr">Hrvatska</option>
        <option value="si">Slovenija</option>
        <option value="ba">Bosna i Hercegovina</option>
        <option value="rs">Srbija</option>
    </select>

    <label for="message">Opis:</label>
    <textarea id="message" name="message" rows="5" ></textarea>

    <input type="submit" value="Pošalji">
</form>
</section>
<div class="cisti"></div>';

?>