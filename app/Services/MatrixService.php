<?php

namespace App\Services;

use App\Services\Contracts\NumberFormat;

/**
 * Matrix operations service
 * 
 * @category Class
 * @package  App\Services
 * @author   Friday Godswill <faradayyg@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     none
 */
class MatrixService
{
    public $numberFormat;

    /**
     * Creates new class instance
     * 
     * @param NumberFormat $numberFormat the numberformat interface
     * 
     * @return void
     */
    public function __construct(NumberFormat $numberFormat)
    {
        $this->numberFormat = $numberFormat;
    }

    /**
     * Returns the product of two matrices
     * 
     * @param array $firstMatrix  the first matrix to be multiplied
     * @param array $secondMatrix the second matrix to be multiplied
     * 
     * @return array the product of the matrices
     */
    public function multiplyMatrix($firstMatrix, $secondMatrix) : array
    {
        // verify matrices can be multiplied
        $secondMatrixRowCount = count($secondMatrix);
        $finalMatrix = [];
        $firstMatrixRowCount=count($firstMatrix);
        $secondMatrixColumnCount=count($secondMatrix[0]);

        for ($i=0; $i < $firstMatrixRowCount; $i++) {
            for ($j=0; $j < $secondMatrixColumnCount; $j++) {
                $finalMatrix[$i][$j] = 0;
                for ($k=0; $k < $secondMatrixRowCount; $k++) {
                    $finalMatrix[$i][$j] += $firstMatrix[$i][$k] * $secondMatrix[$k][$j];
                }
            }
        }
        return $finalMatrix;
    }

    /**
     * Recursively Transform the elements of a matrix to a certain format
     * 
     * @param array $matrix the matrix to be reformatted
     * 
     * @return array The matrix with elements reformatted
     */
    public function formatMatrix(array $matrix) : array
    {
        $formatter = $this->numberFormat;

        return array_map(
            function ($current) use ($formatter) {
                return (is_array($current)) ? $this->formatMatrix($current) :
                    $formatter->toExcelColumnFormat($current);
            }, $matrix
        );
    }
}
