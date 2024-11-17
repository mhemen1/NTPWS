<?php
function ducan($stanje = "otvoren") {
    echo "Dućan je $stanje";
}


$praznici = [
    '01.01', // Nova godina
    '06.01', // Bogojavljenje
    '01.05', // Praznik rada
    '25.06', // Dan državnosti
    '15.08', // Velika Gospa
    '01.11', // Svi sveti
    '18.11', // Dan sjećanja na žrtve Domovinskog rata
    '25.12', // Božić
    '26.12', // Sveti Stjepan
];

$trenutnoVrijeme = new DateTime();
$trenutniSat = (int)$trenutnoVrijeme->format('G'); 
$trenutniDan = $trenutnoVrijeme->format('N'); 
$trenutniDatum = $trenutnoVrijeme->format('d.m'); 

if (in_array($trenutniDatum, $praznici)) {
    ducan("zatvoren zbog državnog praznika.");
} else {
   
    if ($trenutniDan == 7) {
        ducan("zatvoren jer je danas nedjelja.");
    } 

    elseif ($trenutniDan == 6) {
        if ($trenutniSat >= 9 && $trenutniSat < 14) {
            ducan("otvoren (Subota 9-14).");
        } else {
            ducan("zatvoren (Subota 9-14).");
        }
    } 

    else {
        if ($trenutniSat >= 8 && $trenutniSat < 20) {
            ducan("otvoren (Ponedjeljak - Petak) 8-20.");
        } else {
            ducan("zatvoren (Ponedjeljak - Petak) 8-20.");
        }
    }
}
?>