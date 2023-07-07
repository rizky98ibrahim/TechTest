<?php
// ! Looping Condition

// * Initialize $currentLine
$currentLine = ""; 

for ($i = 1; $i <= 50; $i++) {
    // * Check if $i is divisible by 3 and 5
    if ($i % 3 == 0 && $i % 5 == 0) {
        $currentLine .= $i . " ";
        echo "FooBar = " . $currentLine . "\n";
        $currentLine = "";
    }
    // * Check if $i is divisible by 3
    elseif ($i % 3 == 0) {
        $currentLine .= $i . " ";
        echo "Foo = " . $currentLine . "\n";
        $currentLine = "";
    }
    // * Check if $i is divisible by 5
    elseif ($i % 5 == 0) {
        $currentLine .= $i . " ";
        echo "Bar = " . $currentLine . "\n";
        $currentLine = "";
    }
    // * If not divisible by 3 or 5
    else {
        $currentLine .= $i . " ";
    }
}
