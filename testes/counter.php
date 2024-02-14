<?php
/*******************************************************************************
*  Title: PHP hit counter (PHPcount)
*  Version: 1.3 @ August 21, 2009
*  Author: Klemen Stirn
*  Website: http://www.phpjunkyard.com
********************************************************************************
*  COPYRIGHT NOTICE
*  Copyright 2004-2009 Klemen Stirn. All Rights Reserved.
*
*  This script may be used and modified free of charge by anyone
*  AS LONG AS COPYRIGHT NOTICES AND ALL THE COMMENTS REMAIN INTACT.
*  By using this code you agree to indemnify Klemen Stirn from any
*  liability that might arise from it's use.
*
*  Selling the code for this program, in part or full, without prior
*  written consent is expressly forbidden.
*
*  Obtain permission before redistributing this software over the Internet
*  or in any other medium. In all cases copyright and header must remain
*  intact. This Copyright is in full effect in any country that has
*  International Trade Agreements with the United States of America or
*  with the European Union.
*******************************************************************************/

// SETUP YOUR COUNTER
// Detailed information found in the readme.htm file

// Count UNIQUE visitors ONLY? 1 = YES, 0 = NO
$count_unique = 0;

// Number of hours a visitor is considered as "unique"
$unique_hours = 24;

// Minimum number of digits shown (zero-padding). Set to 0 to disable.
$min_digits = 5;

#############################
#     DO NOT EDIT BELOW     #
#############################

/* Turn error notices off */
error_reporting(E_ALL ^ E_NOTICE);

/* Get page and log file names */
$page = input($_GET['page']) or die('ERROR: Missing page ID');


echo $page."<br>";

//$page = 'cont';
$logfile = 'logs/' . $page . '.txt';

/* Does the log exist? */
if (file_exists($logfile))
{
	/* Get current count */
	$count = intval(trim(file_get_contents($logfile))) or $count = 0;
	$cname = 'tcount_unique_'.$page;

	if ($count_unique==0 || !isset($_COOKIE[$cname]))
    {
		/* Increase the count by 1 */
		$count = $count + 1;
		$fp = @fopen($logfile,'w+') or die('ERROR: Can\'t write to the log file ('.$logfile.'), please make sure this file exists and is CHMOD to 666 (rw-rw-rw-)!');
		flock($fp, LOCK_EX);
		fputs($fp, $count);
		flock($fp, LOCK_UN);
		fclose($fp);

		/* Print the Cookie and P3P compact privacy policy */
		header('P3P: CP="NOI NID"');
		setcookie($cname, 1, time()+60*60*$unique_hours);
	}

	/* Is zero-padding enabled? */
    if ($min_digits > 0)
    {
	    $count = sprintf('%0'.$min_digits.'s',$count);
    }

    /* Print out Javascript code and exit */
    echo 'document.write(\''.$count.'\');'."<br>";
    
    echo $count."<br>";
    
    $qtd_ivisita = intval($count);
    
    echo $qtd_ivisita."<br>";
    
    
for ($i = 0; $i < strlen($qtd_ivisita); $i++) //"anda" pelos números de $counter
{
    $imgsrc = substr($qtd_ivisita,$i ,1); //armazena o número que está sendo analisado em $imgsrc
    $ima_01[$i]  = trim("im/".$imgsrc.".gif");
}

if(!empty($ima_01[0])){
   $fim_00 = "<img src=".$ima_01[0].">";
}
if(!empty($ima_01[1])){
   $fim_01 = "<img src=".$ima_01[1].">";
}
if(!empty($ima_01[2])){
   $fim_02 = "<img src=".$ima_01[2].">";
}
if(!empty($ima_01[3])){
   $fim_03 = "<img src=".$ima_01[3].">";
}
if(!empty($ima_01[4])){
   $fim_04 = "<img src=".$ima_01[4].">";
}
if(!empty($ima_01[5])){
   $fim_05 = "<img src=".$ima_01[5].">";
}
if(!empty($ima_01[6])){
   $fim_06 = "<img src=".$ima_01[6].">";
}
if(!empty($ima_01[7])){
   $fim_07 = "<img src=".$ima_01[7].">";
}
if(!empty($ima_01[8])){
   $fim_08 = "<img src=".$ima_01[8].">";
}
if(!empty($ima_01[9])){
   $fim_09 = "<img src=".$ima_01[9].">";
}

$qtd_ivisita = trim($fim_00.$fim_01.$fim_02.$fim_03.$fim_04.$fim_05.$fim_06.$fim_07.$fim_08.$fim_09);

echo $qtd_ivisita;
    
    exit();
}
else
{
    die('ERROR: Invalid log file!');
}



/* This functin handles input parameters making sure nothing dangerous is passed in */
function input($in)
{
    $out = htmlentities(stripslashes($in));
    $out = str_replace(array('/','\\'), '', $out);
    return $out;
}
?>
