<?php

function createid($gen,$name,$phno,$pass,$dept)
{
	$id = array(10);
	/*
	if($gen=="Male")
   {
       $id[0]="M";
   }
   elseif($gen=="Female")
   {
       $id[0]="F";
   }
   */
   $id[1] = date('s', time());
   $name = trim($name);
   $len = strlen($name);
   $arr = str_split($name);
   $id[2] = $arr[$len-1];
   $id[3] = $arr[0];
   
  	if( ctype_digit(strval($phno)) )
	{
		$phno1 = str_split($phno);
		$sum = intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) ;
		$sum = (string) $sum;
		if( strlen($sum) == 2 )
		{
			$sum1 = str_split($sum);
			$id[4] = $sum1[1];
			$id[5] = $sum1[0];
		}
		else if( strlen($sum) == 1)
		{
			$id[4] = $sum;
			$id[5] = 0;
		}
	}
	else
	{
		$id[4] = rand(0, 9);
		$id[5] = rand(0, 9);
	}
	
	$pass = str_split($pass);
	$r1 = rand(0, 31);
	$r2 = rand(0, 31);
	//print $r1."   ".$pass[$r1]."    ".$r2."     ".$pass[$r2];
	$i1 = ord($pass[$r1]) + ord('$') - ord('!');
	$i2 = ord($pass[$r2]) - ord('"') + ord('(');
	if( ($i1 > 57 && $i1 < 65))
		$i1 = $i1 - 10;
	else if( ($i1 > 90 && $i1 < 97) )
		$i1 = $i1 - 26;
	else if( $i1 > 122  )
		$i1 = $i1 - 26;
	
	//echo "$i2 = ".$i2." ";
	if( ($i2 > 57 && $i2 < 65) )
			$i2 = $i2 - 10;
	else if($i2 > 90 && $i2 < 97)
		$i2 = $i2 - 26;
	else  if($i2 > 122)
		$i2 = $i2 - 26;
	//echo $i2."   	";
	$id[6] = chr($i1);
	$id[7] = chr($i2);
	
	$dept = trim($dept);
	$res = explode(' ', $dept);
	$res0 = str_split($res[0]);
	$res1 = str_split($res[1]);
	
	$id[0] = $res0[0];
	$id[8] = $res1[0];
	
	//print_r($id);
	return implode("",$id);
}

//createid("Male", "Aman Anand", "7204240644", "123ahksajbkbckasbckasjbcsakjbasckajbcvkajbvman", "Civil Engineering");
?>