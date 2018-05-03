<?php
class Calculator {
    public static function sum($argv){
        $sum = 0;
        $filename = array_shift($argv);
        $function = array_shift($argv);
        if(method_exists('Calculator', $function) == false){
            die('Please pass a valid calculation method - only SUM is valid. eg #php filename.php sum 1,2,3');
        }
        if(count($argv)){
            $values = explode(',', $argv[0]);
            if(count($values)){
                foreach($values AS $a){
                    if(empty($a)){
                        //
                    } else {
                        $sum = $sum + $a;
                    }
                }
            }
        }
        echo $sum;
    }
}

Calculator::sum($argv);
