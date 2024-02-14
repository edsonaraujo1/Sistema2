<html>
<head>
<title>Teste</title>
</head>
<body bgcolor="#ffffff" link="#333399" vlink="#000000">
<div align="center"> 
  <table width="100" border="0" cellspacing="0" cellpadding="0" top="0">
    <tr>
      <td align=center><img height=35 src="sindificios.gif"></td>
    </tr>
  </table>
</div>
<?
 

		  if(isset($_GET['cntrl']))
		    $menucntrl = $_GET['cntrl'];
		  else
		    $menucntrl = 'c';
		 	if($menucntrl == 'c')
		    	include 'mainmenuopen.php';
		    else 
				include 'mainmenuopen.php';

?> 
</body>
</html>
