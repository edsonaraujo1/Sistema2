<?php

/*

  Funcao para Criptografia de dados
  com reversao base64_encode

*/
//function to encrypt the string
function encode5t($str)
{
  for($i=0; $i<9;$i++)
  {
    $str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
  }
  return $str;
}
//function to decrypt the string
function decode5t($str)
{
  for($i=0; $i<9;$i++)
  {
    $str=base64_decode(strrev($str)); //apply base64 first and then reverse the string}
  }
  return $str;
}

?>