<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerador de Guias Sindical e demais
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

include("../logar.php");

include("menu.php");

$nome3 = $_SESSION["nome_log"];

include("vaurls.php");

include_once('../sql_injection.php');

$deixar = acesso_url("GUIAS_CONF_ADMS");

if ($deixar == "SIM"){


// Resgata Sessao
session_name("Val_Sind");
@session_start();

$Edit1   = addslashes($_SESSION['Edit1']);
$Edit2   = addslashes($_SESSION['Edit2']);
$Edit3   = addslashes($_SESSION['Edit3']); 
$Edit4   = addslashes($_SESSION['Edit4']);
$Edit5   = addslashes($_SESSION['Edit5']);
$Edit6   = addslashes($_SESSION['Edit6']);
$Edit7   = addslashes($_SESSION['Edit7']);
$Edit8   = addslashes($_SESSION['Edit8']);
$Edit9   = addslashes($_SESSION['Edit9']);
$Edit10  = addslashes($_SESSION['Edit10']);
$nurecno = addslashes($_SESSION['nurecno']);
$cedente_nome = addslashes($_SESSION['cedente_nome']);

	
	
?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
</head>
</html>
<?
// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abrir tabela Administradora

$consulta2 = "SELECT * FROM Adms Where cod = '". anti_sql_injection($Edit7) ."'";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$cod_adm      = @$row2["cod"];
$nome_adm     = substr(@$row2["nomeadm"],0,38);

// Conta quantas guias vao ser impressas

include("funcoes2.php");


        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		</script>
<?

if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit4").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit4)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit5").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit5)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit6)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit7").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit7)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit8").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit8)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit9").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit9)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit10").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit10)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("done").focus();	
		}
		
		</script>
		<?
}


?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

<script LANGUAGE="JavaScript">
<!-- Begin
nextfield = "Edit1";
netscape  = "";
ver = navigator.appVersion; len = ver.length;

function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == 'done') {
return false;
} else {
eval('document.form1.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown;
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->



function txtBoxFormat(objForm, strField, sMask, evtKeyPress) {
var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;


     if(document.all) { nTecla = evtKeyPress.keyCode; }
else if(document.getElementById) { nTecla = evtKeyPress.which; }

//     if(document.all)            { nTecla = evtKeyPress.KeyCode; }    // Internet Explorer
//     if(document.layers)         { nTecla = evtKeyPress.which;   }    // Netscape
//     if(document.getElementById) { nTecla = evtKeyPress.which;   }    // FireFox


sValue = objForm[strField].value;
sValue = sValue.toString().replace( "-", "" );
sValue = sValue.toString().replace( "-", "" );
sValue = sValue.toString().replace( ".", "" );
sValue = sValue.toString().replace( ".", "" );
sValue = sValue.toString().replace( "/", "" );
sValue = sValue.toString().replace( "/", "" );
sValue = sValue.toString().replace( "(", "" );
sValue = sValue.toString().replace( "(", "" );
sValue = sValue.toString().replace( ")", "" );
sValue = sValue.toString().replace( ")", "" );
sValue = sValue.toString().replace( " ", "" );
sValue = sValue.toString().replace( " ", "" );
fldLen = sValue.length;
mskLen = sMask.length;
i = 0;
nCount = 0;
sCod = "";
mskLen = fldLen;
while (i <= mskLen) {
bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))
if (bolMask) {
sCod += sMask.charAt(i);
mskLen++; }
else {
sCod += sValue.charAt(nCount);
nCount++;
}
i++;
}
objForm[strField].value = sCod;
if (nTecla != 8) { 
if (sMask.charAt(i-1) == "9") { 
return ((nTecla > 47) && (nTecla < 58)); } 
else { 
return true;
} }
else {
return true;
}
}
// Fim
</script>

<script language="javascript">
function mudacor(campoatual){
var cor = "#EAEAEA"
document.getElementById(campoatual).style.background = cor;
}
function voltacor(campoatual){

document.getElementById(campoatual).style.background = '';
}

</script>

</HEAD>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();">
<form style="margin-bottom: 0" id="form1" name="form1" method="post" action="conf_pdf.php" target="new" onSubmit="return checa(this);">


<div align="center" style="Z-INDEX: 0; LEFT: 145px; POSITION: absolute;  TOP: 62px;"
  <br>
  <table width="697" border="16" bordercolor="<?=$color_bor;?>" bgcolor="#FFFFFF">
    <tr>
      <td><div align="center">        
        <table width="100%" border="0">
          <tr>
            <td width="64%" height="42"><div align="left"><b><font size="5" face="Verdana" color="<?=$color_bor;?>">Impress&atilde;o de Contribuição</font></b></div></td>
            <td width="36%"><div align="center"><b><font size="2" face="Verdana"><?=$menssagens;?></font></b></div></td>
          </tr>
        </table>
        </div></td>
    </tr>
    <tr>
      <td><div align="center">
        <table width="100%" border="0" cellpadding="1" cellspacing="0">
            <div align="left"></div>
            <tr>
              <td width="25%" class="style3"><div align="right"><b><font size="2" face="Verdana">Vencimento.: </font></b></div></td>
              <td width="75%"><div align="left">
                <input name="Edit1" type="text" id="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:96px;" onkeypress="return txtBoxFormat(document.form1, 'Edit1', '99/99/9999', event);" onchange="Salva_conf_avul1(this)" onfocus="this.className='anormal'; nextfield ='Edit1';" onblur="this.className='normal'" onFocus="nextfield ='Edit2';"/>
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Cod. Instru&ccedil;&atilde;o.:</font></b></div></td>
              <td><div align="left">
                  <input name="Edit2" type="text" id="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:50px;" onkeypress="return txtBoxFormat(document.form1, 'Edit2', '99', event);" onchange="Salva_conf_avul2(this)" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'" onFocus="nextfield ='Edit3';"/>&nbsp;<font color="##ff0000"><b><?= substr($cedente_nome,0,30); ?></b></font>

              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Tipo de Contr.:</font></b></div></td>
              <td><div align="left">
                  <select name="Edit3" type="text" id="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:150px;"  onchange="Salva_conf_avul3(this)" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'" onFocus="nextfield ='Edit4';"  tabindex="4"    />

            <option value="<?=$Edit3;?> "><?=$Edit3;?>  </option>
            <option value="SINDICAL">       SINDICAL </option>
            <option value="CONFEDERATIVA">  CONFEDERATIVA </option>
            <option value="ASSISTENCIAL">   ASSISTENCIAL </option>

