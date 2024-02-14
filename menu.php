<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Index do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

// Resgata a Sessao
@session_start();

$website	= $_SESSION['website'];
$cpfwebsite = $_SESSION['cpfwebsite'];
$atuali_za  = $_SESSION['atuali_za'];
$criado_za  = $_SESSION['criado_za'];
$logo_sis   = $_SESSION['logo_sis'];
$Titulo     = $_SESSION['Titulo'];
$cnpj_sis   = $_SESSION['cnpj_sis'];
$logo1_sis  = $_SESSION['logo1_sis'];
$logo2_sis  = $_SESSION['logo2_sis'];
$color_bor  = $_SESSION['color_bor'];
$versao_1   = $_SESSION['versao_1'];
$color_menu = $_SESSION['color_menu'];

$_SESSION["servletjs2"] = '20$$20';

// Resgata a Sessao
@session_start();
unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);
unset ($_SESSION['Edit3']);
unset ($_SESSION['Edit4']);
unset ($_SESSION['Edit5']);
unset ($_SESSION['Edit6']);
unset ($_SESSION['Edit7']);
unset ($_SESSION['Edit8']);
unset ($_SESSION['Edit9']);
unset ($_SESSION['Edit10']);
unset ($_SESSION['Edit11']);
unset ($_SESSION['Edit12']);
unset ($_SESSION['Edit13']);
unset ($_SESSION['Edit14']);
unset ($_SESSION['Edit15']);
unset ($_SESSION['Edit16']);
unset ($_SESSION['nurecno']);
unset ($_SESSION['Codigo_ed']);
unset ($_SESSION['Nome_ed']);
unset ($_SESSION['cnpj']);
unset ($_SESSION['comp_nome']);
unset ($_SESSION['nome_1']);
unset ($_SESSION['comp_end']);
unset ($_SESSION['endereco_1']); 
unset ($_SESSION['numero_1']); 
unset ($_SESSION['cep_1']);
unset ($_SESSION['bairro_1']);
unset ($_SESSION['cidade_1']);
unset ($_SESSION['uf_1']);
unset ($_SESSION['Procura']);
unset ($_SESSION['Opcao']);

unset ($_SESSION['Edit1e']);
unset ($_SESSION['Edit2e']);
unset ($_SESSION['Edit3e']);
unset ($_SESSION['Edit4e']);
unset ($_SESSION['Edit5e']);
unset ($_SESSION['Edit6e']);
unset ($_SESSION['Edit7e']);
unset ($_SESSION['navega']);
unset ($_SESSION['empr']);
$_SESSION['empr'] = 0;
unset ($_SESSION['cod_incl']);
 
$path = strtoupper($_SESSION['Path1']);

$nome3 = addslashes($_SESSION["nome_log"]);

include ("funcoes2.php");

// $color_menu
?>

<script language="JavaScript">

