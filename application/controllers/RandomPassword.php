<?php
/**
 * Created by PhpStorm.
 * User: Jatin Varlyani
 * Date: 19-06-2018
 * Time: 11:54
 */

class RandomPassword
{
    public  static function generate(){
        $string = "";

        for ($i=1;$i<=10;$i++)
        {
            $n = rand(0,255);
            if ($n>47  &&  $n<58 ||  $n>64 &&  $n<91  ||  $n>96  &&  $n<123)
                $string .= (chr($n));
            else
                $i--;
            continue;
        }
        return $string;

    }   //end of func


}//end of class file