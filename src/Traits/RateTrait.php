<?php

namespace Cpkm\Admin\Traits;

trait RateTrait
{
    protected $point = 8;
    public function calculateCeil($amount, $decimal_point) {
        $round = pow(10, $decimal_point);
        return (float)ceil(round($amount * $round)) / $round;
    }
}
