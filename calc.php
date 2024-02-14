<?php
/*
 ----------------------------------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Fazer Calculos Simples
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 20/08/2008 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------------------------------
*/

@session_start();
$nome3 = addslashes($_SESSION["nome_log"]);

include("config.php");

include("funcoes2.php");

?>

<html>
<head>
<title>Calcularora</title>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
</html>

<script language=javascript> 

// bloqueando a tecla Ctrl
if (document.all) {
    document.onkeydown = function() {
        var teclaCtrl = event.keyCode ? event.keyCode : (event.which ? event.which : event.charCode);
        if (teclaCtrl == 17) {
            alert('Opção Invalida !!!');
            return false;
        }
    }
}
// Bloqueia Botao direito do mouse
function click() { 
if (event.button==2||event.button==3) { 
alert('Botão desativado !!!') 
} 
} 
document.onmousedown=click 

var opStack = new Array(4)
opStack[0]  = 0
opStack[1]  = ''
opStack[2]  = ''
opStack[3]  = ''
function start()
{
document.PAD.SUM.value= "0"
}
function KeyinNum()
  {
  if (opStack[0] >= 2) { opStack[0] = 3 } else { opStack[0] = 1 }
  opStack[opStack[0]] = '' + document.PAD.SUM.value
  }
function display ()
  {
  var sum  = parseFloat(opStack[1])
  var huge = Math.pow(10,14)
  sum      = Math.round (sum * huge) / huge
  document.PAD.SUM.value = '' + sum
  }
function resetNum ()
  {
  opStack[0] = 0
  opStack[1] = 0
  document.PAD.CAL.value = ''
  document.PAD.SUM.value = '0'
  }
function entry (x)
  {
  if (opStack[0] == -1) { opStack[0] = 1; opStack[1] = ''}
  if (opStack[0] == 0)  { opStack[0] = 1; opStack[1] = ''}
  if (opStack[0] == 2)  { opStack[0] = 3; opStack[3] = ''}
  var result = result = opStack[opStack[0]]
  if (result == '0')    { result = ''                                   }
  //---------------------------------------------------------------------
  if (x>='1' && x<='9') { result = '' + result + x                      }
  else if    (x == 'P') { result = '' + Math.PI                         }
  else if    (x == '0') { if (result != '') result = '' + result  + '0' }
  else if    (x == 'B') { if (result != '') result = result.substring(0, result.length - 1) }
  else if    (x == '.') {
    if (result != '')
      { if (result.indexOf(".") == -1) result += "." }
    else
      { result = '0.'                                }
    }
  //-----------------------------------------------------------------
  if (result =='') result = '0'
  opStack[opStack[0]] = result
  document.PAD.SUM.value = result
  }
function neg()
  {
  if (opStack[0] != 2  && opStack[0] != 0)
    {
    opStack[0] = Math.abs(opStack[0])
    var result = opStack[opStack[0]]
    if (result != '0' && result != '')
      {
      if (result.charAt(0) == '-')
        { result = result.substring(1, result.length) }
      else
        { result = '-' + result                       }
      opStack[opStack[0]] = result
      document.PAD.SUM.value = result
      }
    }
  }
function calc1 (x)
  {
  var opFlag = opStack[0]
  if (opFlag == -1 || opFlag == 1)
    {
    count(x)
    }
  else if (opFlag == 3)
    {
    opStack[1] = '' + eval(opStack[1] + opStack[2] + opStack[3])
    count(x)
    }
  }
function count (x)
  {
  if      (x == 'Si') { opStack[1] = '' + Math.sin (opStack[1])    }
  else if (x == 'aS') { opStack[1] = '' + Math.asin(opStack[1])    }
  else if (x == 'Co') { opStack[1] = '' + Math.cos (opStack[1])    }
  else if (x == 'aC') { opStack[1] = '' + Math.acos(opStack[1])    }
  else if (x == 'Ta') { opStack[1] = '' + Math.tan (opStack[1])    }
  else if (x == 'aT') { opStack[1] = '' + Math.atan(opStack[1])    }
  else if (x == '¡Ô') { opStack[1] = '' + Math.pow (opStack[1],.5) }
  else if (x == '^2') { opStack[1] = '' + Math.pow (opStack[1], 2) }
  else if (x == '^3') { opStack[1] = '' + Math.pow (opStack[1], 3) }
  else if (x == '^4') { opStack[1] = '' + Math.pow (opStack[1], 4) }
  else if (x == 'AB') { opStack[1] = '' + Math.abs (opStack[1])    }
  else if (x == '¡×') { }
  document.PAD.CAL.value = ''
  opStack[0] = -1
  display()
  document.PAD.SUM.focus()
  document.PAD.SUM.select()
  }
