<?php
function rupiah($price)
{
    $res = number_format($price, 0, ",", ".");
    return $res;
}
?>