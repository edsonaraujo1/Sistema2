<?php
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Selecionar Maneira de Pesquisa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ASOC");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
	        exit();
}	

$Opcao     = addslashes(retirar_carac($_POST['Edit1']));
$Procura   = addslashes(trim(retirar_carac($_POST['Edit2'])));

// salva Secao
@session_start();
$_SESSION['Procura'] = Trim($Procura);
$_SESSION['Opcao']   = $Opcao;

$_SESSION['tipo_acao'] = 'alterar_1';

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or

die("
     <br>
     <br>

     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa

if ($Opcao == "MATRICULA"){
    
    $consulta  = "SELECT * FROM socios WHERE CODP = '". anti_sql_injection($Procura) ."' ORDER BY CODP";
}
if ($Opcao == "RG"){

    $consulta  = "SELECT * FROM socios WHERE RGASSOC = '". anti_sql_injection($Procura) ."' ORDER BY RGASSOC";
}
if ($Opcao == "CPF"){

    $consulta  = "SELECT * FROM socios WHERE CPF = '". anti_sql_injection($Procura) ."' ORDER BY CPF";
}
if ($Opcao == "NOME"){

    $consulta  = "SELECT * FROM socios WHERE NOMEASSOC Like '". anti_sql_injection($Procura) ."%' ORDER BY NOMEASSOC";
}
if ($Opcao == "ENDERECO"){

    $consulta  = "SELECT * FROM socios WHERE ENDRESID like '". anti_sql_injection($Procura) ."%' ORDER BY ENDRESID";
}

// Retorno o Resultado da Pesquisa

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Consulta !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php?Cod_xx=1'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");
     
$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id			= @$row["id"];
$Edit1		= @$row["COD"];
$new_fot    = @$row["CODP"];
$Edit2	    = @$row["NU"];
$Edit3      = @$row["RGASSOC"];
$Edit4  	= @$row["CPF"];
$Edit5  	= @$row["DATINSC"];
$Edit6		= @$row["DAT2"];
$Edit7		= @$row["DAT3"];
$Edit8		= @$row["SEDE"];
$Edit9		= @$row["CATEGORIA"];
$Edit10		= @$row["CODEDIF"];
$Edit11		= @$row["NOMEASSOC"];
$Edit12		= @$row["RUA"];
$Edit13 	= @$row["ENDRESID"];
$Edit14		= @$row["NUMERO"];
$Edit15		= @$row["BAIRRORES"];
$Edit16		= @$row["CEPRES"];
$Edit17		= @$row["CIDADERES"];
$Edit18		= @$row["ESTADORES"];
$Edit19		= @$row["TELEFONE"];
$Edit20		= @$row["CARTTRAB"];
$Edit21		= @$row["SERIE"];
$Edit22		= @$row["EMISCART"];
$Edit23		= @$row["CARGOASSOC"];
$Edit24		= @$row["DATADIMIS"];
$Edit25		= @$row["ESTCIVIL"];
$Edit26		= @$row["NUMDEP"];
$Edit27		= @$row["MES"];
$Edit28		= @$row["ANO"];
$Edit29		= @$row["CAD_SI"];
$Edit30		= @$row["SALDO"];
$Edit31		= @$row["PREST"];
$Edit32		= @$row["PAGO"];
$Edit33		= @$row["NATURAL1"];
$Edit34		= @$row["DATNASC"];
$Edit35		= @$row["NASCION"];
$Edit36		= @$row["PAI"];
$Edit37		= @$row["MAE"];
$Edit38		= @$row["CONJUGE"];
$Edit39		= @$row["DATCONJ"];
$Edit40		= @$row["FILHO01"];
$Edit41		= @$row["DAT01"];
$Edit42		= @$row["SEXO01"];
$Edit43		= @$row["FILHO02"];
$Edit44		= @$row["DAT02"];
$Edit45		= @$row["SEXO02"];
$Edit46		= @$row["FILHO03"];
$Edit47		= @$row["DAT03"];
$Edit48		= @$row["SEXO03"];
$Edit49		= @$row["FILHO04"];
$Edit50		= @$row["DAT04"];
$Edit51		= @$row["SEXO04"];
$Edit52		= @$row["FILHO05"];
$Edit53		= @$row["DAT05"];
$Edit54		= @$row["SEXO05"];
$Edit55		= @$row["FILHO06"];
$Edit56		= @$row["DAT06"];
$Edit57		= @$row["SEXO06"];
$Edit58		= @$row["FILHO07"];
$Edit59		= @$row["DAT07"];
$Edit60		= @$row["SEXO07"];
$Edit61		= @$row["FILHO08"];
$Edit62		= @$row["DAT08"];
$Edit63		= @$row["SEXO08"];
$Edit64 	= @$row["FILHO09"];
$Edit65		= @$row["DAT09"];
$Edit66		= @$row["SEXO09"];
$Edit67		= @$row["FILHO10"];
$Edit68		= @$row["DAT10"];
$Edit69		= @$row["SEXO10"];
$Edit70		= @$row["OBS"];
$Edit71		= @$row["SEXO_SOC"];
$Edit72		= @$row["ESCOLARIDADE"];

$soma1 = date('Y') - substr($Edit41,6,4);
if ($soma1 >= 18){ $cod_linha1  = 'color:#FF6347'; }else{ $cod_linha1  = 'color:#828282';}

$soma2 = date('Y') - substr($Edit44,6,4);
if ($soma2 >= 18){ $cod_linha2  = 'color:#FF6347'; }else{ $cod_linha2  = 'color:#828282';}

$soma3 = date('Y') - substr($Edit47,6,4);
if ($soma3 >= 18){ $cod_linha3  = 'color:#FF6347'; }else{ $cod_linha3  = 'color:#828282';}

$soma4 = date('Y') - substr($Edit50,6,4);
if ($soma4 >= 18){ $cod_linha4  = 'color:#FF6347'; }else{ $cod_linha4  = 'color:#828282';}
	
$soma5 = date('Y') - substr($Edit53,6,4);
if ($soma5 >= 18){ $cod_linha5  = 'color:#FF6347'; }else{ $cod_linha5  = 'color:#828282';}
	
$soma6 = date('Y') - substr($Edit56,6,4);
if ($soma6 >= 18){ $cod_linha6  = 'color:#FF6347'; }else{ $cod_linha6  = 'color:#828282';}
	
$soma7 = date('Y') - substr($Edit59,6,4);
if ($soma7 >= 18){ $cod_linha7  = 'color:#FF6347'; }else{ $cod_linha7  = 'color:#828282';}
	
$soma8 = date('Y') - substr($Edit62,6,4);
if ($soma8 >= 18){ $cod_linha8  = 'color:#FF6347'; }else{ $cod_linha8  = 'color:#828282';}
	
$soma9 = date('Y') - substr($Edit65,6,4);
if ($soma9 >= 18){ $cod_linha9  = 'color:#FF6347'; }else{ $cod_linha9  = 'color:#828282';}
	
$soma10 = date('Y') - substr($Edit68,6,4);
if ($soma10 >= 18){ $cod_linha10  = 'color:#FF6347'; }else{ $cod_linha10  = 'color:#828282';}

$nome_do_edif	= substr(@$row["CAMPO_EDIF"],0,47);
$categ_1	    = @$row["CAMPO_CATEG"];
$nome_cad_si	= @$row["CAMPO_SIT"];


If (!empty($id)){

		// Salva Secao
		@session_start();
		$_SESSION['navega'] = $id;
		
		// Abrir tabela Senha
		
		$tabela_1 = strtoupper('socios');
		
		$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";
		
		$resultado3 = @mysql_query($consulta3);
		
		$row3 = @mysql_fetch_array($resultado3);
		
		$per1       = @$row3["incluir"];
		$per2       = @$row3["alterar"];
		$per3       = @$row3["excluir"];
		$per4       = @$row3["imprimir"];
		
		// Abrir Table de Edificios
		
		$consulta4  = "SELECT * FROM edificios Where COD = '". anti_sql_injection($Edit10) ."'";
		
		$resultado4 = @mysql_query($consulta4);
		
		$row4 = @mysql_fetch_array($resultado4);
		
		$cod_edif   = @$row4["COD"];
		$cond  = trim(@$row4["COND"].@$row4["NOME"]);
		$edif  = trim(@$row4["NOME"]);
		
		//$nome_do_edif = $cond;
		
		// Abre Tabela Categoria
		
		$consulta5  = "SELECT * FROM categ Where CODIGO = '". anti_sql_injection($Edit9) ."'";
		
		$resultado5 = @mysql_query($consulta5);
		
		$row5 = @mysql_fetch_array($resultado5);
		
		//$categ_1   = @$row5["DESCRICAO"];
		
		
		$consulta7 = "SELECT * FROM tb_segunda WHERE codp = '". anti_sql_injection($new_fot) ."'";
			
		$resultado7 = @mysql_query($consulta7);
		
		$row7 = @mysql_fetch_array($resultado7);
		
		$id_9 	   = @$row7["cod_foto"];
		$id_imagem = @$row7["id_imagem"];
		
		if(!empty($id_imagem)){
		$mostra_branco = "faz";	
		}else{
		$mostra_branco = "nao";	
			
		}	
		
		// Abre Tabela Oposicao
		
		$consulta8  = "SELECT * FROM oposicao3 Where RGASSOC = '". anti_sql_injection($Edit3) ."'";
		
		$resultado8 = @mysql_query($consulta8);
		
		$row8 = @mysql_fetch_array($resultado8);
		
		$cod_opo = @$row8["COD"];
		$rg_opo  = @$row8["RGASSOC"];
		$cpf_opo = @$row8["CPF"];
		
		if (strlen(trim($rg_opo)) > 0){
			?>	
				<script LANGUAGE='JavaScript'>
				<!--
				alert("Socio com carta de OPOSIÇÃO !!!");
				//-->
				</script>
			<?php	
			
			}
		
		// Abre Tabela Oposicao
		
		$texto_cpf = $Edit4;
		$eliminar1 = str_replace("-"," ",$texto_cpf);
		$eliminar2 = str_replace("."," ",$eliminar1);
		$valor_cp = str_replace(" ","",$eliminar2);
		
		$consulta7  = "SELECT * FROM oposicao3 Where CPF = '". anti_sql_injection($valor_cp) ."'";
		
		$resultado7 = @mysql_query($consulta7);
		
		$row7 = @mysql_fetch_array($resultado7);
		
		
		$cod_opo = @$row7["COD"];
		$rg_opo  = @$row7["RGASSOC"];
		$cpf_opo = @$row7["CPF"];
		
		if (strlen(trim($cpf_opo)) > 0){
			?>	
				<script LANGUAGE='JavaScript'>
				<!--
				alert("Socio com carta de OPOSIÇÃO !!!");
				//-->
				</script>
			<?php	
			
			}
		
		// Informa se Socio esta com debito vencido
		
		$consulta7f  = "SELECT * FROM debito Where CODP = '". anti_sql_injection($new_fot) ."' ORDER BY str_to_date( VENCIMENTO, '%d/%m/%Y') ASC";
		
		$resultado7f = @mysql_query($consulta7f);
		
		$row7f = @mysql_fetch_array($resultado7f);
		
		$id_debito   = @$row7f["id"];
		$cod_debito  = @$row7f["CODP"];
		$val_debito  = @$row7f["VALOR"];
		$venc_debito = @$row7f["VENCIMENTO"];
		
		
		$data_a   = substr($venc_debito,0,2);
		$data_b   = substr($venc_debito,3,2);
		$data_c   = substr($venc_debito,6,4);
		
		$data_fim = $data_c."-".$data_b."-".$data_a; 
		
		
		//$new_date = date("d/m/Y", strtotime($venc_debito));
		
		if (!empty($id_debito)){
			if ($data_fim <= date('Y-m-d')){
				?>	
					<script LANGUAGE='JavaScript'>
					<!--
					alert("Socio com Debito Vencido VERIFIQUE !!!");
					//-->
					</script>
				<?php	
				
			}
		}
		
		
		
		// Atualiza Mensalidade
		
		$consulta8  = "SELECT * FROM aberto_soc WHERE CODP = '". anti_sql_injection($new_fot) ."'  ORDER BY ANO ASC, MES ASC";
		
		$resultado8 = @mysql_query($consulta8);
		
		while ($linha = @mysql_fetch_array($resultado8))
		{
		
		$mes_y = $linha["MES"];
		$ano_y = $linha["ANO"];
		
		}
		
		//echo $Edit27."/".$Edit28."<br>";
		//echo Trim($mes_y)."/".Trim($ano_y)."<br>";
		
		// Fim da Consulta
		if ($Edit28 <= $ano_y){
		
		//echo "entrei aqui";
		
		   $Edit27		= $mes_y;
		   $Edit28		= $ano_y;
		
		   $consulta9 = "UPDATE socios SET MES 		= '$Edit27',
		                                   ANO 		= '$Edit28' WHERE id = '". anti_sql_injection($id) ."'";
		
		}else{
			
		//$consulta9 = "UPDATE socios SET MES 		= '$mes_y',
		//                                ANO 		= '$ano_y' WHERE id = '$id'";
			
		}
		
		@mysql_query($consulta9, $link);
		
		
					// Atualiza arquivo Log
					$data_log = date("d/m/Y");
					$hora_log = date("H:i:s"); 
					$even_log = "CONSULTA/".$new_fot;
					
					$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
					             VALUES
					             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
					
					@mysql_query($consulta_log, $link);
		
		
		
		
		
		    ?>
		<html>
		<head>
		<title><?php echo $Titulo ?></title>
		<link rel="shortcut icon" href="../imagens/favicon.ico"/>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<style type="text/css" media="print">
		div.invisivel {
		visibility: hidden; 
		}
		</style>
		<script src="script.js"></script>
		</head>
		
		<style type=text/css>
		
		body { background-image: url(<?php echo "../".$logo_sis ?>);}
		
		<!--.cp {  font: bold 10px Arial; color: black}
		<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
		<!--.ld { font: bold 15px Arial; color: #000000}
		<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
		<!--.cn { FONT: 9px Arial; COLOR: black }
		<!--.bc { font: bold 22px Arial; color: #000000 }
		-->
		</style> 
		<body>
		
		<script language='javascript'>
		
		if (!document.layers)
		
		document.write('<div id="fixacam" style="position:absolute; background:#ffffff; bordercolordark:#4682B4; width:100px; height:50px; font:10pt Tahoma; color:#666666" align="Right">'  )
		
		</script>
		
		<layers id="fixacam"> 
		
			<a rel="home" class="home" href="javascript:janelaSecundaria('propostasocios.php?Cod_2=<?php echo $new_fot ?>')">
			<img alt="Proposta" src="../imagens/botaoazul18.PNG" border="0"/></a>
			
			<a rel="home" class="home" href="javascript:janelaSecundaria('soccarteira.php?Cod_2=<?php echo $new_fot ?>')">
			<img alt="Carteira" src="../imagens/botaoazul19.PNG" border="0"/></a>
		
			<a rel="home" class="home" href="../boletos/boletos_socios.php?cod_matr_1=<?php echo $new_fot ?>&cod_matr_2=<?php echo $new_fot ?>&cod_matr_3=<?php echo $new_fot ?>">
			<img alt="Carteira" src="../imagens/botaoazul39.PNG" border="0"/></a>
		
		<?php
		
		if (!empty($Acao)){
			// OK
		}else{
			$Acao = ""; 
		}
		
		?>
			<a rel="home" class="home" href="soclis_grid.php?Cod_2=<?php echo $id ?>">
			<img alt="lista" src="../imagens/botaoazul3.PNG" border="0"/></a>
		
		<?php
		if ($per3 == "SIM"){
		?>
		
			<a rel="home" class="home" href="socexcluir.php?Cod_3=<?php echo $id ?>">
			<img alt="Excluir" src="../imagens/botaoazul4.PNG" border="0"/></a>
		
		
		<?php
		}
		
		if ($per2 == "SIM"){
		?>
		
			<a rel="home" class="home" href="socalterar.php?Cod_2=<?php echo Trim($Edit1).Trim($Edit2) ?>">
			<img alt="Alterar" src="../imagens/botaoazul5.PNG" border="0"/></a>
		
		
		<?php
		}
		
		if ($per1 == "SIM"){
		?>
		
			<a rel="home" class="home" href="socincluir.php">
			<img alt="Incluir" src="../imagens/botaoazul6.PNG" border="0"/></a>
		
		
		<?php
		}
		?>
		
			<a rel="home" class="home" href="sociosconsulta.php">
			<img alt="Consultar" src="../imagens/botaoazul7.PNG" border="0"/></a>
			
			<a rel="home" class="home" href="sochistorico.php?Cod_2=<?php echo $id ?>">
			<img alt="Historico" src="../imagens/botaoazul37.PNG" border="0"/></a>
		
			<a rel="home" class="home" href="seg_tela.php?Cod_2=<?php echo $new_fot ?>">
			<img alt="Debitos" src="../imagens/botaoazul38.PNG" border="0"/></a>
			
			<a rel="home" class="home" href="aberto_soc.php?Cod_2=<?php echo $id ?>">
			<img alt="Mansalidade" src="../imagens/botaoazul28.PNG" border="0"/></a>
		
			<a rel="home" class="home" href="Javascript:Inicio(<?php echo $Edit1 ?>)">
			<img alt="Inicio" src="../imagens/botaobranco35.PNG" border="0"/></a>
		
			<a rel="home" class="home" href="Javascript:Anterior(<?php echo $id-1 ?>)">
			<img alt="Anterior" src="../imagens/botaoazul31.PNG" border="0"/></a>
		
			<a rel="home" class="home" href="Javascript:Proximo(<?php echo $id+1 ?>);">
			<img alt="Proximo" src="../imagens/botaoazul30.PNG" border="0"/></a>
		
			<a rel="home" class="home" href="Javascript:Fim(<?php echo $id ?>)">
			<img alt="Fim" src="../imagens/botaobranco36.PNG" border="0"/></a>
			
			<a rel="home" class="home" href="<?php echo $path ?>avaleht.php?servletjs2=20$$20">
			<img alt="Fechar" src="../imagens/botaoazul24.PNG" border="0"/></a>
		
		    <a rel="home" class="home" href="<?php echo $website ?>" align="center" target="new"><b>Web Site&nbsp;&nbsp;&nbsp;&nbsp;</b></a> 
		
		</layers>
		
		<script type="text/javascript">
		var posvertical="rodape"
		if (!document.layers)
		document.write('</div>')
		function menufloat(){
		var startX = 3,
		startY = 420; // antes era 67
		var ns = (navigator.appName.indexOf("Netscape") != -1);
		var d = document;
		function ml(id){
		var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
		if(d.layers)el.style=el;
		el.sP=function(x,y){this.style.left=x;this.style.top=y;};
		el.x = startX;
		if (posvertical=="rodape")
		el.y = startY;
		else{
		el.y = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
		el.y -= startY;
		}
		return el;
		}
		window.stayTopLeft=function(){
		if (posvertical=="topo"){
		var pY = ns ? pageYOffset : document.body.scrollTop;
		ftlObj.y += (pY + startY - ftlObj.y)/8;
		}
		else{
		var pY = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
		ftlObj.y += (pY - startY - ftlObj.y)/8;
		}
		ftlObj.sP(ftlObj.x, ftlObj.y);
		setTimeout("stayTopLeft()", 10);
		}
		ftlObj = ml("fixacam");
		stayTopLeft();
		}
		menufloat();
		</script>
			
			<?php
			// Resgata a Sessao
			session_start();
			$Procura = strtoupper($_SESSION['Procura']);
			$Opcao   = strtoupper($_SESSION['Opcao']);
			
		    include("help.php");
			
			include("soclayout.php")
			?>
		
		<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
		<div id="pagina" class="invisivel"></div></td></tr>
		</body>
			
			</html>
		
		    <?php

}else{
	
	?>	

	<html>
	<style type=text/css>
	
	body { background-image: url(<?php echo "../".$logo_sis ?>);}
	
	<!--.cp {  font: bold 10px Arial; color: black}
	<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
	<!--.ld { font: bold 15px Arial; color: #000000}
	<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
	<!--.cn { FONT: 9px Arial; COLOR: black }
	<!--.bc { font: bold 22px Arial; color: #000000 }
	--></style>
	
	<?php
	$menssagem = "* * * Não Encontrado * * *";

	include("sociosconsulta.php")
	?>
	
	<script LANGUAGE='JavaScript'>
	<!--
	alert("Registro não Encontrado !!!");
	//-->
	</script>
	</html>

	<?php	
}	

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = ereg_replace("[áàâãª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]",  " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace("\\",             " ",$var);
$var = str_replace(" or ",           " ",$var);
$var = str_replace("select ",        " ",$var);
$var = str_replace("delete ",        " ",$var);
$var = str_replace("create ",        " ",$var);
$var = str_replace("drop ",          " ",$var);
$var = str_replace("update ",        " ",$var);
$var = str_replace("drop table",     " ",$var);
$var = str_replace("show table",     " ",$var);
$var = str_replace("applet",         " ",$var);
$var = str_replace("objetc",         " ",$var);
$var = str_replace("where",          " ",$var);

return($var);
}

?>
