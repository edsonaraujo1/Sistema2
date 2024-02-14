<HTML><HEAD><TITLE> My Calendar </TITLE></HEAD><BODY text="white">
<?
    // get all the info
if (!$HTTP_POST_VARS) {
    $theDate = getdate(); 
    $mon = $theDate["mon"];     // numeric month (1-12)
    $month = $theDate["month"]; // display month january, feb..
    $year = $theDate["year"];   // 4 digit year (y2k compliant)
}
if ($action = "findDate") { 
    $theDate = getdate(mktime(0,0,0,$mon,1,$year)); 
    $month = $theDate["month"]; 
}


    // get what weekday the first is on
    $tempDate = getdate(mktime(0,0,0,$mon,1,$year));
    $firstwday= $tempDate["wday"];

    // get the last day of the month
    $cont = true;
    $tday = 27;
    while (($tday <= 32) && ($cont)) {
        $tdate = getdate(mktime(0,0,0,$mon,$tday,$year));
        if ($tdate["mon"] != $mon) {
            $lastday = $tday - 1;
            $cont = false;
        }
        $tday++;
    }

?>

<table width="320" border="1" cellspacing=0 cellpadding=2>
<tr bgcolor="navy"><td colspan="7">
<table width="320" border="0"><tr><td align="center" valign="center">
<FORM METHOD="POST" ACTION="<? echo $PHP_SELF; ?>">
<INPUT TYPE="HIDDEN" NAME="action" VALUE="findDate">
<INPUT TYPE="HIDDEN" NAME="mon" VALUE="<?
if (($mon-1)<1) { echo "12"; } 
else { echo $mon-1; } ?>">
<INPUT TYPE="HIDDEN" NAME="year" VALUE="<?
if (($mon-1)<1) { echo $year-1; }
else { echo $year; } ?>">
<br><INPUT TYPE="SUBMIT" VALUE="Prev">
</FORM>
</TD><TD ALIGN="CENTER">
<? echo " <b>$month $year</b> "; ?>
</TD><TD align="center" valign="center">
<FORM METHOD="POST" ACTION="<? echo $PHP_SELF; ?>">
<INPUT TYPE="HIDDEN" NAME="action" VALUE="findDate">
<INPUT TYPE="HIDDEN" NAME="mon" VALUE="<?
if (($mon+1)>12) { echo "1"; } 
else { echo $mon+1; } ?>">
<INPUT TYPE="HIDDEN" NAME="year" VALUE="<?
if (($mon+1)>12) { echo $year+1; }
else { echo $year; } ?>">
<BR><INPUT TYPE="SUBMIT" VALUE="Next">
</FORM></td></tr></table>
</td></tr>
<tr bgcolor="darkgreen"><th>Su</th><th>M</th><th>T</th><th>W</th><th>Th</th><th>F</th><th>Sat</th></tr>
<?  $d = 1;
    $thisDay = date('d');
    $thisMon = date('n');
    $thisMonth = date('F');
    $thisYear = date('Y');
    $wday = $firstwday;
    $firstweek = true;

    // loop through all the days of the month
    while ( $d <= $lastday) {

        // set up blank days for first week
        if ($firstweek) {
            echo "<TR>";
            for ($i=1; $i<=$firstwday; $i++) {
                echo "<TD>  </td>";
            }
            $firstweek = false;
        }

        if ($wday==0) {
            // Sunday start week with <tr>
            echo "<tr>";
        }
            // print cell
            // 
            echo "<td"; 
            if (($d == $thisDay) && ($mon == $thisMon)) { echo " BGCOLOR=\"yellow\""; }
            echo "><font color=black> $d </font></td>";

        if ($wday==6) {
            // Saturday end week with </tr>
            echo "</tr>\n";
        }

        $wday++;
        $wday = $wday % 7;
        $d++;
    }
    ?>
<TR bgcolor="black"><TD COLSPAN="7" ALIGN="CENTER"><FONT COLOR="YELLOW">Today is <? $dte=date("l, M j, Y"); echo $dte; ?></FONT></TD></TR>
<TR bgcolor="navy"><TD COLSPAN="7" ALIGN="CENTER"><FORM METHOD="POST" ACTION="<? echo $PHP_SELF; ?>">
<INPUT TYPE="HIDDEN" NAME="action" VALUE="findDate">
<BR>
Go To: 
<SELECT NAME="mon">
<OPTION VALUE="<? echo $thisMon; ?>"><? echo $thisMonth; ?></OPTION>
<OPTION VALUE="<? echo $thisMon; ?>">--------------</OPTION>
<OPTION VALUE="1">January</OPTION>
<OPTION VALUE="2">February</OPTION>
<OPTION VALUE="3">March</OPTION>
<OPTION VALUE="4">April</OPTION>
<OPTION VALUE="5">May</OPTION>
<OPTION VALUE="6">June</OPTION>
<OPTION VALUE="7">July</OPTION>
<OPTION VALUE="8">August</OPTION>
<OPTION VALUE="9">September</OPTION>
<OPTION VALUE="10">October</OPTION>
<OPTION VALUE="11">November</OPTION>
<OPTION VALUE="12">December</OPTION>
</SELECT> 
<SELECT NAME="year">
<OPTION VALUE="<? echo $thisYear; ?>"><? echo $thisYear; ?></OPTION>
<OPTION VALUE="<? echo $thisYear; ?>">--------</OPTION> 
<OPTION VALUE="2000">2000</OPTION>
<OPTION VALUE="2001">2001</OPTION>
<OPTION VALUE="2002">2002</OPTION>
<OPTION VALUE="2003">2003</OPTION>
<OPTION VALUE="2004">2004</OPTION>
<OPTION VALUE="2005">2005</OPTION>
</SELECT> 
<INPUT TYPE="Submit" VALUE="Find!">
</FORM></TD></TR>
</table>

</body>
</html>