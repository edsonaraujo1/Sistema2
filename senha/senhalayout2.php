<?
/*
 ---------------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout2 Cadastro Senha
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ---------------------------------------------------------------
*/

include("funcoes2.php");
?>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 104px; WIDTH: 793px; POSITION: absolute; TOP: 44px; HEIGHT: 517px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 761 - 16, 485 - 16);
  Shape1_Canvas.fillRect(16, 16, 761 - 16 + 1, 485 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 761 - 16 + 1, 485 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 137px; WIDTH: 727px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 725 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 725 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 725 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 154px; WIDTH: 393px; POSITION: absolute; TOP: 86px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:393px;"   ><STRONG>Cadastro de&nbsp;Permissões</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 632px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 137px; WIDTH: 727px; POSITION: absolute; TOP: 133px; HEIGHT: 395px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 725 - 1, 393 - 1);
  Shape3_Canvas.fillRect(1, 1, 725 - 1 + 1, 393 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 725 - 1 + 1, 393 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 147px; WIDTH: 64px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Login.:</STRONG></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 6; LEFT: 147px; WIDTH: 89px; POSITION: absolute; TOP: 171px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Label12_outer" style="Z-INDEX: 7; LEFT: 147px; WIDTH: 89px; POSITION: absolute; TOP: 195px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Permição.:</STRONG>&nbsp;</div>
</div>
<div id="Label5_outer" style="Z-INDEX: 8; LEFT: 146px; WIDTH: 99px; POSITION: absolute; TOP: 217px; HEIGHT: 38px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:38px;width:99px;"   ><STRONG>Programas permitidos.:</STRONG>&nbsp;</div>
</div>

<?
if ($menssagens == "* * * Incluir * * *"){
	?>
	<div id="Edit1_outer" style="Z-INDEX: 28; LEFT: 254px; WIDTH: 165px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
	<input type="text" id="Edit1" name="Edit1" value="<?=$login;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:165px;" tabindex="1" maxlength="35"   />
	</div>
	<?
}else{
	?>
	<div id="Edit1_outer" style="Z-INDEX: 28; LEFT: 254px; WIDTH: 165px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
	<input type="text" id="Edit1" name="Edit1" value="<?=$login;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:165px;" readonly  tabindex="1" maxlength="10"   />
	</div>
	<?
}	
?>
<div id="Edit2_outer" style="Z-INDEX: 30; LEFT: 501px; WIDTH: 137px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$senha;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;"      tabindex="2"  maxlength="10"  />
</div>
<div id="Edit3_outer" style="Z-INDEX: 32; LEFT: 760px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$data;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;"  readonly  tabindex="3"  maxlength="10"  />
</div>
<div id="Edit4_outer" style="Z-INDEX: 27; LEFT: 254px; WIDTH: 303px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$nome;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:303px;"      tabindex="4"  maxlength="45"  />
</div>
<div id="Edit5_outer" style="Z-INDEX: 26; LEFT: 254px; WIDTH: 165px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$permissao;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:165px;"      tabindex="5"  maxlength="10"  />
</div>


<div id="Label7b_outer" style="Z-INDEX: 34; LEFT: 570px; WIDTH: 51px; POSITION: absolute; TOP: 171px; HEIGHT: 20px">
<div id="Label7b" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:51px;"   ><STRONG>Maquina.:</STRONG>&nbsp;</div>
</div>

<div id="Editb_outer" style="Z-INDEX: 33; LEFT: 650px; WIDTH: 203px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<input type="text" id="Edit89" name="Edit89" value="<?=$maquina;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:203px; background-color: #FFFFFF;" tabindex="6"    />
</div>

<div id="Edit6_outer" style="Z-INDEX: 33; LEFT: 501px; WIDTH: 55px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$permis2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:55px;"      tabindex="7"  />
</div>
<div id="Memo1_outer" style="Z-INDEX: 25; LEFT: 254px; WIDTH: 600px; POSITION: absolute; TOP: 216px; HEIGHT: 145px">
<textarea id="Memo1" name="Memo1" style=" font-family: Verdana; font-size: 14px;  height:145px;width:600px;"      tabindex="7"    wrap="virtual"><?=$programas;?></textarea>
</div>


<div id="Label3_outer" style="Z-INDEX: 29; LEFT: 437px; WIDTH: 66px; POSITION: absolute; TOP: 144px; HEIGHT: 16px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:16px;width:66px;"   ><STRONG>Senha.:</STRONG></div>
</div>
<div id="Label4_outer" style="Z-INDEX: 31; LEFT: 707px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Label7_outer" style="Z-INDEX: 34; LEFT: 448px; WIDTH: 51px; POSITION: absolute; TOP: 195px; HEIGHT: 20px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:51px;"   ><STRONG>Nivel.:</STRONG>&nbsp;</div>
</div>


<div id="EditA_outer" style="Z-INDEX: 33; LEFT: 650px; WIDTH: 203px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit88" name="Edit88" value="<?=$acesso;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:203px;"    tabindex="6"    />
</div>
<div id="Label7A_outer" style="Z-INDEX: 34; LEFT: 578px; WIDTH: 51px; POSITION: absolute; TOP: 195px; HEIGHT: 20px">
<div id="Label7A" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:51px;"   ><STRONG>Conta.:</STRONG>&nbsp;</div>
</div>


<div id="Label6_outer" style="Z-INDEX: 9; LEFT: 147px; WIDTH: 117px; POSITION: absolute; TOP: 390px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; background-color: #FFFFFF;height:26px;width:117px;"   > <STRONG>Horario:</STRONG> </div>
</div>
<div id="Label39_outer" style="Z-INDEX: 22; LEFT: 251px; WIDTH: 82px; POSITION: absolute; TOP: 366px; HEIGHT: 20px">
<div id="Label39" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:20px;width:82px;"  align="Center"   > <STRONG>Inicio</STRONG> </div>
</div>
<div id="Label9_outer" style="Z-INDEX: 27; LEFT: 329px; WIDTH: 33px; POSITION: absolute; TOP: 391px; HEIGHT: 18px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:18px;width:33px;"  align="Center"   > <STRONG>ate</STRONG> </div>
</div>
<div id="Label40_outer" style="Z-INDEX: 23; LEFT: 367px; WIDTH: 64px; POSITION: absolute; TOP: 367px; HEIGHT: 18px">
<div id="Label40" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:18px;width:64px;"  align="Center"   > <STRONG>Fim</STRONG> </div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 10; LEFT: 255px; WIDTH: 74px; POSITION: absolute; TOP: 386px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$hora1;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:74px;"  tabindex="0"    />
</div>
<div id="Edit8_outer" style="Z-INDEX: 11; LEFT: 362px; WIDTH: 74px; POSITION: absolute; TOP: 386px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$hora2;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:74px;"   tabindex="0"    />
</div>

<div id="Label8_outer" style="Z-INDEX: 24; LEFT: 451px; WIDTH: 117px; POSITION: absolute; TOP: 390px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; background-color: #FFFFFF;height:26px;width:117px;"   > <STRONG>Semana:</STRONG> </div>
</div>
<div id="Label29_outer" style="Z-INDEX: 26; LEFT: 576px; WIDTH: 208px; POSITION: absolute; TOP: 366px; HEIGHT: 20px">
<div id="Label29" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:20px;width:208px;"  align="Center"   > <STRONG>Dias da Semana</STRONG> </div>
</div>
<div id="Edit37_outer" style="Z-INDEX: 25; LEFT: 528px; WIDTH: 320px; POSITION: absolute; TOP: 386px; HEIGHT: 26px">
<input type="text" id="Edit37" name="Edit37" value="<?=$semana;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:320px;"   tabindex="0"    />
</div>

<div id="Label14_outer" style="Z-INDEX: 32; LEFT: 148px; WIDTH: 117px; POSITION: absolute; TOP: 415px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; background-color: #FFFFFF;height:26px;width:117px;"   > <STRONG>E-Mail:</STRONG> </div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 33; LEFT: 255px; WIDTH: 417px; POSITION: absolute; TOP: 411px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$email;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:417px;"  tabindex="0"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 34; LEFT: 675px; WIDTH: 45px; POSITION: absolute; TOP: 414px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; background-color: #FFFFFF;height:26px;width:45px;"   > <STRONG>Tipo:</STRONG> </div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 35; LEFT: 720px; WIDTH: 128px; POSITION: absolute; TOP: 411px; HEIGHT: 26px">
<select type="text" id="Edit12" name="Edit12" value="<?=$tipo;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:128px;"  tabindex="0"    />


<option value="<?=$tipo;?>"> <?=$tipo;?> </option>
<option value="ADMINISTRADOR">  ADMINISTRADOR  </option>
<option value="USUARIO">        USUARIO        </option>
<option value="DIRETORIA">      DIRETORIA      </option>
<option value="PROGRAMADOR">    PROGRAMADOR    </option>
<option value="OP. CAIXA">      OP. CAIXA      </option>

</select>
</div>


</td></tr></table>
</body>
</html>