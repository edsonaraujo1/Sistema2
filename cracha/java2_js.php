<?php

/*

  Funcao para Criptografia de dados
  com reversao base64_encode

*/

//$senha = 12345;

//echo encode5t_se(addslashes(strtoupper($senha)));
 
//function to encrypt the string
function encode5t_se($str)
{
  for($i=0; $i<3;$i++)
  {
    $str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
  }
  return $str;
}
//function to decrypt the string
function decode5t_se($str)
{
  for($i=0; $i<3;$i++)
  {
    $str=base64_decode(strrev($str)); //apply base64 first and then reverse the string}
  }
  return $str;
}

?>