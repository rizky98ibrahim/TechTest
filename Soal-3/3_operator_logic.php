<?php
// ! Integer Division
function division($dividend, $divisor) {
    // * Check if divisor is zero
    if ($divisor === 0) {
        throw new InvalidArgumentException("Divisor cannot be zero");
    }
    
    // * Initialize variables
    $quotient = 0;
    // * Remainder is equal to dividend
    $remainder = $dividend;
    
    // * Loop while remainder is greater than or equal to divisor
    while ($remainder >= $divisor) {
        $remainder -= $divisor;
        $quotient++;
    }
    
    // * Return the quotient
    return $quotient;
}

// ! Test Cases
// * Test case 1 (7 / 2 = 3)
$dividend = 7;
$divisor = 2;
$result = division($dividend, $divisor);
echo "$dividend Devide $divisor is $result\n";

// * Test case 2 (8 / 4 = 2)
$dividend = 8;
$divisor = 4;
$result = division($dividend, $divisor);
echo "$dividend Devide $divisor is $result\n";
?>
