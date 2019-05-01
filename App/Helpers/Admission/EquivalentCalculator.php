<?php
namespace App\Helpers\Admission;

class EquivalentCalculator
{
    public static function calculate(int $value , array $range = [])
    {
        $from = $range[0];
        $to = $range[1];

        if (self::isAboveAverage($value, $from) ) {
            return "Above Average";
        } else if (self::isBelowAverage($value, $to)) {
            return "Below Average";
        } else {
            return "Average";
        }
    }

    private static function isAboveAverage(int $value, int $compare)
    {
        return $value > $compare;
    }

    public function isBelowAverage(int $value, int $compare)
    {
        return $value < $compare;
    }

}