function janelaSecundaria(){ 
   window.open("calc.php", "nome", "width=260,height=390,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaCronos(){ 
   window.open("tempo_x2.php", "nome", "width=388,height=205,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelabatpapo(){ 
   window.open("batepapo/batepapo.php", "nome", "width=750,height=405,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function Download()
{
	
	<?php
	$deixar_1 = acesso("RECEB_CAIXA");

       if ($deixar_1 != "SIM"){
       	   ?>
       	   
	         alert("Usuário não Permitido");
       	   
       	   <?php
            
	   }else{

           ?>

	       window.location = "modulo/caixa.exe";

           <?php		
		
	   }
	 ?>
	     
}

function Download1()
{
	
	<?php
	$deixar_1 = acesso("RECEITA_CAIX");

       if ($deixar_1 != "SIM"){
       	   ?>
       	   
	         alert("Usuário não Permitido");
       	   
       	   <?php
            
	   }else{

           ?>
	
	        window.location = "modulo/receita.exe";     
	
           <?php		
		
	   }
	 ?>
}

</script>


<script language="JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
 var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
   if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function mmLoadMenus() {
  if (window.mm_menu_0826164233_0) return;
    window.mm_menu_0826164233_0_1 = new Menu("Cadastro&nbsp;de&nbsp;Adms/Contabilidade",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_1.addMenuItem("Consultar","window.open('adms/consulta.php', '_self');");
    mm_menu_0826164233_0_1.addMenuItem("Incluir","window.open('adms/incluir.php', '_self');");
     mm_menu_0826164233_0_1.fontWeight="bold";
     mm_menu_0826164233_0_1.hideOnMouseOut=true;
     mm_menu_0826164233_0_1.menuBorder=1;
     mm_menu_0826164233_0_1.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_1.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_1.bgColor='#666666';
    window.mm_menu_0826164233_0_2 = new Menu("Cadastro&nbsp;de&nbsp;Associados",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_2.addMenuItem("Consultar","window.open('socios/sociosconsulta.php', '_self');");
    mm_menu_0826164233_0_2.addMenuItem("Incluir","window.open('socios/socincluir.php', '_self');");
     mm_menu_0826164233_0_2.fontWeight="bold";
     mm_menu_0826164233_0_2.hideOnMouseOut=true;
     mm_menu_0826164233_0_2.menuBorder=1;
     mm_menu_0826164233_0_2.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_2.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_2.bgColor='#666666';
    window.mm_menu_0826164233_0_3 = new Menu("Cadastro&nbsp;de&nbsp;Empresas",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_3.addMenuItem("Consultar","window.open('edif/consulta.php', '_self');");
    mm_menu_0826164233_0_3.addMenuItem("Incluir","window.open('edif/incluir.php', '_self');");
     mm_menu_0826164233_0_3.fontWeight="bold";
     mm_menu_0826164233_0_3.hideOnMouseOut=true;
     mm_menu_0826164233_0_3.menuBorder=1;
     mm_menu_0826164233_0_3.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_3.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_3.bgColor='#666666';
    window.mm_menu_0826164233_0_4 = new Menu("Cadastro&nbsp;Cursos",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_4.addMenuItem("Consultar","window.open('cursos/consulta.php', '_self');");
    mm_menu_0826164233_0_4.addMenuItem("Incluir","window.open('cursos/incluir.php', '_self');");
     mm_menu_0826164233_0_4.fontWeight="bold";
     mm_menu_0826164233_0_4.hideOnMouseOut=true;
     mm_menu_0826164233_0_4.menuBorder=1;
     mm_menu_0826164233_0_4.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_4.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_4.bgColor='#666666';
    window.mm_menu_0826164233_0_5 = new Menu("Cadastro&nbsp;Carta&nbsp;de&nbsp;Oposi&ccedil;&atilde;o",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_5.addMenuItem("Consultar","window.open('oposicao/consulta.php', '_self');");
    mm_menu_0826164233_0_5.addMenuItem("Incluir","window.open('oposicao/incluir.php', '_self');");
     mm_menu_0826164233_0_5.fontWeight="bold";
     mm_menu_0826164233_0_5.hideOnMouseOut=true;
     mm_menu_0826164233_0_5.menuBorder=1;
     mm_menu_0826164233_0_5.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_5.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_5.bgColor='#666666';
    window.mm_menu_0826164233_0_6 = new Menu("Cadastro&nbsp;de&nbsp;Vagas",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_6.addMenuItem("Consultar","window.open('vagas/consulta.php', '_self');");
    mm_menu_0826164233_0_6.addMenuItem("Incluir","window.open('vagas/incluir.php', '_self');");
     mm_menu_0826164233_0_6.fontWeight="bold";
     mm_menu_0826164233_0_6.hideOnMouseOut=true;
     mm_menu_0826164233_0_6.menuBorder=1;
     mm_menu_0826164233_0_6.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_6.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_6.bgColor='#666666';
    window.mm_menu_0826164233_0_7 = new Menu("Cadastro&nbsp;Etiquetas&nbsp;Federa&ccedil;&atilde;o",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_7.addMenuItem("Consultar","window.open('fenatec/fenaconsulta.php', '_self');");
    mm_menu_0826164233_0_7.addMenuItem("Incluir","window.open('fenatec/fenaincluir.php', '_self');");
     mm_menu_0826164233_0_7.fontWeight="bold";
     mm_menu_0826164233_0_7.hideOnMouseOut=true;
     mm_menu_0826164233_0_7.menuBorder=1;
     mm_menu_0826164233_0_7.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_7.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_7.bgColor='#666666';
    window.mm_menu_0826164233_0_8 = new Menu("Listagem&nbsp;Socios&nbsp;Grupo&nbsp;de&nbsp;Rua&nbsp;&nbsp;&nbsp;&nbsp;",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_8.addMenuItem("Consultar","window.open('grupo_rua/consulta.php', '_self');");
    mm_menu_0826164233_0_8.addMenuItem("Incluir","window.open('grupo_rua/incluir.php', '_self');");
     mm_menu_0826164233_0_8.fontWeight="bold";
     mm_menu_0826164233_0_8.hideOnMouseOut=true;
     mm_menu_0826164233_0_8.menuBorder=1;
     mm_menu_0826164233_0_8.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_8.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_8.bgColor='#666666';
    window.mm_menu_0826164233_0_9 = new Menu("Bairros&nbsp;Grupo&nbsp;de&nbsp;Rua",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_9.addMenuItem("Consultar","window.open('grup_bairro/consulta.php', '_self');");
    mm_menu_0826164233_0_9.addMenuItem("Incluir","window.open('grup_bairro/incluir.php', '_self');");
     mm_menu_0826164233_0_9.fontWeight="bold";
     mm_menu_0826164233_0_9.hideOnMouseOut=true;
     mm_menu_0826164233_0_9.menuBorder=1;
     mm_menu_0826164233_0_9.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_9.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_9.bgColor='#666666';
    window.mm_menu_0826164233_0_10 = new Menu("Atendimento&nbsp;ao&nbsp;Socio",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_10.addMenuItem("Consultar","window.open('lorival/consulta.php', '_self');");
    mm_menu_0826164233_0_10.addMenuItem("Incluir","window.open('lorival/incluir.php', '_self');");
     mm_menu_0826164233_0_10.fontWeight="bold";
     mm_menu_0826164233_0_10.hideOnMouseOut=true;
     mm_menu_0826164233_0_10.menuBorder=1;
     mm_menu_0826164233_0_10.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_10.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_10.bgColor='#666666';
    window.mm_menu_0826164233_0_11 = new Menu("Lista&nbsp;Empregados&nbsp;Sindical",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_11.addMenuItem("Consultar","window.open('lista_socios/consulta.php', '_self');");
    mm_menu_0826164233_0_11.addMenuItem("Incluir","window.open('lista_socios/incluir.php', '_self');");
     mm_menu_0826164233_0_11.fontWeight="bold";
     mm_menu_0826164233_0_11.hideOnMouseOut=true;
     mm_menu_0826164233_0_11.menuBorder=1;
     mm_menu_0826164233_0_11.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_11.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_11.bgColor='#666666';
    window.mm_menu_0826164233_0_12 = new Menu("Cadastro&nbsp;de&nbsp;Aposentados",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_12.addMenuItem("Consultar","window.open('aposentados/consulta.php', '_self');");
    mm_menu_0826164233_0_12.addMenuItem("Incluir","window.open('aposentados/incluir.php', '_self');");
     mm_menu_0826164233_0_12.fontWeight="bold";
     mm_menu_0826164233_0_12.hideOnMouseOut=true;
     mm_menu_0826164233_0_12.menuBorder=1;
     mm_menu_0826164233_0_12.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_12.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_12.bgColor='#666666';
    window.mm_menu_0826164233_0_13 = new Menu("Cadastro&nbsp;Clube&nbsp;Tiete",74,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_0_13.addMenuItem("Consultar","window.open('clube/consulta.php', '_self');");
    mm_menu_0826164233_0_13.addMenuItem("Incluir","window.open('clube/incluir.php', '_self');");
     mm_menu_0826164233_0_13.fontWeight="bold";
     mm_menu_0826164233_0_13.hideOnMouseOut=true;
     mm_menu_0826164233_0_13.menuBorder=1;
     mm_menu_0826164233_0_13.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_0_13.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_0_13.bgColor='#666666';
  window.mm_menu_0826164233_0 = new Menu("root",228,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_1,"window.open('adms/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_2,"window.open('socios/cadsocios.php', '_self');");
  mm_menu_0826164233_0.addMenuItem("Cadastro&nbsp;de&nbsp;Categoria","window.open('categoria/grid.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_3,"window.open('edif/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_4,"window.open('cursos/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_5,"window.open('oposicao/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_6,"window.open('vagas/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_7,"window.open('fenatec/cadfenatec.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_8,"window.open('grupo_rua/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_9,"window.open('grup_bairro/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem("Consulta&nbsp;CNPJ&nbsp;para&nbsp;Cadastro","window.open('cnpj_cpf/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_10,"window.open('lorival/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_11,"window.open('lista_socios/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_12,"window.open('aposentados/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem(mm_menu_0826164233_0_13,"window.open('clube/cadastro.php', '_self');");
  mm_menu_0826164233_0.addMenuItem("Trocar&nbsp;Usuario","window.open('login2.php', '_self');");
  mm_menu_0826164233_0.addMenuItem("Sair","window.open('sair.php', '_self');");
   mm_menu_0826164233_0.fontWeight="bold";
   mm_menu_0826164233_0.hideOnMouseOut=true;
   mm_menu_0826164233_0.childMenuIcon="imagens/arrows.gif";
   mm_menu_0826164233_0.menuBorder=1;
   mm_menu_0826164233_0.menuLiteBgColor='#ffffff';
   mm_menu_0826164233_0.menuBorderBgColor='#6699cc';
   mm_menu_0826164233_0.bgColor='#666666';
  window.mm_menu_0826164233_1 = new Menu("root",241,21,"Times New Roman, Times, serif",15,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0826164233_1.addMenuItem("Instru&ccedil;&atilde;o&nbsp;de&nbsp;Cobran&ccedil;a","window.open('instrucao/cadinstrucao.php', '_self');");
  mm_menu_0826164233_1.addMenuItem("Gerador&nbsp;de&nbsp;Contribui&ccedil;&otilde;es","window.open('boletos/confederativa_adms1.php', '_self');");
  mm_menu_0826164233_1.addMenuItem("Impress&atilde;o&nbsp;de&nbsp;Contribui&ccedil;&atilde;o","window.open('boletos/confederativa_adms2.php', '_self');");
  mm_menu_0826164233_1.addMenuItem("Baixa&nbsp;Manual&nbsp;Mensalidades","window.open('mensalidades/mostra_grid.php', '_self');");
  mm_menu_0826164233_1.addMenuItem("Manuten&ccedil;&atilde;o&nbsp;Contribui&ccedil;&otilde;es","window.open('contribuicoes/mostra_grid.php', '_self');");
  mm_menu_0826164233_1.addMenuItem("Gerador&nbsp;de&nbsp;Boletos&nbsp;Socios","window.open('boletos/boletos_socios.php', '_self');");
  mm_menu_0826164233_1.addMenuItem("Relat&oacute;rio&nbsp;Contribui&ccedil;&otilde;es&nbsp;Pagas","window.open('rel_conf/rel_frm.php', '_self');");
  mm_menu_0826164233_1.addMenuItem("Relat&oacute;rio&nbsp;Contribui&ccedil;&otilde;es&nbsp;em&nbsp;Aberto","window.open('rel_sind/rel_frm.php', '_self');");
  mm_menu_0826164233_1.addMenuItem("Tratar&nbsp;Arquivo&nbsp;Retorno&nbsp;(Banco)","window.open('retorno_bb/baixa_retorno1.php', '_self');");
  mm_menu_0826164233_1.addMenuItem("Testa&nbsp;Codigo&nbsp;de&nbsp;Barras","window.open('barras/codigo_barras.php', '_self');");
  mm_menu_0826164233_1.addMenuItem("Enviar&nbsp;Guias&nbsp;por&nbsp;E-Mail","window.open('conf_email/enviar_email.php', '_self');");
   mm_menu_0826164233_1.fontWeight="bold";
   mm_menu_0826164233_1.hideOnMouseOut=true;
   mm_menu_0826164233_1.menuBorder=1;
   mm_menu_0826164233_1.menuLiteBgColor='#ffffff';
   mm_menu_0826164233_1.menuBorderBgColor='#6699cc';
   mm_menu_0826164233_1.bgColor='#666666';
    window.mm_menu_0826164233_2_1 = new Menu("Impress&atilde;o&nbsp;de&nbsp;Etiquetas",188,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_2_1.addMenuItem("Etiquetas&nbsp;Associados","window.open('etiquetas/etiquetas_1.php', '_self');");
    mm_menu_0826164233_2_1.addMenuItem("Etiquetas&nbsp;Adm/Contabilidade","window.open('etiquetas/etiquetas_2.php', '_self');");
    mm_menu_0826164233_2_1.addMenuItem("Etiquetas&nbsp;Empresas","window.open('etiquetas/etiquetas_3.php', '_self');");
    mm_menu_0826164233_2_1.addMenuItem("Etiquetas&nbsp;Avulsas","window.open('etiquetas/etiquetas_4.php', '_self');");
     mm_menu_0826164233_2_1.fontWeight="bold";
     mm_menu_0826164233_2_1.hideOnMouseOut=true;
     mm_menu_0826164233_2_1.menuBorder=1;
     mm_menu_0826164233_2_1.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_2_1.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_2_1.bgColor='#666666';
    window.mm_menu_0826164233_2_2 = new Menu("Emiss&atilde;o&nbsp;de&nbsp;Cracha",71,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_2_2.addMenuItem("Consultar","window.open('cracha/consulta.php', '_self');");
    mm_menu_0826164233_2_2.addMenuItem("Incluir","window.open('cracha/incluir.php', '_self');");
     mm_menu_0826164233_2_2.fontWeight="bold";
     mm_menu_0826164233_2_2.hideOnMouseOut=true;
     mm_menu_0826164233_2_2.menuBorder=1;
     mm_menu_0826164233_2_2.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_2_2.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_2_2.bgColor='#666666';
  window.mm_menu_0826164233_2 = new Menu("root",293,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Empresas","window.open('relatorio_edif.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Associados","window.open('relatorio_socios.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Listagem&nbsp;de&nbsp;Adms/Contabilidade","window.open('relatorio_adms.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Rela&ccedil;&atilde;o&nbsp;de&nbsp;Empregados","window.open('rel_conj/rel_frm.php', '_self');");
  mm_menu_0826164233_2.addMenuItem(mm_menu_0826164233_2_1);
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Baixas&nbsp;Sindical","window.open('sindical/rel_frm.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Baixas&nbsp;Conf./Assist.","window.open('conf/rel_frm.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Baixas&nbsp;Mensalidades","window.open('mensalidades/rel_frm.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Carta&nbsp;de&nbsp;Oposi&ccedil;&atilde;o","window.open('oposicao/rel_frm.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;E-Mails&nbsp;Enviados&nbsp;Empre./Contab.","window.open('ts.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Guias&nbsp;Emitidas&nbsp;no&nbsp;Ano","window.open('ts.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Movimento&nbsp;de&nbsp;Caixa","window.open('ts.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;Socio&nbsp;do&nbsp;Dia","window.open('soc_dia/rel_frm.php', '_self');");
  mm_menu_0826164233_2.addMenuItem("Relat&oacute;rio&nbsp;Carne&nbsp;Emitidos&nbsp;Socios","window.open('soc_bole_dia/rel_frm.php', '_self');");
  mm_menu_0826164233_2.addMenuItem(mm_menu_0826164233_2_2,"window.open('cracha/cadastro.php', '_self');");
   mm_menu_0826164233_2.fontWeight="bold";
   mm_menu_0826164233_2.hideOnMouseOut=true;
   mm_menu_0826164233_2.childMenuIcon="imagens/arrows.gif";
   mm_menu_0826164233_2.menuBorder=1;
   mm_menu_0826164233_2.menuLiteBgColor='#ffffff';
   mm_menu_0826164233_2.menuBorderBgColor='#6699cc';
   mm_menu_0826164233_2.bgColor='#666666';
  window.mm_menu_0826164233_3 = new Menu("root",286,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0826164233_3.addMenuItem("Atendimento&nbsp;Odontologico","window.open('odontologico/cadastro.php', '_self');");
  mm_menu_0826164233_3.addMenuItem("Cadastro&nbsp;de&nbsp;M&eacute;dicos/Dentistas","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_3.addMenuItem("Agendamento&nbsp;M&eacute;dico/Odontologico","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_3.addMenuItem("Cadastro&nbsp;de&nbsp;Estq.&nbsp;M&eacute;dicamento","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_3.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Estat.&nbsp;Mensal","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_3.addMenuItem("Estatistica&nbsp;de&nbsp;Uso&nbsp;dos&nbsp;Servi&ccedil;os&nbsp;Odontologicos","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_3.addMenuItem("Estatistica&nbsp;de&nbsp;Uso&nbsp;dos&nbsp;Servi&ccedil;os&nbsp;Medicos","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_3.addMenuItem("Atendimento&nbsp;Medico","window.open('saude/cadastro.php', '_self');");
   mm_menu_0826164233_3.fontWeight="bold";
   mm_menu_0826164233_3.hideOnMouseOut=true;
   mm_menu_0826164233_3.menuBorder=1;
   mm_menu_0826164233_3.menuLiteBgColor='#ffffff';
   mm_menu_0826164233_3.menuBorderBgColor='#6699cc';
   mm_menu_0826164233_3.bgColor='#666666';
    window.mm_menu_0826164233_4_1 = new Menu("Relat&oacute;rio&nbsp;de&nbsp;Caixa&nbsp;&nbsp;&nbsp;",115,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_4_1.addMenuItem("Relat&oacute;rio&nbsp;Mensal","window.open('modelo/cadastro.php', '_self');");
    mm_menu_0826164233_4_1.addMenuItem("Relat&oacute;rio&nbsp;Anual","window.open('modelo/cadastro.php', '_self');");
    mm_menu_0826164233_4_1.addMenuItem("Relat&oacute;eio&nbsp;do&nbsp;Dia","window.open('modelo/cadastro.php', '_self');");
     mm_menu_0826164233_4_1.fontWeight="bold";
     mm_menu_0826164233_4_1.hideOnMouseOut=true;
     mm_menu_0826164233_4_1.menuBorder=1;
     mm_menu_0826164233_4_1.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_4_1.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_4_1.bgColor='#666666';
    window.mm_menu_0826164233_4_2 = new Menu("Listagem&nbsp;de&nbsp;Planilha&nbsp;de&nbsp;Caixa&nbsp;&nbsp;&nbsp;&nbsp;",135,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_4_2.addMenuItem("Relat&oacute;rio&nbsp;Geral","window.open('modelo/cadastro.php', '_self');");
    mm_menu_0826164233_4_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Credito","window.open('modelo/cadastro.php', '_self');");
    mm_menu_0826164233_4_2.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Debito","window.open('modelo/cadastro.php', '_self');");
     mm_menu_0826164233_4_2.fontWeight="bold";
     mm_menu_0826164233_4_2.hideOnMouseOut=true;
     mm_menu_0826164233_4_2.menuBorder=1;
     mm_menu_0826164233_4_2.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_4_2.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_4_2.bgColor='#666666';
    window.mm_menu_0826164233_4_3 = new Menu("Cadastro&nbsp;de&nbsp;Estoque",151,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_4_3.addMenuItem("Cadastro&nbsp;dos&nbsp;Itens","window.open('estoque/cadastro.php', '_self');");
    mm_menu_0826164233_4_3.addMenuItem("Cadastro&nbsp;Fornecedores","window.open('fornecedor/grid.php', '_self');");
    mm_menu_0826164233_4_3.addMenuItem("Cadastro&nbsp;de&nbsp;Classes","window.open('classe/grid.php', '_self');");
     mm_menu_0826164233_4_3.fontWeight="bold";
     mm_menu_0826164233_4_3.hideOnMouseOut=true;
     mm_menu_0826164233_4_3.menuBorder=1;
     mm_menu_0826164233_4_3.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_4_3.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_4_3.bgColor='#666666';
  window.mm_menu_0826164233_4 = new Menu("root",212,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0826164233_4.addMenuItem("Cadastro&nbsp;de&nbsp;Codigos&nbsp;Caixa","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Cadastro&nbsp;de&nbsp;Caixa","window.open('caixa/mostra_grid.php', '_self');");
  mm_menu_0826164233_4.addMenuItem(mm_menu_0826164233_4_1,"window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Recebimentos&nbsp;Caixa","window.open('javascript:Download();', '_self');");
  mm_menu_0826164233_4.addMenuItem("Receita","window.open('receita/rel_pdf.php', '_blank');");
  mm_menu_0826164233_4.addMenuItem("Cadastro&nbsp;de&nbsp;Cheques","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Cheques","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Cadastro&nbsp;de&nbsp;Despesas","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Despesas","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Planilha&nbsp;de&nbsp;Caixa","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem(mm_menu_0826164233_4_2,"window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Cadastro&nbsp;de&nbsp;Historico","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Cadastro&nbsp;de&nbsp;Depositos","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Relat&oacute;rio&nbsp;de&nbsp;Depositos","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Recebimentos&nbsp;Di&aacute;rios","window.open('recebimentos/cadastro.php', '_self');");
  mm_menu_0826164233_4.addMenuItem("Impress&atilde;o&nbsp;de&nbsp;DARF","window.open('darf/darf.php', '_self');");
  mm_menu_0826164233_4.addMenuItem(mm_menu_0826164233_4_3);
   mm_menu_0826164233_4.fontWeight="bold";
   mm_menu_0826164233_4.hideOnMouseOut=true;
   mm_menu_0826164233_4.childMenuIcon="imagens/arrows.gif";
   mm_menu_0826164233_4.menuBorder=1;
   mm_menu_0826164233_4.menuLiteBgColor='#ffffff';
   mm_menu_0826164233_4.menuBorderBgColor='#6699cc';
   mm_menu_0826164233_4.bgColor='#666666';
    window.mm_menu_0826164233_5_1 = new Menu("Cadastro&nbsp;de&nbsp;Advogados(as)",71,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-243,19,true,true,true,0,true,true);
    mm_menu_0826164233_5_1.addMenuItem("Consultar","window.open('advogado/consulta.php', '_self');");
    mm_menu_0826164233_5_1.addMenuItem("Incluir","window.open('advogado/incluir.php', '_self');");
     mm_menu_0826164233_5_1.fontWeight="bold";
     mm_menu_0826164233_5_1.hideOnMouseOut=true;
     mm_menu_0826164233_5_1.menuBorder=1;
     mm_menu_0826164233_5_1.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_5_1.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_5_1.bgColor='#666666';
    window.mm_menu_0826164233_5_2 = new Menu("Cadastro&nbsp;de&nbsp;Acompanhamento&nbsp;&nbsp;",71,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-243,19,true,true,true,0,true,true);
    mm_menu_0826164233_5_2.addMenuItem("Consultar","window.open('acompanha/consulta.php', '_self');");
    mm_menu_0826164233_5_2.addMenuItem("Incluir","window.open('acompanha/incluir.php', '_self');");
     mm_menu_0826164233_5_2.fontWeight="bold";
     mm_menu_0826164233_5_2.hideOnMouseOut=true;
     mm_menu_0826164233_5_2.menuBorder=1;
     mm_menu_0826164233_5_2.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_5_2.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_5_2.bgColor='#666666';
  window.mm_menu_0826164233_5 = new Menu("root",206,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-243,19,true,true,true,0,true,true);
  mm_menu_0826164233_5.addMenuItem(mm_menu_0826164233_5_1,"window.open('advogado/cadastro.php', '_self');");
  mm_menu_0826164233_5.addMenuItem(mm_menu_0826164233_5_2,"window.open('acompanha/cadastro.php', '_self');");
  mm_menu_0826164233_5.addMenuItem("Protocolo&nbsp;de&nbsp;Assembleia","window.open('protocolo/cadastro.php', '_self');");
  mm_menu_0826164233_5.addMenuItem("Cadastro&nbsp;de&nbsp;Pisos","window.open('modelo/cadastro.php', '_self');");
   mm_menu_0826164233_5.fontWeight="bold";
   mm_menu_0826164233_5.hideOnMouseOut=true;
   mm_menu_0826164233_5.childMenuIcon="imagens/arrows.gif";
   mm_menu_0826164233_5.menuBorder=1;
   mm_menu_0826164233_5.menuLiteBgColor='#ffffff';
   mm_menu_0826164233_5.menuBorderBgColor='#6699cc';
   mm_menu_0826164233_5.bgColor='#666666';
    window.mm_menu_0826164233_6_1 = new Menu("Links",133,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-243,19,true,true,true,0,true,true);
    mm_menu_0826164233_6_1.addMenuItem("Juridico","window.open('jornal/form10.php', '_self');");
    mm_menu_0826164233_6_1.addMenuItem("Saude","window.open('jornal/form11.php', '_self');");
    mm_menu_0826164233_6_1.addMenuItem("Odontologico","window.open('jornal/form12.php', '_self');");
    mm_menu_0826164233_6_1.addMenuItem("Servicos","window.open('jornal/form13.php', '_self');");
    mm_menu_0826164233_6_1.addMenuItem("Cursos","window.open('jornal/form14.php', '_self');");
    mm_menu_0826164233_6_1.addMenuItem("Lazer","window.open('jornal/form15.php', '_self');");
    mm_menu_0826164233_6_1.addMenuItem("Subsedes","window.open('jornal/form16.php', '_self');");
    mm_menu_0826164233_6_1.addMenuItem("Filie-se&nbsp;ao&nbsp;Sindicato","window.open('jornal/form17.php', '_self');");
     mm_menu_0826164233_6_1.fontWeight="bold";
     mm_menu_0826164233_6_1.hideOnMouseOut=true;
     mm_menu_0826164233_6_1.menuBorder=1;
     mm_menu_0826164233_6_1.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_6_1.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_6_1.bgColor='#666666';
    window.mm_menu_0826164233_6_2 = new Menu("Noticias",71,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-243,19,true,true,true,0,true,true);
    mm_menu_0826164233_6_2.addMenuItem("Incluir","window.open('jornal/incluir.php', '_self');");
    mm_menu_0826164233_6_2.addMenuItem("Consultar","window.open('jornal/consulta.php', '_self');");
     mm_menu_0826164233_6_2.fontWeight="bold";
     mm_menu_0826164233_6_2.hideOnMouseOut=true;
     mm_menu_0826164233_6_2.menuBorder=1;
     mm_menu_0826164233_6_2.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_6_2.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_6_2.bgColor='#666666';
    window.mm_menu_0826164233_6_3 = new Menu("Cadastro&nbsp;de&nbsp;E-mails",71,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-243,19,true,true,true,0,true,true);
    mm_menu_0826164233_6_3.addMenuItem("Incluir","window.open('emails/incluir.php', '_self');");
    mm_menu_0826164233_6_3.addMenuItem("Consultar","window.open('emails/consulta.php', '_self');");
     mm_menu_0826164233_6_3.fontWeight="bold";
     mm_menu_0826164233_6_3.hideOnMouseOut=true;
     mm_menu_0826164233_6_3.menuBorder=1;
     mm_menu_0826164233_6_3.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_6_3.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_6_3.bgColor='#666666';
  window.mm_menu_0826164233_6 = new Menu("root",170,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-243,19,true,true,true,0,true,true);
  mm_menu_0826164233_6.addMenuItem("Palavra&nbsp;do&nbsp;Presidente","window.open('jornal/form1.php', '_self');");
  mm_menu_0826164233_6.addMenuItem("&Uacute;ltimas&nbsp;Not&iacute;cias","window.open('jornal/form2.php', '_self');");
  mm_menu_0826164233_6.addMenuItem("Coluna&nbsp;Principal","window.open('jornal/form3.php', '_self');");
  mm_menu_0826164233_6.addMenuItem("Datas&nbsp;dos&nbsp;Cursos","window.open('jornal/form4.php', '_self');");
  mm_menu_0826164233_6.addMenuItem("O&nbsp;Contato","window.open('jornal/form5.php', '_self');");
  mm_menu_0826164233_6.addMenuItem("Destaque&nbsp;1","window.open('jornal/form6.php', '_self');");
  mm_menu_0826164233_6.addMenuItem("Destaques&nbsp;2","window.open('jornal/form18.php', '_self');");
  mm_menu_0826164233_6.addMenuItem("Fotos&nbsp;do&nbsp;Site","window.open('jornal/form7.php', '_self');");
  mm_menu_0826164233_6.addMenuItem("Informativo","window.open('jornal/form8.php', '_self');");
  mm_menu_0826164233_6.addMenuItem("Pisos&nbsp;Salariais","window.open('jornal/form9.php', '_self');");
  mm_menu_0826164233_6.addMenuItem(mm_menu_0826164233_6_1);
  mm_menu_0826164233_6.addMenuItem(mm_menu_0826164233_6_2,"window.open('jornal/cadastro.php', '_self');");
  mm_menu_0826164233_6.addMenuItem(mm_menu_0826164233_6_3,"window.open('emails/cadastro.php', '_self');");
  mm_menu_0826164233_6.addMenuItem("Enviar&nbsp;Boletim&nbsp;por&nbsp;E-mail","window.open('noticias_email/selecao_1.php', '_self');");
   mm_menu_0826164233_6.fontWeight="bold";
   mm_menu_0826164233_6.hideOnMouseOut=true;
   mm_menu_0826164233_6.childMenuIcon="imagens/arrows.gif";
   mm_menu_0826164233_6.menuBorder=1;
   mm_menu_0826164233_6.menuLiteBgColor='#ffffff';
   mm_menu_0826164233_6.menuBorderBgColor='#6699cc';
   mm_menu_0826164233_6.bgColor='#666666';
    window.mm_menu_0826164233_7_1 = new Menu("Cadastro&nbsp;de&nbsp;Senhas",71,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
    mm_menu_0826164233_7_1.addMenuItem("Consultar","window.open('senha/senhaconsulta.php', '_self');");
    mm_menu_0826164233_7_1.addMenuItem("Incluir","window.open('senha/senhaincluir.php', '_self');");
     mm_menu_0826164233_7_1.fontWeight="bold";
     mm_menu_0826164233_7_1.hideOnMouseOut=true;
     mm_menu_0826164233_7_1.menuBorder=1;
     mm_menu_0826164233_7_1.menuLiteBgColor='#ffffff';
     mm_menu_0826164233_7_1.menuBorderBgColor='#6699cc';
     mm_menu_0826164233_7_1.bgColor='#666666';
  window.mm_menu_0826164233_7 = new Menu("root",193,20,"Times New Roman, Times, serif",14,"#000000","#ffffff","<?php echo $color_menu ?>","#6699cc","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0826164233_7.addMenuItem("Informa&ccedil;&otilde;es&nbsp;do&nbsp;Sistema","window.open('info/info.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Configurar&nbsp;Impress&atilde;o","window.open('javascript:window.print();', '_self');");
  mm_menu_0826164233_7.addMenuItem("Configurar&nbsp;Servidor&nbsp;de&nbsp;Dados","window.open('config/server.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Configura&ccedil;&otilde;es&nbsp;do&nbsp;Sistema&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","window.open('config/configuracoes.php', '_self');");
  mm_menu_0826164233_7.addMenuItem(mm_menu_0826164233_7_1,"window.open('senha/cadsenha.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Enviar&nbsp;Mensagem&nbsp;(send)","window.open('send/send.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Sistema&nbsp;Modelo","window.open('modelo/cadastro.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Calculadora","window.open('javascript:janelaSecundaria();', '_self');");
  mm_menu_0826164233_7.addMenuItem("Reindex","window.open('reindex/organiza_id.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Backup&nbsp;da&nbsp;Base&nbsp;de&nbsp;Dados","window.open('backup/backup.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Cancelamento&nbsp;Caixa","window.open('estorno/mostra_grid.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Abrir&nbsp;Receita&nbsp;Caixa","window.open('receita/receita_grid.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Cronometro","window.open('javascript:janelaCronos();', '_self');");
  mm_menu_0826164233_7.addMenuItem("Alterar&nbsp;Foto&nbsp;do&nbsp;Socio","window.open('socios/salvafoto.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Alterar&nbsp;Foto&nbsp;Clube","window.open('clube/salvafoto.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Testar&nbsp;Desempenho&nbsp;da&nbsp;Rede","window.open('info/desempenho.php', '_self');");
  mm_menu_0826164233_7.addMenuItem("Bate&nbsp;Papo&nbsp;-&nbsp;Chat&nbsp;-","window.open('javascript:janelabatpapo();', '_self');");
   mm_menu_0826164233_7.fontWeight="bold";
   mm_menu_0826164233_7.hideOnMouseOut=true;
   mm_menu_0826164233_7.childMenuIcon="imagens/arrows.gif";
   mm_menu_0826164233_7.menuBorder=1;
   mm_menu_0826164233_7.menuLiteBgColor='#ffffff';
   mm_menu_0826164233_7.menuBorderBgColor='#6699cc';
   mm_menu_0826164233_7.bgColor='#666666';

  mm_menu_0826164233_7.writeMenus();
} // mmLoadMenus()

//-->
</script>
<script language="JavaScript1.2" src="mm_menu.js"></script>
</head>
<body bgcolor="#ffffff" onLoad="MM_preloadImages('imagens/menu2_r2_c2_f2.gif','imagens/menu2_r2_c4_f2.gif','imagens/menu2_r2_c6_f2.gif','imagens/menu2_r2_c8_f2.gif','imagens/menu2_r2_c10_f2.gif','imagens/menu2_r2_c12_f2.gif','imagens/menu2_r2_c14_f2.gif','imagens/menu2_r2_c16_f2.gif');">
<script language="JavaScript1.2">mmLoadMenus();</script>
<table border="0" cellpadding="0" cellspacing="0" width="900">
<!-- fwtable fwsrc="menu_sind.png" fwbase="menu2.gif" fwstyle="Dreamweaver" fwdocid = "530471666" fwnested="0" -->
  <tr>
   <td><img src="imagens/spacer.gif" width="97" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="95" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="2" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="95" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="2" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="95" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="2" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="95" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="2" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="95" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="2" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="95" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="2" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="95" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="2" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="95" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="29" height="1" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="1" height="1" border="0" alt=""></td>
  </tr>

  <tr>
   <td colspan="17"><img name="menu2_r1_c1" src="imagens/menu2_r1_c1.gif" width="900" height="10" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="1" height="10" border="0" alt=""></td>
  </tr>
  <tr>
   <td rowspan="2"><img name="menu2_r2_c1" src="imagens/menu2_r2_c1.gif" width="97" height="30" border="0" alt=""></td>
   <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0826164233_0,-9,13,null,'menu2_r2_c2');MM_swapImage('menu2_r2_c2','','imagens/menu2_r2_c2_f2.gif',1);"><img name="menu2_r2_c2" src="imagens/menu2_r2_c2.gif" width="95" height="26" border="0" alt=""></a></td>
   <td rowspan="2"><img name="menu2_r2_c3" src="imagens/menu2_r2_c3.gif" width="2" height="30" border="0" alt=""></td>
   <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0826164233_1,-9,13,null,'menu2_r2_c4');MM_swapImage('menu2_r2_c4','','imagens/menu2_r2_c4_f2.gif',1);"><img name="menu2_r2_c4" src="imagens/menu2_r2_c4.gif" width="95" height="26" border="0" alt=""></a></td>
   <td rowspan="2"><img name="menu2_r2_c5" src="imagens/menu2_r2_c5.gif" width="2" height="30" border="0" alt=""></td>
   <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0826164233_2,-9,13,null,'menu2_r2_c6');MM_swapImage('menu2_r2_c6','','imagens/menu2_r2_c6_f2.gif',1);"><img name="menu2_r2_c6" src="imagens/menu2_r2_c6.gif" width="95" height="26" border="0" alt=""></a></td>
   <td rowspan="2"><img name="menu2_r2_c7" src="imagens/menu2_r2_c7.gif" width="2" height="30" border="0" alt=""></td>
   <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0826164233_3,-9,13,null,'menu2_r2_c8');MM_swapImage('menu2_r2_c8','','imagens/menu2_r2_c8_f2.gif',1);"><img name="menu2_r2_c8" src="imagens/menu2_r2_c8.gif" width="95" height="26" border="0" alt=""></a></td>
   <td rowspan="2"><img name="menu2_r2_c9" src="imagens/menu2_r2_c9.gif" width="2" height="30" border="0" alt=""></td>
   <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0826164233_4,-9,13,null,'menu2_r2_c10');MM_swapImage('menu2_r2_c10','','imagens/menu2_r2_c10_f2.gif',1);"><img name="menu2_r2_c10" src="imagens/menu2_r2_c10.gif" width="95" height="26" border="0" alt=""></a></td>
   <td rowspan="2"><img name="menu2_r2_c11" src="imagens/menu2_r2_c11.gif" width="2" height="30" border="0" alt=""></td>
   <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0826164233_5,-9,13,null,'menu2_r2_c12');MM_swapImage('menu2_r2_c12','','imagens/menu2_r2_c12_f2.gif',1);"><img name="menu2_r2_c12" src="imagens/menu2_r2_c12.gif" width="95" height="26" border="0" alt=""></a></td>
   <td rowspan="2"><img name="menu2_r2_c13" src="imagens/menu2_r2_c13.gif" width="2" height="30" border="0" alt=""></td>
   <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0826164233_6,-9,13,null,'menu2_r2_c14');MM_swapImage('menu2_r2_c14','','imagens/menu2_r2_c14_f2.gif',1);"><img name="menu2_r2_c14" src="imagens/menu2_r2_c14.gif" width="95" height="26" border="0" alt=""></a></td>
   <td rowspan="2"><img name="menu2_r2_c15" src="imagens/menu2_r2_c15.gif" width="2" height="30" border="0" alt=""></td>
   <td><a href="#" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0826164233_7,-111,13,null,'menu2_r2_c16');MM_swapImage('menu2_r2_c16','','imagens/menu2_r2_c16_f2.gif',1);"><img name="menu2_r2_c16" src="imagens/menu2_r2_c16.gif" width="95" height="26" border="0" alt=""></a></td>
   <td rowspan="2"><img name="menu2_r2_c17" src="imagens/menu2_r2_c17.gif" width="29" height="30" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="1" height="26" border="0" alt=""></td>
  </tr>
  <tr>
   <td><img name="menu2_r3_c2" src="imagens/menu2_r3_c2.gif" width="95" height="4" border="0" alt=""></td>
   <td><img name="menu2_r3_c4" src="imagens/menu2_r3_c4.gif" width="95" height="4" border="0" alt=""></td>
   <td><img name="menu2_r3_c6" src="imagens/menu2_r3_c6.gif" width="95" height="4" border="0" alt=""></td>
   <td><img name="menu2_r3_c8" src="imagens/menu2_r3_c8.gif" width="95" height="4" border="0" alt=""></td>
   <td><img name="menu2_r3_c10" src="imagens/menu2_r3_c10.gif" width="95" height="4" border="0" alt=""></td>
   <td><img name="menu2_r3_c12" src="imagens/menu2_r3_c12.gif" width="95" height="4" border="0" alt=""></td>
   <td><img name="menu2_r3_c14" src="imagens/menu2_r3_c14.gif" width="95" height="4" border="0" alt=""></td>
   <td><img name="menu2_r3_c16" src="imagens/menu2_r3_c16.gif" width="95" height="4" border="0" alt=""></td>
   <td><img src="imagens/spacer.gif" width="1" height="4" border="0" alt=""></td>
  </tr>
</table>
</body>
</html>
