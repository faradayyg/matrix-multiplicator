<?php

namespace App\Services\Contracts;

/**
 * All methods that a number formatter should implement
 * 
 * @category Interface
 * @package  App\Services\Contracts
 * @author   Friday Godswill <faradayyg@gmail.com>
 * @license  MIT http://opensourcelicenses.org/MIT
 * @link     none
 */
interface NumberFormat
{
    /**
     * Format a number to excell column format
     * 
     * @param int $number the number to be reformatted
     * 
     * @return string the alphabetical representation of $number
     */
    public function toExcelColumnFormat (int $number) : string;
}