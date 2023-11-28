<?php

// All of the code in this file is executed for every request to the application.
// This file is loaded automatically by the framework and does not need to be


// this function fix currency format from alpine masked input 
if (!function_exists('fixCurrency')) {
    function fixCurrency($string): string | null
    {
        if (gettype($string) !== 'string') {
            throw new Exception('Invalid input type for fixCurrency function. Expected string.');
        }

        try {
            if($string) return str_replace('.', '', $string);

            return null;
        } catch (Exception $e) {
            // Handle error gracefully
            return $string;
        }
    }
}