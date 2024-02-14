<?php

/**
 * @author holodek
 * @copyright 2010
 */

$var_1 = trim("j");

$stri_crip = muda_carac($var_1);

echo $var_1."<br>";
echo $stri_crip;


Function muda_carac($var){

// Letras
$var = ereg_replace("[Aa]",    "10BA6",$var);
$var = ereg_replace("[Bb]",    "1AFED",$var);
$var = ereg_replace("[Cc]",    "19947",$var);
$var = ereg_replace("[Dd]",    "920D8",$var);
$var = ereg_replace("[Ee]",    "5748F",$var);
$var = ereg_replace("[Ff]",    "4A41D",$var);
$var = ereg_replace("[Gg]",    "1B023",$var);
$var = ereg_replace("[Hh]",    "9DCB0",$var);
$var = ereg_replace("[Ii]",    "577C1",$var);
$var = ereg_replace("[Jj]",    "525F3",$var);
$var = ereg_replace("[Kk]",    "A396A",$var);
$var = ereg_replace("[Ll]",    "486AF",$var);
$var = ereg_replace("[Mm]",    "9C55D",$var);
$var = ereg_replace("[Nn]",    "6BA33",$var);
$var = ereg_replace("[Oo]",    "F4898",$var);
$var = ereg_replace("[Pp]",    "809CC",$var);
$var = ereg_replace("[Qq]",     "45D5D",$var);
$var = ereg_replace("[Rr]",     "93E81",$var);
$var = ereg_replace("[Ss]",     "B4482",$var);
$var = ereg_replace("[Tt]",     "66842",$var);
$var = ereg_replace("[Uu]",     "1A0D2",$var);
$var = ereg_replace("[Vv]",     "F0B6C",$var);
$var = ereg_replace("[Xx]",     "1651D",$var);
$var = ereg_replace("[Zz]",     "E8619",$var);
$var = ereg_replace("[Ww]",     "F75D8",$var);
$var = ereg_replace("[Yy]",     "3AA62",$var);
$var = ereg_replace("[0]",      "FB5AC",$var);
$var = ereg_replace("[1]",      "67E96",$var);
$var = ereg_replace("[2]",      "16CF7",$var);
$var = ereg_replace("[3]",      "74E69",$var);
$var = ereg_replace("[4]",      "EB658",$var);
$var = ereg_replace("[5]",      "A59B5",$var);
$var = ereg_replace("[6]",      "085F0",$var);
$var = ereg_replace("[7]",      "A180E",$var);
$var = ereg_replace("[8]",      "14B27",$var);
$var = ereg_replace("[9]",      "5AB94",$var);


return($var);
}
?>