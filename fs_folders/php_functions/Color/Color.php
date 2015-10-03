<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/24/2015
 * Time: 1:33 AM
 */

namespace Design;


class Color {

    private $classColor = "";
    public function __construct() {

    }
    public function _setClassColor($action)
    {
        $classColor = "";

        /**
         * list-group-item-success
         * list-group-item-info
         * list-group-item-warning
         * list-group-item-danger
         */

        if($action == "Added to queue") {
            $classColor = "list-group-item-info";
        }
        elseif($action == "SignUp")
        {
            $classColor = "list-group-item-success";

        }
        elseif($action == "Open")
        {
            $classColor = "list-group-item-danger";

        }
        elseif($action == "Received new invitation")
        {
            $classColor = "list-group-item-warning";
        }
        else
        {
            $classColor = ""; // remove
        }



        $this->classColor = $classColor;
    }


    public function getClassColor_()
    {
        return $this->classColor;
    }



    public static function ColorShuffle() {
        $color = array(
            '#0000FF',
            '#7FFFD4',
            '#F0FFFF',
            '#F5F5DC',
            '#FFE4C4',
            '#FFEBCD',
            '#8A2BE2',
            '#A52A2A',
            '#DEB887',
            '#5F9EA0',
            '#7FFF00',
            '#D2691E',
            '#6495ED',
            '#00FFFF',
            '#FFF8DC',
            '#DC143C',
            '#008B8B',
            '#00008B'
        );
        $i = rand(0,count($color)-1);
        return $color[$i];
    }
    public static function shuffleClass($class=array()) {
        $i = rand(0,count($class)-1);
        return $class[$i];
    }


} 