</select>
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Exercicio.:</font></b></div></td>
              <td><div align="left">
                  <input name="Edit4" type="text" id="Edit4"  value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:56px;" onkeypress="return txtBoxFormat(document.form1, 'Edit4', '9999', event);" onchange="Salva_conf_avul4(this)" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'" onFocus="nextfield ='Edit5';"/>
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Imprime Verso.:</font></b></div></td>
              <td><div align="left">
                  <select name="Edit5" type="text" id="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:61px;"  onchange="Salva_conf_avul5(this)" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'" onFocus="nextfield ='Edit6';"  tabindex="4"    />

            <option value="<?=$Edit5;?> "><?=$Edit5;?>  </option>
            <option value="SIM">  SIM </option>
            <option value="NAO">  NAO </option>

</select>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Imprimir para.:</font></b></div></td>
              <td><div align="left">
                  <select name="Edit6" type="text" id="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:161px;"  onchange="Salva_conf_avul6(this)" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'" onFocus="nextfield ='Edit7';"  tabindex="4"    />

            <option value="<?=$Edit6;?> "><?=$Edit6;?>  </option>
            <option value="EMPRESAS">       EMPRESAS </option>
            <option value="CONTABILIDADE">  CONTABILIDADE </option>
            <option value="ADMINISTRADORA"> ADMINISTRADORA </option>

</select>
                   <b><font size="2" face="Verdana">
                  </font></b></div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Iniciar em Cod.:</font></b></div></td>
              <td><div align="left">
                <input name="Edit7" type="text" id="Edit7"  value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:86px;" onkeypress="return txtBoxFormat(document.form1, 'Edit7', '999999', event);" onchange="Salva_conf_avul7(this)" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'" onFocus="nextfield ='Edit8';"/>
</div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Terminar em Cod.:</font></b></div></td>
              <td><div align="left">
                <input name="Edit8" type="text" id="Edit8"  value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:86px;" onkeypress="return txtBoxFormat(document.form1, 'Edit8', '999999', event);" onchange="Salva_conf_avul8(this)" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'" onFocus="nextfield ='Edit9';"/> 
</div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Envias por Email.: </font></b></div></td>
              <td><div align="left">
                <select name="Edit9" type="text" id="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:61px;"  onchange="Salva_conf_avul9(this)" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'" onFocus="nextfield ='Edit10';"  tabindex="4"    />

            <option value="<?=$Edit9;?> "><?=$Edit9;?>  </option>
            <option value="SIM">  SIM </option>
            <option value="NAO">  NAO </option>

</select>
</div></td>
            </tr>
            <tr>
              <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Email.:</font></b></div></td>
              <td><div align="left">
                <input name="Edit10" type="text" id="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:450px;" onchange="Salva_conf_avul10(this)" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'" onFocus="nextfield ='done';"/> 
</div></td>
           
            </tr>
            <tr>
			
			
                <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Qtd.:</font></b></div></td>

				<td><div align="left">
				   &nbsp;&nbsp;&nbsp;<font color="##ff0000"><b><?=$nurecno;?></b></font> 
				</div></td>
			
			</tr>
        </table>
        <img src="../imagens/px1.gif" width="10" height="8">        <table width="633" border="0">
          <tr>
            <td width="4"><img src="../imagens/px1.gif" width="15" height="8"></td>
            <td width="590"><div align="center">
                <table width="270" border="0">
                  <tr>
                    <td width="90"><div align="center"><input type=image name="imprimir" src="../imagens/botaoazul23.PNG"></div> </form></td>
                    
                        

                    <td width="92"><div align="center">
					
			         <form method="POST" action="../avaleht.php?servletjs2=20$$20">
			         <td><input type=image name="Sair" src="../imagens/botaoazul9.PNG"></td>
			         </form>
					
					</div></td>
					
                    <td width="92">
					
					<div align="center">
					
			         <form method="POST" action="../avaleht.php?servletjs2=20$$20">
			         <td><input type=image name="E-mail" src="../imagens/botaoazul44.PNG"></td>
			         </form>
					
					
					</div></td>
                    </tr>
                </table>
            </div></td>
            <td width="33" valign="bottom"><img src="../imagens/vacina.JPG" width="27" height="38"></td>
          </tr>
        </table>
      <img src="../imagens/px1.gif" width="10" height="0"> </div></td>
    </tr>
  </table>
</div>
</body>

</html>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
