<?php
class Calculator {
    public static function sum($argv){
        $delimeters = array(',','\n','\\');
        $sum = 0;
        $filename = array_shift($argv);
        $function = array_shift($argv);
        $negnum = [];
        if(method_exists('Calculator', $function) == false){
            die('Please pass a valid calculation method - only SUM is valid. eg #php filename.php sum 1,2,3');
        }
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
                        $sum = $sum + $a;
                    }
                }
            }
        }

        if(count($negnum)){
            $negnumstring = implode(',', $negnum);
            die("Error: Negative numbers ($negnumstring) not allowed.");
        } else {
            echo $sum;
        }
    }

    private static function myexplode ($delimeter,$string) {
        $first = str_replace($delimeter, $delimeter[0], $string);
        $second = explode($delimeter[0], $first);
        return  $second;
    }
}

Calculator::sum($argv);