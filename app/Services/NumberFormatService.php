<?php

namespace App\Services;

use App\Services\Contracts\NumberFormat;

/**
 * Number Format service
 * 
 * @category Class
 * @package  App\Services
 * @author   Friday Godswill <faradayyg@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     none
 */
class NumberFormatService implements NumberFormat
{
    /**
     * Format a number to spreadsheet column format
     * 
     * @param int $number the number to be reformatted
     * 
     * @return string the alphabetical equivalent of $number
     */
    public function toExcelColumnFormat(int $number) : string
    {
        $alphaSet = range('A', 'Z');
        $alphaSetRange = count($alphaSet);

        if ($number <= $alphaSetRange && $number > 0) {
            return $alphaSet[$number -1];
        } elseif ($number == 0) {
            return $alphaSet[$alphaSetRange - 1];
        }

        return $this->toExcelColumnFormat($number/$alphaSetRange) . 
            $this->toExcelColumnFormat($number % $alphaSetRange);
    }
}
