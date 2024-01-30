<?php
namespace App\Helpers;


class NumberToWordsHelper
{
    // public static function convertToWords($number)
    // {
    //     $ones = array(
    //         0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five',
    //         6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten',
    //         11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen',
    //         15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
    //         19 => 'nineteen'
    //     );
    
    //     $tens = array(
    //         0 => 'zero', 1 => 'ten', 2 => 'twenty', 3 => 'thirty', 4 => 'forty', 5 => 'fifty',
    //         6 => 'sixty', 7 => 'seventy', 8 => 'eighty', 9 => 'ninety'
    //     );
    
    //     // Separate the integer part and the decimal part
    //     $integerPart = floor($number);
    //     $decimalPart = round(($number - $integerPart) * 100); // Convert cents to a whole number
    
    //     $words = '';
    
    //     // Convert the integer part to words
    //     if ($integerPart < 20) {
    //         $words .= $ones[$integerPart];
    //     } elseif ($integerPart < 100) {
    //         $words .= $tens[($integerPart / 10)] . ' ' . $ones[($integerPart % 10)];
    //     } elseif ($integerPart < 1000) {
    //         $words .= $ones[$integerPart / 100] . ' hundred ' . self::convertToWords($integerPart % 100);
    //     } elseif ($integerPart < 1000000) {
    //         $thousands = floor($integerPart / 1000);
    //         $remainder = $integerPart % 1000;
    //         if ($remainder == 0) {
    //             $words .= self::convertToWords($thousands) . ' thousand';
    //         } else {
    //             $words .= self::convertToWords($thousands) . ' thousand ' . self::convertToWords($remainder);
    //         }
    //     }
    
    //     // Add 'dollars' if needed
    //     if (!empty($words)) {
    //         $words .= ' dollars';
    //     }
    
    //     // Convert the decimal part to words
    //     if ($decimalPart > 0) {
    //         $words .= ' and ' . self::convertToWords($decimalPart) . ' cents';
    //     }
    
    //     return $words;
    // }
    public static function convertToWords($number)
    {
        $ones = [
            0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five',
            6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten',
            11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen',
            15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen'
        ];
    
        $tens = [
            0 => 'zero', 1 => 'ten', 2 => 'twenty', 3 => 'thirty', 4 => 'forty', 5 => 'fifty',
            6 => 'sixty', 7 => 'seventy', 8 => 'eighty', 9 => 'ninety'
        ];
    
        // Separate the integer part and the decimal part
        $integerPart = floor($number);
        $decimalPart = round(($number - $integerPart) * 100); // Convert cents to a whole number
    
        $words = '';
    
        // Convert the integer part to words
        if ($integerPart < 20) {
            $words .= $ones[$integerPart];
        } elseif ($integerPart < 100) {
            $words .= $tens[($integerPart / 10)] . ' ' . $ones[($integerPart % 10)];
        } elseif ($integerPart < 1000) {
            $words .= $ones[$integerPart / 100] . ' hundred ' . self::convertToWords($integerPart % 100);
        } elseif ($integerPart < 1000000) {
            $thousands = floor($integerPart / 1000);
            $remainder = $integerPart % 1000;
            if ($remainder == 0) {
                $words .= self::convertToWords($thousands) . ' thousand';
            } else {
                $words .= self::convertToWords($thousands) . ' thousand ' . self::convertToWords($remainder);
            }
        }
    
     // Convert the decimal part to words
if ($decimalPart > 0) {
    $cents = '';
    if ($decimalPart < 20) {
        $cents .= $ones[$decimalPart];
    } elseif ($decimalPart < 100) {
        $cents .= $tens[($decimalPart / 10)] . ' ' . $ones[($decimalPart % 10)];
    } else {
        $cents .= 'greater than ninety-nine'; // Handle edge case
    }

    $words .= ($words ? ' and ' : '') . $cents . ' cents';
} else {
    $words .= '  only';
}

    
        return $words;
    }
    
    


//developed by Tharaka Devinda
    
    
}
