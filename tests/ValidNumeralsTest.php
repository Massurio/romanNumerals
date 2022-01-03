<?php
namespace PhpNwSykes\Tests;

use PhpNwSykes\RomanNumeral;
use PHPUnit\Framework\TestCase;

class ValidNumeralsTest extends TestCase
{
    /**
     * @param $numeral The numeral to convert
     * @param $expected Expected output
     * @throws \PhpNwSykes\InvalidNumeral
     * @dataProvider numeralMapping
     */
    public function testValidInput($numeral, $expected)
    {
        $roman = new RomanNumeral($numeral);
        $this->assertSame($expected, $roman->toInt());
    }

    public function numeralMapping()
    {
        return [
            ['X', 10],
            ['IX', 9],
            ['V', 5],
            ['IV', 4],
            ['III', 3],
            ['MMX', 2010],
            ['CD', 400],
        ];
    }

    public function testDoubleParse()
    {
        $roman = new RomanNumeral('MX');
        $this->assertSame(1010, $roman->toInt());
    }
}
