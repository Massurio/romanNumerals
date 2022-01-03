<?php
namespace PhpNwSykes\Tests;

use PhpNwSykes\InvalidNumeral;
use PhpNwSykes\RomanNumeral;
use PHPUnit\Framework\TestCase;

class InvalidNumeralsTest extends TestCase
{
    /**
     * @param $numeral
     * @dataProvider badMappings
     * @throws InvalidNumeral
     */
    public function testInvalidOutput($numeral)
    {
        $this->expectException(InvalidNumeral::class);
        $roman = new RomanNumeral($numeral);
        $roman->toInt();
    }

    public function badMappings(): array
    {
        return [
            ['Bad'],
            ['XI Something'],
            ['Something MM'],
            ['-X'],
            ['']
        ];
    }
}
