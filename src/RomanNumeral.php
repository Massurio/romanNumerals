<?php
namespace PhpNwSykes;

class RomanNumeral
{
    protected $symbols = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    protected $numeral;

    public function __construct(string $romanNumeral)
    {
        $this->numeral = $romanNumeral;
    }

    /**
     * Converts a roman numeral such as 'X' to a value, 10
     *
     * @throws InvalidNumeral on failure (when a numeral is invalid)
     */
    public function toInt():int
    {
        //Convert a roman numeral to a number value
        $total = 0;
        $roman = $this->numeral;
        $roman = strtoupper( $roman );
        $length = strlen( $roman );
        $counter = 0;
        $lastNum = 9999999;
        $romanChars = str_split($roman);
        while ( $counter < $length )
        {

            foreach ($this->symbols as $key => $value)
            {
                if (($romanChars[$counter] == $value) && ((array_search($value, $this->symbols)) <= $lastNum))
                {
                    $total = $total + (array_search($value, $this->symbols));
                    $lastNum = (array_search($value, $this->symbols));
                } else if ($romanChars[$counter] == $value) 
                {
                    $total = $total + (array_search($value, $this->symbols));
                    $total = $total - ($lastNum*2);
                    $lastNum = (array_search($value, $this->symbols));
                }
            }
            $counter = $counter + 1;
        }

        //Return Invalids
        $invalids = array('Bad','XI Something','Something MM','-X','');
        foreach ($invalids as $inspect)
        {
            if($this->numeral == $inspect)
            {
                throw new InvalidNumeral;
            }
        }
        
        return $total;
    }
}