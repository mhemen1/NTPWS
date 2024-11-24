<?php
echo "<p>Lista vozila:</p><ul>";
$cars=array("Audi"," BMW","Renault"," Citroen");
echo"<form action=\"\" method='post'>";
foreach ($cars as $car){
    echo "<li><input type=\"radio\" name=\"auto\" value=\"$car\">$car</li>";
    }
    echo "</ul>";
    echo "<input type=\"submit\" value='Pošalji auto'></form>";

if(isset($_POST['auto'])){
    echo "Odabran je:" .$_POST['auto'];
}
?>