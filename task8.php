<?php
class Calculator {
    public static function multiply($argv){
        $delimeters = array(',','\n','\\');
        $multiply = 1;
        $filename = array_shift($argv);
        $function = array_shift($argv);
        if(method_exists('Calculator', $function) == false){
            die('Please pass a valid calculation method - only MULTIPLY is valid. eg #php filename.php multiply 1,2,3');
        }
        $negnum = [];

        if(count($argv)){
            $values = self::myexplode($delimeters, $argv[0]);
            if(count($values)){
                foreach($values AS $a){
                    if(empty($a)){
                        array_shift($values);
                    } elseif($a < 0) { 
                        array_push($negnum, $a);
                    } elseif($a > 1000) { 
                        array_shift($values);
                    }else {
                        $multiply = $multiply * $a;
                    }
                }
            }
        } else {
            $multiply = 0;
        }

        if(count($negnum)){
            $negnumstring = implode(',', $negnum);
            die("Error: Negative numbers ($negnumstring) not allowed.");
        } else {
            echo $multiply;
        }
    }

    private static function myexplode ($delimeter,$string) {
        $first = str_replace($delimeter, $delimeter[0], $string);
        $second = explode($delimeter[0], $first);
        return  $second;
    }
}

Calculator::multiply($argv);