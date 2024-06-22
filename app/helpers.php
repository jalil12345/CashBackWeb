<?php

if (!function_exists('formatCashback')) {
    function formatCashback($cashbackStr) {
        // Convert the cashback rate to a float and format it to remove unnecessary trailing zeros
        $cashbackValue = (float)$cashbackStr;
        // Format the number to trim unnecessary zeros and format it as a percentage
        return rtrim(rtrim(sprintf('%.8f', $cashbackValue), '0'), '.');
    }
}
