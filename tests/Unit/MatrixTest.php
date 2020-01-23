<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\MatrixService;
use App\Services\NumberFormatService;

class MatrixTest extends TestCase
{

    protected $matrixService;

    /**
     * Set up before running tests
     * 
     * @return void
     */
    protected function setup() : void
    {
        $numberFormat = new NumberFormatService();
        $this->matrixService = new MatrixService($numberFormat);
    }

    /**
     * Test that matrix multiplication is accurate
     *
     * @return void
     */
    public function testMatrixMultiplication() : void
    {
        $firstMatrix = [[0,3,5], [5,5,2]];
        $secondMatrix = [[3,4], [3,2], [4,2]];
        $matrixProduct = $this->matrixService->multiplyMatrix($firstMatrix, $secondMatrix);
        $this->assertEquals($matrixProduct, [[29, 16],[38, 34]]);
    }

    /**
     * Test that matrix service recursively reformats all matrix elements
     * 
     * @return void
     */
    public function testMatrixFormatRecursive() : void
    {
        $matrix = [[1,2,3], [1,2,3]];
        $expected = [['A','B','C'], ['A','B','C']];
        $formatted = $this->matrixService->formatMatrix($matrix);

        $this->assertEquals($expected, $formatted);
    }
}
