<?
/*
 ---------------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout2 Cadastro Instrucoes para Consulta
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ---------------------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

include("funcoes2.php");
?>

<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();"  >
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 524px; POSITION: absolute; TOP: 44px; HEIGHT: 248px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 544 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 544 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 544 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 656 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 377px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:377px;"   ><STRONG>Instru��o de Cobran�a</STRONG>&nbsp;</div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 426px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 452 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 452 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 452 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 64px; POSITION: absolute; TOP: 145px; HEIGHT: 20px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 313px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px;"  tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 181px; WIDTH: 126px; POSITION: absolute; TOP: 171px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:126px;"   ><STRONG>Nome da Ent.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 313px; WIDTH: 503px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>"  onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:503px;"  tabindex="0"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 181px; WIDTH: 171px; POSITION: absolute; TOP: 196px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Codigo&nbsp;Sindical.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 312px; WIDTH: 249px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>"  onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:249px;"  tabindex="0"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 11; LEFT: 566px; WIDTH: 62px; POSITION: absolute; TOP: 196px; HEIGHT: 19px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:62px;"   ><STRONG>CNPJ.:</STRONG></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 12; LEFT: 620px; WIDTH: 196px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>"  onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:196px;"  tabindex="0"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 13; LEFT: 183px; WIDTH: 145px; POSITION: absolute; TOP: 221px; HEIGHT: 19px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:145px;"   ><STRONG>Endere�o.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 14; LEFT: 312px; WIDTH: 312px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>"  onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:312px;"  tabindex="0"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 15; LEFT: 628px; WIDTH: 77px; POSITION: absolute; TOP: 221px; HEIGHT: 19px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:77px;"   > <STRONG>Numero</STRONG><STRONG>.:</STRONG>  </div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 16; LEFT: 701px; WIDTH: 115px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>"  onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:115px;"  tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 17; LEFT: 184px; WIDTH: 77px; POSITION: absolute; TOP: 246px; HEIGHT: 19px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:77px;"   > <STRONG>Bairro</STRONG><STRONG>.:</STRONG>  </div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 18; LEFT: 312px; WIDTH: 248px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>"  onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:248px;"  tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 19; LEFT: 628px; WIDTH: 54px; POSITION: absolute; TOP: 246px; HEIGHT: 19px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:54px;"   > <STRONG>CEP</STRONG><STRONG>.:</STRONG>  </div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 20; LEFT: 701px; WIDTH: 115px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>"  onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:115px;"  tabindex="0"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 21; LEFT: 184px; WIDTH: 77px; POSITION: absolute; TOP: 271px; HEIGHT: 19px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:77px;"   > <STRONG>Cidade</STRONG><STRONG>.:</STRONG>  </div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 22; LEFT: 312px; WIDTH: 248px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>"  onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:248px;"  tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 23; LEFT: 628px; WIDTH: 54px; POSITION: absolute; TOP: 271px; HEIGHT: 19px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:54px;"   > <STRONG>UF</STRONG><STRONG>.:</STRONG>  </div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 24; LEFT: 701px; WIDTH: 115px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>"  onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:115px;" tabindex="0"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 25; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 296px; HEIGHT: 19px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:120px;"   > <STRONG>1� Instru�ao</STRONG><STRONG>.:</STRONG>  </div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 312px; WIDTH: 316px; POSITION: absolute; TOP: 290px; HEIGHT: 88px">
<textarea id="Edit11" name="Edit11"  onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:87px;width:316px;"    tabindex="0"    wrap="virtual"><?=$Edit11;?></textarea>
</div>
<div id="Label13_outer" style="Z-INDEX: 27; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 384px; HEIGHT: 19px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:120px;"   > <STRONG>2� Instru�ao</STRONG><STRONG>.:</STRONG>  </div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 28; LEFT: 312px; WIDTH: 504px; POSITION: absolute; TOP: 378px; HEIGHT: 137px">
<textarea id="Edit12" name="Edit12"  onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:136px;width:504px;"    tabindex="0"    wrap="virtual"><?=$Edit12;?></textarea>
</div>

<div id="Label14_outer" style="Z-INDEX: 29; LEFT: 183px; WIDTH: 128px; POSITION: absolute; TOP: 520px; HEIGHT: 19px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:128px;"   > <STRONG>Ag�ncia</STRONG><STRONG>.:</STRONG>  </div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 30; LEFT: 312px; WIDTH: 73px; POSITION: absolute; TOP: 514px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>"  onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:73px;"  tabindex="0"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 31; LEFT: 386px; WIDTH: 128px; POSITION: absolute; TOP: 520px; HEIGHT: 19px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:128px;"   > <STRONG>Cod</STRONG><STRONG>. Cedente.:</STRONG>  </div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 32; LEFT: 515px; WIDTH: 56px; POSITION: absolute; TOP: 514px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>"  onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px;"  tabindex="0"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 33; LEFT: 572px; WIDTH: 12px; POSITION: absolute; TOP: 520px; HEIGHT: 19px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:12px;"   > <STRONG>.</STRONG> </div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 34; LEFT: 579px; WIDTH: 56px; POSITION: absolute; TOP: 514px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?=$Edit15;?>"  onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px;"  tabindex="0"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 35; LEFT: 636px; WIDTH: 12px; POSITION: absolute; TOP: 520px; HEIGHT: 19px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:12px;"   > <STRONG>.</STRONG> </div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 36; LEFT: 644px; WIDTH: 56px; POSITION: absolute; TOP: 514px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>"  onfocus="this.className='anormal'; nextfield ='Edit17';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px;"  tabindex="0"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 37; LEFT: 701px; WIDTH: 12px; POSITION: absolute; TOP: 520px; HEIGHT: 19px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:12px;"   > <STRONG>-</STRONG> </div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 38; LEFT: 709px; WIDTH: 24px; POSITION: absolute; TOP: 514px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$Edit17;?>"  onfocus="this.className='anormal'; nextfield ='Edit18';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:24px;"  tabindex="0"    />
</div>

<div id="Label19_outer" style="Z-INDEX: 37; LEFT: 735px; WIDTH: 12px; POSITION: absolute; TOP: 520px; HEIGHT: 19px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:12px;"   > <strong>Ativ</strong> </div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 38; LEFT: 767px; WIDTH: 24px; POSITION: absolute; TOP: 514px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?=$Edit18;?>"  onfocus="this.className='anormal'; nextfield ='Edit19';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:50px;"  tabindex="0"    />
</div>



</td></tr></table>
</body>
</html>