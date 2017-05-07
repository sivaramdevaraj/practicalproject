<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('price_format'))
{
	function price_format($num = '')
	{
		$explrestunits = "" ;
	    if(strlen($num)>3){
	        $lastthree = substr($num, strlen($num)-3, strlen($num));
	        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
	        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
	        $expunit = str_split($restunits, 2);
	        for($i=0; $i<sizeof($expunit); $i++){
	            // creates each of the 2's group and adds a comma to the end
	            if($i==0)
	            {
	                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
	            }else{
	                $explrestunits .= $expunit[$i].",";
	            }
	        }
	        $thecash = $explrestunits.$lastthree;
	    } else {
	        $thecash = $num;
	    }
	    return $thecash;
		
		/*if($price >= 10000000) $price = ($price/10000000).round(2) . ' Cr';
		else if($price >= 100000) $price = ($price/100000).round(2) . ' Lac';
		else if($price >= 1000) $price = ($price/1000).round(2) . ' K';
		return $price;*/
	}
}