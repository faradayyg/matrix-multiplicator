<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\NumberFormatService;

class NumberFormatTest extends TestCase
{
    /**
     * Test that the number format library works 
     *
     * @return void
     */
    public function testNumberToExcellColumnFormat()
    {
        $numberFormatter = new NumberFormatService();
        $z = $numberFormatter->toExcelColumnFormat(26);
        $aa = $numberFormatter->toExcelColumnFormat(27);
        $abb = $numberFormatter->toExcelColumnFormat(730);

        $this->assertEquals('Z', $z);
        $this->assertEquals('AA', $aa);
        $this->assertEquals('ABB', $abb);
    }
}
