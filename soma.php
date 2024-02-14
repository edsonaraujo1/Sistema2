<?php
  $linha=file("soma.txt"); //define arquivo onde ficara gravado os acessos

  if (isset($var)){         //verifica cookie
    echo "$linha[0]";            //imprime linha 0 caso cookie existente
  }else{                         //<-+          
  $visitas = $linha[0];          //  |
  $visitas += 1;                 //  |
  $cf=fopen("soma.txt","w"); //  |->incrementa 1 ao contador e exibe linha 0
  fputs($cf,"$visitas");         //  |  se cookie inexistente
  fclose($cf);                   //  |
  define ("visitas", "$visitas");
//  echo "$visitas";             //  |
  }                              //<-+
?>