function calc2 (x)
  {
  var opFlag = opStack[0]
  if (opFlag != 2)
    {
    if (opFlag == 3)
      {
      opStack[1]=''+eval(opStack[1]+opStack[2]+opStack[3])
      display()
      }
    opStack[0] = 2
    opStack[2] = x
    document.PAD.CAL.value = x
    document.PAD.SUM.focus()
    document.PAD.SUM.select()
    }
  }
function fra()
{
var i
var j = 1
var k = document.PAD.SUM.value
if (k >= 70)
{opStack[1] = 0; document.PAD.SUM.value = "---Error---"; return}
for (i = 1; i <= k; i++)
{
j = j * i
}
opStack[1] = document.PAD.SUM.value = j
  document.PAD.SUM.focus()
  document.PAD.SUM.select()
}
function TurnOff()
{
var ask = confirm("Deseja Fechar a Calculador?")
if (ask == true) {window.close()}
else {return}
}
//-->
</script>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " ONLOAD="start()">
<form style="margin-bottom: 0" id="Unit2" NAME="PAD">
<table width="259" height="388" border="16" bordercolor="<?php echo $color_bor ?>">
  <tr>
    <td>

	<div id="Button1a_outer" style="Z-INDEX: 2; LEFT: 36px; WIDTH: 48px; POSITION: absolute; TOP: 132px; HEIGHT: 48px">
	<input type="BUTTON" id="Button1a" name="Button1a" value="1"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0"  onClick="entry('1')"  />
	</div>
	<div id="Button5a_outer" style="Z-INDEX: 3; LEFT: 36px; WIDTH: 48px; POSITION: absolute; TOP: 179px; HEIGHT: 48px">
	<input type="BUTTON" id="Button5a" name="Button5a" value="4"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0"  onClick="entry('4')"  />
	</div>
	<div id="Button9a_outer" style="Z-INDEX: 4; LEFT: 36px; WIDTH: 48px; POSITION: absolute; TOP: 226px; HEIGHT: 48px">
	<input type="BUTTON" id="Button9a" name="Button9a" value="7"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0" onClick="entry('7')"   />
	</div>
	<div id="Button13a_outer" style="Z-INDEX: 5; LEFT: 36px; WIDTH: 48px; POSITION: absolute; TOP: 273px; HEIGHT: 48px">
	<input type="BUTTON" id="Button13a" name="Button13a" value="0"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0" onClick="entry('0')"   />
	</div>
	<div id="Button2a_outer" style="Z-INDEX: 6; LEFT: 83px; WIDTH: 48px; POSITION: absolute; TOP: 132px; HEIGHT: 48px">
	<input type="BUTTON" id="Button2a" name="Button2a" value="2"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0" onClick="entry('2')"   />
	</div>
	<div id="Button6a_outer" style="Z-INDEX: 7; LEFT: 83px; WIDTH: 48px; POSITION: absolute; TOP: 179px; HEIGHT: 48px">
	<input type="BUTTON" id="Button6a" name="Button6a" value="5"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0"  onClick="entry('5')"  />
	</div>
	<div id="Button10a_outer" style="Z-INDEX: 8; LEFT: 83px; WIDTH: 48px; POSITION: absolute; TOP: 226px; HEIGHT: 48px">
	<input type="BUTTON" id="Button10a" name="Button10a" value="8"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0" onClick="entry('8')"   />
	</div>
	<div id="Button14a_outer" style="Z-INDEX: 9; LEFT: 83px; WIDTH: 48px; POSITION: absolute; TOP: 273px; HEIGHT: 48px">
	<input type="BUTTON" id="Button14a" name="Button14a" value="."  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0"  onClick="entry('.')"  />
	</div>
	<div id="Button3a_outer" style="Z-INDEX: 10; LEFT: 130px; WIDTH: 48px; POSITION: absolute; TOP: 132px; HEIGHT: 48px">
	<input type="BUTTON" id="Button3a" name="Button3a" value="3"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0"  onClick="entry('3')"  />
	</div>
	<div id="Button7a_outer" style="Z-INDEX: 11; LEFT: 130px; WIDTH: 48px; POSITION: absolute; TOP: 179px; HEIGHT: 48px">
	<input type="BUTTON" id="Button7a" name="Button7a" value="6"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0"  onClick="entry('6')"  />
	</div>
	<div id="Button11a_outer" style="Z-INDEX: 12; LEFT: 130px; WIDTH: 48px; POSITION: absolute; TOP: 226px; HEIGHT: 48px">
	<input type="BUTTON" id="Button11a" name="Button11a" value="9"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0" onClick="entry('9')"   />
	</div>
	<div id="Button15a_outer" style="Z-INDEX: 13; LEFT: 130px; WIDTH: 48px; POSITION: absolute; TOP: 273px; HEIGHT: 48px">
	<input type="BUTTON" id="Button15a" name="Button15a" value="="  style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:48px;width:48px;"   tabindex="0"  onClick="calc1('=')"  />
	</div>
	<div id="Button4a_outer" style="Z-INDEX: 14; LEFT: 177px; WIDTH: 48px; POSITION: absolute; TOP: 132px; HEIGHT: 48px">
	<input type="BUTTON" id="Button4a" name="Button4a" value="+"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0"   onClick="calc2('+')"  />
	</div>
	<div id="Button8a_outer" style="Z-INDEX: 15; LEFT: 177px; WIDTH: 48px; POSITION: absolute; TOP: 179px; HEIGHT: 48px">
	<input type="BUTTON" id="Button8a" name="Button8a" value="-"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0"  onClick="calc2('-')"   />
	</div>
	<div id="Button12a_outer" style="Z-INDEX: 16; LEFT: 177px; WIDTH: 48px; POSITION: absolute; TOP: 226px; HEIGHT: 48px">
	<input type="BUTTON" id="Button12a" name="Button12a" value="X"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0"  onClick="calc2('*')"  />
	</div>
	<div id="Button16a_outer" style="Z-INDEX: 17; LEFT: 177px; WIDTH: 48px; POSITION: absolute; TOP: 273px; HEIGHT: 48px">
	<input type="BUTTON" id="Button16a" name="Button16a" value="÷"  style=" font-family: Verdana; font-size: 14px;  height:48px;width:48px;"   tabindex="0" onClick="calc2('/')"   />
	</div>
	<div id="C_outer" style="Z-INDEX: 18; LEFT: 36px; WIDTH: 48px; POSITION: absolute; TOP: 100px; HEIGHT: 28px">
	<input type="BUTTON" id="C" name="C" value="C"  style=" font-family: Verdana; font-size: 14px; color: #FF0000; font-weight: bold; height:28px;width:48px;"   tabindex="0" onClick="resetNum()"   />
	</div>
	<div id="OFF_outer" style="Z-INDEX: 19; LEFT: 83px; WIDTH: 48px; POSITION: absolute; TOP: 100px; HEIGHT: 28px">
	<input type="BUTTON" id="OFF" name="OFF" value="OFF"  style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:28px;width:48px;"   tabindex="0"   onClick="TurnOff()"  />
	</div>
	<div id="Squa_outer" style="Z-INDEX: 20; LEFT: 130px; WIDTH: 48px; POSITION: absolute; TOP: 100px; HEIGHT: 28px">
	<input type="BUTTON" id="Squa" name="Squa" value="Squa"  style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:28px;width:48px;"   tabindex="0"  onClick="calc1('^2')"  />
	</div>
	<div id="X_outer" style="Z-INDEX: 21; LEFT: 177px; WIDTH: 48px; POSITION: absolute; TOP: 100px; HEIGHT: 28px">
	<input type="BUTTON" id="X" name="X" value="X²"  style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:28px;width:48px;"   tabindex="0" onClick="fra()"    />
	</div>
	<div id="BKsp_outer" style="Z-INDEX: 22; LEFT: 36px; WIDTH: 48px; POSITION: absolute; TOP: 324px; HEIGHT: 28px">
	<input type="BUTTON" id="BKsp" name="BKsp" value="Bksp"  style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:28px;width:48px;"   tabindex="0"  onClick="entry('B')"  />
	</div>
	<div id="Sqrt_outer" style="Z-INDEX: 23; LEFT: 83px; WIDTH: 48px; POSITION: absolute; TOP: 324px; HEIGHT: 28px">
	<input type="BUTTON" id="Sqrt" name="Sqrt" value="Sqrt"  style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:28px;width:48px;"   tabindex="0"  onClick="calc1('¡Ô')"   />
	</div>
	<div id="Pi_outer" style="Z-INDEX: 24; LEFT: 130px; WIDTH: 48px; POSITION: absolute; TOP: 324px; HEIGHT: 28px">
	<input type="BUTTON" id="Pi" name="Pi" value="Pi"  style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:28px;width:48px;"   tabindex="0"   onClick="entry('P')" />
	</div>
	<div id="Button20_outer" style="Z-INDEX: 25; LEFT: 177px; WIDTH: 48px; POSITION: absolute; TOP: 324px; HEIGHT: 28px">
	<input type="BUTTON" id="Button20" name="Button20" value="+/-"  style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:28px;width:48px;"   tabindex="0"  onClick="neg()"   />
	</div>
	<div id="SUM_outer" style="Z-INDEX: 26; LEFT: 40px; WIDTH: 183px; POSITION: absolute; TOP: 40px; HEIGHT: 48px">
	<input type="text" id="SUM" name="SUM" value="0,00" style=" font-family: Verdana; font-size: 20px; text-align: right; height:47px;width:183px;"    tabindex="0"  onChange="KeyinNum()"  />
	</div>
	<div id="CAL_outer" style="Z-INDEX: 27; LEFT: 42px; WIDTH: 24px; POSITION: absolute; TOP: 43px; HEIGHT: 24px">
	<input type="text" id="CAL" name="CAL" value="" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:23px;width:24px;"    tabindex="0"    />
	</div>

    </td>
  </tr>
</table>

</form>
