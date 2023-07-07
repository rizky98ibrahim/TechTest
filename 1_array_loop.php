<?php

$aplikasi[1] = 'gtAkademik';
$aplikasi[2] = 'gtFinansi';
$aplikasi[3] = 'gtPerizinan';
$aplikasi[4] = 'eCampuz';
$aplikasi[5] = 'eOviz';


// Count
$count = count($aplikasi);
$i = 1;

// Loop
while ($i <= $count) {
    echo $aplikasi[$i] . "\n";
    $i++;
}
?>