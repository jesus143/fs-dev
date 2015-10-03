<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 04/02/2015
 * Time: 6:34 PM
 */

namespace Helper;


class Calculation {

    private $start = 0;
    private $end = 0;

    function __construct() {
    }
    public function __setLimitStartEnd($counter, $limit)
    {
        $a = $counter;
        $b = $limit;

        $d = $a * $b;
        $c = $d - $b;
        $this->end = $d;
        $this->start = $c;
    }
    public function getLimitStart__() {
        return $this->start;
    }
    public function getLimitEnd__() {
        return $this->end;
    }
} 