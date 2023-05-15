<?php
function priceFormat(float $price): string
{
    return number_format($price, 2, ',', ' ');
}
?>